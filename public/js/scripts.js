/*==================================
 Template Name: GoSofto - Software Landing Page Responsive HTML Template
 Description: Gosofto is a powerful 100% Responsive Multipurpose Software landing page template.
 Version: 1.0
 Author: https://themeforest.net/user/htmllover/portfolio
 ==================================== */

// TABLE OF CONTENTS

//  1. preloader
//  2. easeScroll
//  3. navbar or menu
//  4. client testimonial
//  5. hero background slider
//  6. customers slider
//  7. magnify popup video
//  8. ytplayer for hero background video
//  9. typed
// 10. back to top

jQuery(function ($) {

    'use strict';

    //  1. preloader
    $(window).ready(function() {
        $('#status').fadeOut();
        $('#preloader').delay(200).fadeOut('slow');

    }); 


    //  3. navbar or menu
    $(window).scroll(function() {
        if ($(".navbar").offset().top > 50) {
            $(".navbar-fixed-top").addClass("top-nav-collapse");
        } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
        }
    });

    //jQuery for page scrolling feature - requires jQuery Easing plugin
    $(function() {
        $(document).on('click', 'a.page-scroll', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 900, 'easeInOutExpo');
            event.preventDefault();
        });
    });
    // closes the responsive menu on menu item click
    $(".navbar-nav li a").on("click", function(event) {
        if (!$(this).parent().hasClass('dropdown'))
            $(".navbar-collapse").collapse('hide');
    });

    //nav menu active color
    $('.header-nav li').on("click", function(e){
        $(this).addClass('active').siblings().removeClass('active');
    });


    //  4. client testimonial
    $('.testimonial-slider').owlCarousel({
        responsiveClass:true,
        margin:30,
        dots: true,
        autoWidth:false,
        autoplay:true,
        autoplayTimeout: 3000,
        autoplayStopOnLast: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            800:{
                items:2
            },
            1200:{
                items:3
            }

        }

    });

    //  5. hero background slider
    $('.hero-background-slider').owlCarousel({
        loop: true,
        items: 1,
        autoplay: true,
        dots: true,
        nav: false,
        autoplayTimeout:3400

    });

    // 6. customers slider
    $('.customers-slider').owlCarousel({
        responsiveClass:true,
        margin:30,
        dots: false,
        autoplay: 2000,
        loop: true,
        autoplayStopOnLast: false,
        autoWidth:false,
        nav:false,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            800:{
                items:4
            },
            1200:{
                items:5
            }

        }

    });

    // 7. magnify popup video
    $('.video').magnificPopup({
        type: 'iframe'
    });

    //  8. ytplayer for hero background video
    $(".player").mb_YTPlayer();

    //  9. typed
    var typed = $(".typed");
    $(function() {
        typed.typed({
            strings: ["Software Solution.", "ERP Software Solution.", "App Development.", "Web Development"],
            typeSpeed: 130,
            loop: true
        });
    });

    // 10. back to top
    (function(){

        $('body').append('<div id="toTop"><span><i class="fa fa-angle-down"></i></span></div>');

        $(window).on("scroll", function (e) {
            if ($(this).scrollTop() != 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });

        $('#toTop').on('click',function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });

    }());

}); // JQuery end
