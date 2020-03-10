
    /**
     * Удалить с сессии и с карты покупателя
     * @param  integer itemId ID продукта
     * @return
     */
     function removeFromCart(itemId){
        var cartItems = $('.main-nav_basket-item');
        $.ajax({
            url: '/cart/removefromcart/' + itemId + '/',
            type: 'POST',
            dataType: 'json',
            success: function(data){
                if (data['success']) {
                    cartItems.each(function(i, el) {
                        if(el.dataset['id'] == itemId){
                            el.remove();
                            item = el.children[2];
                            cost = +($('.main-nav_basket-subtotal__cost').html());;
                            cost = cost - (+item.innerHTML);
                            $('.main-nav_basket-subtotal__cost').html(cost);
                            
                            $('#cartCntItems').html(data['cntItems']);
                            if(cartItems.length <= 1){
                                $(".main-nav_basket").addClass('hidden');
                                $('#main-nav_basket').removeClass('main-nav_list-item__social-active'); 
                            }
                        }
                    });
                }
            }
        });
    }

/**
 * Авторизация пользователя
 * 
 */
 function login(){
    var email = $('#login').val();
    var pwd = $('#password').val();

    var postData = "email="+ email + "&pwd=" +pwd;

    $.ajax({
        type: 'POST',
        url: "/user/login/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('.main-nav_authorize-text')[0].remove();
                const CLONE_TEMPLATE = $('.main-nav_account-template').contents().clone(true);
                $('#main-nav_login').append(CLONE_TEMPLATE);
                $('.main-nav_sign')[0].innerHTML = ('Hi, ' + data['displayName']);
                $('.main-nav_login-container').addClass('hidden');
                $('#main-nav_login').removeClass('main-nav_list-item__social-active');
            } else {
                alert(data['message']);
            }
        }
    })
}

/**
 * События открытия окон логина и корзины
 */
 $('#main-nav_basket').on('click', miniBasket);
 $('#main-nav_login').on('click', miniBasket);

 function miniBasket(event) {
    if(event.target.closest('#main-nav_basket') && $('.main-nav_basket-item').length >0){
        $('.main-nav_basket').toggleClass('hidden');
        $(this).toggleClass('main-nav_list-item__user-active');
    } else if (event.target.closest('#main-nav_login') &&  $('#main-nav_login').find('.main-nav_authorize-text').length >0) {
        $('.main-nav_login-container').toggleClass('hidden');
        $(this).toggleClass('main-nav_list-item__user-active');
    }
}

    /**
     * Функция добавления товара в корзину
     * @param {integer} itemId ID продукта
     *
     * @return в случае успеха обновляются данные корзины на странице
     */
     function addToCart(itemId){
        var costItem;
        var postData = {"size":$('.details_radio:checked').val()};
        console.log(postData);
        
        $.ajax({
            type: 'POST',
            //async: false,
            url: "/cart/addtocart/" + itemId + "/",
            data: postData,
            dataType: 'json',
            success: function(data) {
                console.log('1111');
                if (data['success']) {
                    $('#cartCntItems').html(data['cntItems']);
                    const CLONE_TEMPLATE = $('.main-nav_basket-template').contents().clone(true);
                    CLONE_TEMPLATE.find('.main-nav_basket-image').attr('src', '/templates/default/images/' + data['image']);
                    CLONE_TEMPLATE.find('.main-nav_basket-delete').attr('onclick', 'removeFromCart(' + itemId +')');
                    CLONE_TEMPLATE.find('.main-nav_basket-name').html(data['name']);
                    CLONE_TEMPLATE.find('.main-nav_basket-cost').html(data['price']);

                    $('.main-nav_basket-list').append(CLONE_TEMPLATE);

                    costItem = $('.main-nav_basket-cost');
                    var cost;
                    if(costItem.length > 1) {
                        cost = +($('.main-nav_basket-subtotal__cost').html());
                        for(i=1; i<costItem.length; i++){
                            cost += +(costItem[i].innerHTML);
                        }
                        $('.main-nav_basket-subtotal__cost').html(cost);
                    }else {
                        $('.main-nav_basket-subtotal__cost').html(costItem[0].innerHTML);
                    }
                    
                }
            }
        });
    }

    /**
     * Открыть/закрыть мобильное меню
     *
     */
     $(document).ready(function() {
        $('.main-nav_icon').on('click', function() {
            $('.main-nav_icon').toggleClass('menu_state_open');
            $('.main-nav_mobile-menu').toggleClass('menu_state_open');
            $('.main-nav_mobile-list').toggleClass('menu_state_open');
        });

        if ($(window).width() <= 1024) {
            $('#main-nav_basket .main-nav_authorize-text').remove();
            $('#main-nav_basket').append('<a href="#" class="main-nav_authorize-text">Basket (0)</a>');
        }
    });
    /**
     * Переключение на выскакивающее окно мини-корзины или ссылки в зависимости от разрешения экрана
     * 
     */
     window.onresize = function(event) {
        if ($(window).width() <= 1024) {
            $('#main-nav_basket .main-nav_authorize-text').remove();
            $('#main-nav_basket').append('<a href="#" class="main-nav_authorize-text">Basket (0)</a>');
        } else{
            $('#main-nav_basket .main-nav_authorize-text').remove();
            $('#main-nav_basket').append('<p class="main-nav_authorize-text">Basket (0)</p>');
        }
    };

 /**
 * Получить данные с формы
 * 
 */
 function getData(obj_form){
    var hData = {};
    var select = 0;
    $(obj_form).find('input:not(#billing-check)','textarea','select').each(function(){
        if(this.name && this.name != ''){
            hData[this.name] = this.value;
            console.log(hData);
        }
    });

    $('select').each(function(){
        select = this.options.selectedIndex;
        hData[this.name] = this.options[select].value;
    });
    return hData;
}

$(document).ready(function() {
    $('.plate_item').imagesLoaded( function() {});
    $('.plate_item').imagefill();
});