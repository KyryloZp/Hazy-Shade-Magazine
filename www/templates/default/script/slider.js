    //  --------  Slick Slider ------------
    //  
    $('.slider').slick({
        infinite: true,
        speed: 300,
        dots: false,
        prevArrow: '<button type="button" class="slick-prev"><img src="../images/Arrow Thin left.png" alt="Arrow Thin Right" /></button>',
        nextArrow: '<button type="button" class="slick-next"><img src="../images/Arrow Thin Right.png" alt="Arrow Thin Right" /></button>',
        slidesToShow: 6,
        slidesToScroll: 2,
        variableWidth: true,
        responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        ]
    }); 


    $('.slick-prev img').attr('src', '/templates/default/images/Arrow Thin left.png');
    $('.slick-next img').attr('src', '/templates/default/images/Arrow Thin Right.png');