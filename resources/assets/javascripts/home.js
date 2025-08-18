import "./application";
import "wowjs";
import "imagesloaded";
import 'owl.carousel';
import "magnific-popup";
import "./parallaxie";
import "typed.js";
import Typed from "typed.js";
import Isotope from "isotope-layout";
import jQueryBridget from "jquery-bridget";
jQueryBridget('isotope', Isotope, $);
import "jquery-ui";
import "jquery.appear";
import "jquery.easing";

class Category{

    constructor() {
        this.$smothScroll = $('.smooth-scroll');
        this.$stickyTop = $('#header.sticky-top .bg-transparent');
        this.$stickyTopSlide = $('#header.sticky-top-slide');
        this.$contactForm = $('#contact-form');
        this.$submitBtn = $('#submit-btn');
        this.$responseBox = $('#response-box');
    }

    init() {
        this._initEvents();
    }

    _initEvents(){
        let that = this;

        // Preloader
        $(window).on('load', function () {
            $('.lds-ellipsis').fadeOut(); // will first fade out the loading animation
            $('.preloader').delay(333).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(333);
        });

        // Header Sticky
        $(window).on('scroll',function() {
            if ($(this).scrollTop() > 1){
                that.$stickyTop.addClass("sticky-on-top");
                that.$stickyTop.find(".logo img").attr('src',that.$stickyTop.find('.logo img').data('sticky-logo'));
            }
            else {
                that.$stickyTop.removeClass("sticky-on-top");
                that.$stickyTop.find(".logo img").attr('src',that.$stickyTop.find('.logo img').data('default-logo'));
            }

            if ($(this).scrollTop() > 180){
                that.$stickyTopSlide.find(".primary-menu").addClass("sticky-on");
                that.$stickyTopSlide.find(".logo img").attr('src',that.$stickyTopSlide.find('.logo img').data('sticky-logo'));
            }
            else{
                that.$stickyTopSlide.find(".primary-menu").removeClass("sticky-on");
                that.$stickyTopSlide.find(".logo img").attr('src',that.$stickyTopSlide.find('.logo img').data('default-logo'));
            }
        });

        // Sections Scroll
        if($("body").hasClass("side-header")){
            that.$smothScroll.on('click', function() {
                event.preventDefault();
                let sectionTo = $(this).attr('href');
                $('html, body').stop().animate({
                    scrollTop: $(sectionTo).offset().top}, 100, 'easeInOutExpo');
            });
        }else {
            that.$smothScroll.on('click', function() {
                event.preventDefault();
                let sectionTo = $(this).attr('href');
                $('html, body').stop().animate({
                    scrollTop: $(sectionTo).offset().top - 50}, 100, 'easeInOutExpo');
            });
        }

        // Mobile Menu
        $('.navbar-toggler').on('click', function() {
            $(this).toggleClass('show');
        });

        $(".navbar-nav a").on('click', function() {
            $(".navbar-collapse, .navbar-toggler").removeClass("show");
        });

        // Overlay Menu & Side Open Menu
        $('.navbar-side-open .collapse, .navbar-overlay .collapse').on('show.bs.collapse hide.bs.collapse', function(e) {
            e.preventDefault();
        });

        $('.navbar-side-open [data-bs-toggle="collapse"], .navbar-overlay [data-bs-toggle="collapse"]').on('click', function(e) {
            e.preventDefault();
            $($(this).data('bs-target')).toggleClass('show');
        })

        // Carousel
        $(".owl-carousel").each(function () {
            let a = $(this);
            let rtlVal = false;
            if ($("html").attr("dir") === 'rtl') {
                rtlVal = true
            }
            $(this).owlCarousel({
                rtl: rtlVal,
                autoplay: a.data('autoplay'),
                center: a.data('center'),
                autoplayTimeout: a.data('autoplaytimeout'),
                autoplayHoverPause: a.data('autoplayhoverpause'),
                loop: a.data('loop'),
                speed: a.data('speed'),
                nav: a.data('nav'),
                dots: a.data('dots'),
                autoHeight: a.data('autoheight'),
                autoWidth: a.data('autowidth'),
                margin: a.data('margin'),
                stagePadding: a.data('stagepadding'),
                slideBy: a.data('slideby'),
                lazyLoad: a.data('lazyload'),
                navText:['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                animateOut: a.data('animateout'),
                animateIn: a.data('animatein'),
                video: a.data('video'),
                items: a.data('items'),
                responsive:{
                    0:{items: a.data('items-xs'),},
                    576:{items: a.data('items-sm'),},
                    768:{items: a.data('items-md'),},
                    992:{items: a.data('items-lg'),}
                }
            });
        });

        // Image on Modal
        $('.popup-img').each(function() {
            $(this).magnificPopup({
                //delegate: '.popup-img:visible',
                type: "image",
                tLoading: '<div class="preloader"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>',
                closeOnContentClick: !0,
                mainClass: "mfp-fade",
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1]
                },
            });
        });

