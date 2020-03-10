
/**
 * Инициализация select плагина Selectric  и изменение параметров в зависимости от выбранной категории
 *
 */
$(document).ready(function() {
    $('.category_selected-category').selectric({
        onChange: function () {
            event.preventDefault();
            var sizeItem = $('.category_selected-size');
            selectProducts();
            
            $('.category_selected-size option').remove();
            switch(true){
                case event.target.innerHTML == "Bottoms":
                sizeItem.append('<option value= "0" selected>All sizes</option>');
                for (var i = 38; i <= 46; i++) {
                    sizeItem.append('<option value=' + i + '>' + i + '</option>');

                }
                sizeItem.selectric('refresh');
                return;
                case (!(event.target.innerHTML == "Bottoms") && !(event.target.innerHTML == "All categories")):
                sizeItem.append('<option value="0" selected >All sizes</option>');
                sizeItem.append('<option value="XS">XS</option>');
                sizeItem.append('<option value="S">S</option>');
                sizeItem.append('<option value="M">M</option>');
                sizeItem.append('<option value="L">L</option>');
                sizeItem.append('<option value="XL">XL</option>');
                sizeItem.append('<option value="XXL">XXL</option>');
                sizeItem.append('<option value="XXXL">XXXL</option>');
                sizeItem.selectric('refresh');
                return;
                case (event.target.innerHTML == "All categories"):
                sizeItem.append('<option value="0">All sizes</option>');
                sizeItem.selectric('refresh');
                return;
            }
        }
    });

    /**
     * Работа фильтрации категории/цены/размеров
     * 
     */
    function selectProducts() {
        event.preventDefault();
        var arrValue = [];
        var productCost = [];

        var size = $('.category_selected-size').val();
        
        var priceValue = $('.category_selected-price').val();
        arrValue = priceValue.split('-');

        var noItems = '<h2 class="subtittle_small" style="text-align:center;width:100%;margin-bottom:100px;">No products on this category</h2>';
        var postData = {catId: $('.category_selected-category').val(), minValue: arrValue[0], maxValue: arrValue[1], size: size};
        console.log(postData);
        $.ajax({
            type: 'POST',
            url: "/category/getproduct/",
            data: postData,
            dataType: 'json',
            success: function(data){
                if (data['success']) {
                    $('.category_item').remove();
                    $('.category_item__null').remove();
                    $('.category_products h2') ? $('.category_products h2').remove() : '';
                    $.each(data['items'], function( index, value ) {
                      const CLONE_TEMPLATE = $('#item-template').contents().clone(true);
                      CLONE_TEMPLATE.find('.category_item').attr('id', 'itemCat_' + value['id']);
                      CLONE_TEMPLATE.find('.category_item-link').attr('href', '/product/' + value['id'] +'/');
                      CLONE_TEMPLATE.find('.category_item-img').attr('src', '/images/products/' + value['image']);
                      CLONE_TEMPLATE.find('.category_item-img').attr('alt', value['name']);
                      CLONE_TEMPLATE.find('.category_item-name').html(value['name']);
                      CLONE_TEMPLATE.find('.category_item-cost').html('€ ' + value['price']);
                      $('.category_products').append(CLONE_TEMPLATE);
                      
                  });
                    $('.category_products').append('<div class="category_item__null"></div>');
                    $('.category_products').append('<div class="category_item__null"></div>');
                    $('.category_products').append('<div class="category_item__null"></div>');
                } else{
                    $('.category_item').remove();
                    $('.category_products h2').length < 1 ? $('.category_products').append(noItems) : '';
                }
            }
        });
    }

    /*
    *Инициализация select плагина Selectric
     */
    $('.category_selected-price').selectric({
        onChange: function(){
            selectProducts();
        }
    });
    /**
     * Инициализация select плагина Selectric
     *
     */
    $('.category_selected-size').selectric({
        onChange: function(){
            selectProducts();
        }
    });
});