var ContactForm = require('./contactform.js');
window.lightgallery = require('lightgallery');

if(document.querySelector('#rs-contact-form')) {
    var contactForm = new ContactForm(document.querySelector('#rs-contact-form'));
    contactForm.init();
}

window.AjaxForm = require('./components/ajaxform.js');

var NewsletterSubscriber = require('./components/newslettersubscriber.js');
var subscriber = new NewsletterSubscriber();
subscriber.init();

window.$ = window.jQuery = require('jquery');
var slick = require('slick-carousel');

if(document.querySelector('.sponsor-slideshow')) {
    $('.sponsor-slideshow').slick({
        dots: false,
        infinite: true,
        speed: 700,
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToShow: 5,
        slidesToScroll: 5,
        respondTo: 'min',
        prevArrow: '<svg class="slick-prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47.45 63.04"><defs></defs><title>left arrow</title><path d="M2.44,35.75h0L42,62.45a3.52,3.52,0,0,0,4.86-.93,3.63,3.63,0,0,0-.82-4.8L18,33.7a3.28,3.28,0,0,1,0-5.07L45.32,6.16a3.52,3.52,0,0,0,.5-4.92A3.63,3.63,0,0,0,41,.65L2.44,26.58a5.61,5.61,0,0,0-1.5,1.5A5.53,5.53,0,0,0,2.44,35.75Z"/></svg>',
        nextArrow: '<svg class="slick-next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47.45 63.04"><title>right arrow</title><path d="M45,27.29h0L5.43.59a3.52,3.52,0,0,0-4.86.93,3.63,3.63,0,0,0,.82,4.8l28.1,23a3.28,3.28,0,0,1,0,5.07L2.13,56.88a3.52,3.52,0,0,0-.5,4.92,3.63,3.63,0,0,0,4.83.59L45,36.46a5.61,5.61,0,0,0,1.5-1.5A5.53,5.53,0,0,0,45,27.29Z"/></svg>',
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 750,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                }
            }
        ]
    });
}

if(document.querySelector('.hero-slideshow')) {
    $('.hero-slideshow').slick({
        dots: true,
        infinite: true,
        speed: 700,
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        slidesToScroll: 1,
        respondTo: 'min',
        prevArrow: '<svg class="slick-prev" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47.45 63.04"><defs></defs><title>left arrow</title><path d="M2.44,35.75h0L42,62.45a3.52,3.52,0,0,0,4.86-.93,3.63,3.63,0,0,0-.82-4.8L18,33.7a3.28,3.28,0,0,1,0-5.07L45.32,6.16a3.52,3.52,0,0,0,.5-4.92A3.63,3.63,0,0,0,41,.65L2.44,26.58a5.61,5.61,0,0,0-1.5,1.5A5.53,5.53,0,0,0,2.44,35.75Z"/></svg>',
        nextArrow: '<svg class="slick-next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47.45 63.04"><title>right arrow</title><path d="M45,27.29h0L5.43.59a3.52,3.52,0,0,0-4.86.93,3.63,3.63,0,0,0,.82,4.8l28.1,23a3.28,3.28,0,0,1,0,5.07L2.13,56.88a3.52,3.52,0,0,0-.5,4.92,3.63,3.63,0,0,0,4.83.59L45,36.46a5.61,5.61,0,0,0,1.5-1.5A5.53,5.53,0,0,0,45,27.29Z"/></svg>'
    });
}