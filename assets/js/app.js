import './jquery-global.js';
import 'remodal';

import Forms from './components/forms';
import GoogleMap from './components/google-map';
import MainMenu from './components/main-menu';
import Sliders from './components/sliders';

export default class App {
    constructor() {
        new Forms; 
        new MainMenu;
        new Sliders;
        new GoogleMap('#map');

        this.handleScrollTo();
        this.handleStickyMenu();
        this.handleWorldmap();
        this.handleProductsHover();
        this.setProductsListPadding();

        $('.js-account-show-more').on('click', (e) => {
            e.preventDefault();

            let $self = $(e.currentTarget);

            $('.has-max-height').removeClass('has-max-height');

            $self.parent().remove();
        });
        
        $('.c-order__button').on('click', (e) => {
            let $self = $(e.currentTarget);
            let $order = $self.parent();

            $order.toggleClass('is-active');
            $order.find('.c-order__details').fadeToggle();
        });

        $('.c-order__back').on('click', (e) => {
            let $self = $(e.currentTarget);
            let $order = $self.parent();

            $order.find('.c-order__button').trigger('click');
        });
    }

    handleProductsHover() {
        let $popupsContainer = $('.c-compressed-bales__popups');
        let $popups = $('.c-compressed-bales__popup');
        let $images = $('.c-compressed-bales__items img');

        $('.c-compressed-bales__dummy').on('mouseenter', (e) => {
            let $self = $(e.currentTarget);
            let index = $self.data('index');

            $images.removeClass('is-active');
            $images.filter(`[data-index="${index}"]`).addClass('is-active');

            $popupsContainer.addClass('is-active');
            $popups.removeClass('is-active');
            $popups.filter(`[data-index="${index}"]`).addClass('is-active');
        });

        $('.c-compressed-bales').on('mouseleave', (e) => {
            if($(e.relatedTarget).hasClass('c-compressed-bales__popup')) return;

            $popupsContainer.removeClass('is-active');
            $popups.removeClass('is-active');
            $images.removeClass('is-active');
        });

        $('.c-compressed-bales__close').on('click', (e) => {
            $popupsContainer.removeClass('is-active');
            $popups.removeClass('is-active');
            $images.removeClass('is-active'); 
        });
    }

    handleWorldmap() {
        $('.c-worldmap svg > g').on('mouseenter', (e) => {
            let $self = $(e.currentTarget);

            if($self.hasClass('is-active')) return;

            let region = $self.attr('id');

            $('.c-worldmap svg g').removeClass('is-active');
            $(`.c-worldmap #${region}`).addClass('is-active');
            // $self.addClass('is-active');

            $('.c-worldmap__popup').removeClass('is-active');
            $(`.c-worldmap__popup[data-region="${region}"]`).addClass('is-active');
        });

        $('.c-worldmap').on('mouseleave', (e) => {
            $('.c-worldmap svg g').removeClass('is-active');
            $('.c-worldmap__popup').removeClass('is-active');
        });
    }

    handleStickyMenu() {
        let scrollTimeout;

        let scrollHandler = () => {
            if($(document).scrollTop() >= 100) {
                $('.c-header').addClass('is-light');

                return;
            }

            $('.c-header').removeClass('is-light');
        };

        $(window).scroll(function () {
            if (scrollTimeout) {
                clearTimeout(scrollTimeout);

                scrollTimeout = null;
            }

            scrollTimeout = setTimeout(scrollHandler, 100);
        });
    }

    handleScrollTo() {
        $('[data-scroll-to]').on('click', (e) => {
            e.preventDefault();

            let $self = $(e.currentTarget);
            let $target = $($self.data('scroll-to'));
            let offset = $('.c-header').height();

            if($(window).width() <= 1170) {
                offset += 30;
            }

            $('html, body').animate({
                scrollTop: $target.offset().top - offset
            }, 2000);
        });

        $('.c-slider-hero__scroll').on('click', (e) => {
            let $self = $(e.currentTarget);

            $('html, body').animate({scrollTop: $self.parents('section').height()}, 1500);
        });
    }

    setProductsListPadding() {
        let direction = $('html').attr('dir');
        let $productsList = $('.l-products__list');
        let $title = $('.s-about-short__title');

        if($productsList.length) {
            if(direction == 'rtl') {
                $productsList.css('padding-right', $title.offset().right);
            }

            else {
                $productsList.css('padding-left', $title.offset().left);
            }
        }
    }
}
 