        // Ajax On Modal
        $('.popup-ajax').each(function() {
            $(this).magnificPopup({
                //delegate: '.popup-ajax:visible',
                type: "ajax",
                tLoading: '<div class="preloader"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>',
                mainClass: "mfp-fade",
                closeBtnInside: true,
                midClick: true,
                gallery: {
                    enabled: true,
                },
                callbacks: {
                    ajaxContentAdded: function() {
                        $(".owl-carousel").each(function () {
                            let a = $(this);
                            let rtlVal = false;
                            if ($("html").attr("dir") === 'rtl') {
                                rtlVal = true
                            }
                            $(this).owlCarousel({
                                rtl: rtlVal,
                                autoplay: a.data('autoplay'),
                                center: a.data('center'),
                                autoplayTimeout: a.data('autoplaytimeout'),
                                autoplayHoverPause: a.data('autoplayhoverpause'),
                                loop: a.data('loop'),
                                speed: a.data('speed'),
                                nav: a.data('nav'),
                                dots: a.data('dots'),
                                autoHeight: a.data('autoheight'),
                                autoWidth: a.data('autowidth'),
                                margin: a.data('margin'),
                                stagePadding: a.data('stagepadding'),
                                slideBy: a.data('slideby'),
                                lazyLoad: a.data('lazyload'),
                                navText:['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                                animateOut: a.data('animateOut'),
                                animateIn: a.data('animateIn'),
                                video: a.data('video'),
                                items: a.data('items'),
                                responsive:{
                                    0:{items: a.data('items-xs'),},
                                    576:{items: a.data('items-sm'),},
                                    768:{items: a.data('items-md'),},
                                    992:{items: a.data('items-lg'),}
                                }
                            });
                        });
                    }
                }
            });
        });

        // Parallax Background
        $(".parallax").each(function () {
            $(this).parallaxie({
                speed: 0.5,
            });
        });

        // Typed
        $(".typed").each(function() {
            new Typed('.typed', {
                stringsElement: '.typed-strings',
                loop: true,
                typeSpeed: 100,
                backSpeed: 50,
                backDelay: 1500,
            });
        });

        // WOW animation
        $(window).on('load', function () {
            $(".wow").each(function() {
                if ($(window).width() > 767) {
                    let wow = new WOW({
                        boxClass: 'wow',
                        animateClass: 'animated',
                        offset: 0,
                        mobile: false,
                        live: true
                    });
                    wow.init();
                }
            });
        });

        /*------------------------
           tooltips
        -------------------------- */
        let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // Scroll to top
        $(function () {
            $(window).on('scroll', function(){
                if ($(this).scrollTop() > 400) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
        });

        $('#back-to-top').on("click", function() {
            $('html, body').animate({scrollTop:0}, 'slow');
            return false;
        });

        that.$contactForm.on('submit', function (e) {
            e.preventDefault(); // prevent default form submit

            $.ajax({
                url: that.$contactForm.attr('action'), // form action url
                type: 'POST', // form submit method get/post
                dataType: 'json', // request type html/json/xml
                data: that.$contactForm.serialize(), // serialize form data
                beforeSend: function () {
                    that.$responseBox.addClass('d-none');
                    that.$submitBtn.attr("disabled", "disabled");
                    let loadingText = '<span role="status" aria-hidden="true" class="spinner-border spinner-border-sm align-self-center me-2"></span>' + that.$submitBtn.data('sending');
                    if (that.$submitBtn.html() !== loadingText) {
                        that.$submitBtn.data('original-text', that.$submitBtn.html());
                        that.$submitBtn.html(loadingText);
                    }},
                success: function (data) {
                    that.$responseBox.removeClass('d-none');
                    that.$responseBox.html(data.message).fadeIn("slow");
                    that.$submitBtn.html(that.$submitBtn.data('original-text'));// reset submit button text
                    that.$submitBtn.removeAttr("disabled", "disabled");
                    if (data.success) {
                        that.$contactForm.trigger('reset'); // reset form
                    }
                    setTimeout(function () {
                        $('.alert-dismissible').fadeOut('slow', function(){
                            $(this).remove();
                        });
                        }, 3500);
                    },
                error: function (data) {
                    that.$responseBox.removeClass('d-none');
                    that.$responseBox.html(data.responseJSON.message).fadeIn("slow");
                    that.$submitBtn.html(that.$submitBtn.data('original-text'));// reset submit button text
                    that.$submitBtn.removeAttr("disabled", "disabled");
                    setTimeout(function () {
                        $('.alert-dismissible').fadeOut('slow', function(){
                            $(this).remove();
                        });
                    }, 3500);
                }
            });
        });
    }
}

const category = new Category();
category.init();
