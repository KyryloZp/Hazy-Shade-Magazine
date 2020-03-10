/**
 * Инициализация и настройка плагина slick-slider под галлерею
 * @param  {[type]} ) {               var arr [description]
 * @return {[type]}   [description]
 */
$(document).ready(function() {
    var arr = $('.details_image__img');

    $('.details_image-slider').slick({
        dotsClass: 'details_image-slider-container',
        infinite: false,
        dots: true,
        slidesToShow: 1,
        arrows: false,
    });

    var buttonsArr = $('.details_image-slider button');
    var style = [];
    var imageArr = $('.details_image__img');
    var j = -60;
    var radio_value = [];

    imageArr.each(function(index, el) {
        style.push($(this).attr('src'));
    });

    buttonsArr.each(function(i, element){
        j +=80;
        $(this).css({
            'background-image' : 'url(' + style[i] + ')',
            'position' : 'absolute',
            'bottom' : j + 'px',
            'right' : '10px',
            'width' : '70px',
            'height' : '70px',
            'background-size': 'contain',
            'font-size' : '0',
            'background-repeat' : 'no-repeat',
            'background-position' : 'center',
            'border' : '1px solid #e5e5e5'
        });
    });

    $('.details_size-value label').each(function(index, el) {
        el.dataset.content = $('.details_radio')[index].value; 
    });
});

