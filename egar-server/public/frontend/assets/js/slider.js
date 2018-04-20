$('#mainSlider').owlCarousel({
    loop:true,
    autoplay: true,
    autoplayTimeout: 3000,
    margin:0,
    nav:true,
    dots: false,
    navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>'
    ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

$('#productSlider').owlCarousel({
    loop:true,
    autoplay: true,
    autoplayTimeout: 3000,
    margin:30,
    nav:true,
    dots: false,
    navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>'
    ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});

$('#detailProductSlider').owlCarousel({
    loop:true,
    autoplay: true,
    autoplayTimeout: 3000,
    margin:20,
    nav:true,
    dots: false,
    navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>'
    ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});