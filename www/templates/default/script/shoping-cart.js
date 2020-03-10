/**
 * Слежение за изменением блоков с ценами товара
 * 
 */
$(document).ready(function() {
    $("body").on('DOMSubtreeModified', ".shoping-cart_text-box", conversionPrice);
    $("body").on('DOMSubtreeModified', ".shoping-cart_amount-content", subtotalCost);
    ! $('.shoping-cart_product .shoping-cart_row .shoping-cart_product-link')[0] ? window.location.replace("http://magazine/") : '';

});




function addItemCnt(event){
    const TARGET = event.target;
    var cntInput = TARGET.closest('.shoping-cart_qty').children[0];
    var qtyCount = cntInput.value;
    qtyCount = (+qtyCount) + 1;
    cntInput.value = qtyCount;
    cntInput.setAttribute('value', qtyCount);
}

function minusItemCnt(event){
    const TARGET = event.target;
    var cntInput = TARGET.closest('.shoping-cart_qty').children[0];
    var qtyCount = cntInput.value;
    qtyCount >1 ? qtyCount = (+qtyCount) - 1 : '';
    cntInput.value = qtyCount;
    cntInput.setAttribute('value', qtyCount);
}

function subtotalCost(event){
    var costArray = $('.shoping-cart_amount-content');
    var subtotal =0;
    for(i=0; i<costArray.length; i++){
        subtotal += +(costArray[i].innerHTML);
    }
    $('.shoping-cart_subtotal__cost').html(subtotal); 
}

function removeFromFullCart(event, itemId){
    const TARGET = event.target;
    $.ajax({
        url: '/cart/removefromcart/' + itemId + '/',
        type: 'POST',
        dataType: 'json',
        success: function(data){
            if (data['success']) {
                TARGET.closest('.shoping-cart_row').remove();
                if ($('.shoping-cart_row').length == 1) {
                    window.location.replace("http://magazine/");
                }
            }
        }
    });
}



/**
 * сохранение заказа
 */
 function saveOrder(){

    if ($('#billing-check:checked')[0]) {
        postData = getData('.shoping-cart_form-container');
        console.log(postData);
        $.ajax({
            type: 'POST',
            url: "/cart/saveorder/",
            data: postData,
            dataType: 'json',
            success: function(data){
                if (data['success']) {
                    alert(data['message']);
                    document.location = '/';
                } else {
                    alert(data['message']);
                }
            }
        });
    } else {
        alert('Подтвердите адресс для отправки');
        console.log(postData);
    }
}



function conversionPrice(event){
    const TARGET = event.target;
    var parentTarget = TARGET.closest('.shoping-cart_qty');
    var inputTarget = parentTarget.querySelector('.shoping-cart_text-box');
    var inputValue = inputTarget.getAttribute('value');
    console.log(inputValue);
    $('.shoping-cart_amount-content').each(function(i, val){
        if (TARGET.closest('.shoping-cart_row') === val.closest('.shoping-cart_row')) {
            val.innerHTML = ((+val.dataset.value)*(inputValue));
        }
    });
}


/**
 * создать заказа
 */
 function addToOrder(){
    var postData = getData('.shoping-cart-conteiner');
    console.log(postData);
    $.ajax({
        type: 'POST',
        url: "/cart/order/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if (data['success']) {
                diplay_hide();
                alert(data['message']);
            } else {
                alert(data['message']);
            }
        }
    });
}

function diplay_hide() {

    $('.shoping-cart_form').animate({height: 'show'}, 500);
    $('.shoping-cart_bottom-line__shape').animate({height: 'show'}, 500);
    $('.shoping-cart_bottom-line').animate({height: 'hide'}, 500); 

};