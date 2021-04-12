import slick from 'slick-carousel';
import SETTINGS from './../settings';

export default class Sliders {
    constructor() {
        this.initHeroSlider();
        this.initServicesSlider();
        this.handleSliderArrows();
    }

    initHeroSlider() {
        if($('.c-slider-hero__slide').length > 1) {
            $('.c-slider-hero').slick(SETTINGS.sliders.hero); 
        }
    }

    initServicesSlider() {
        $('.c-slider-services').slick(SETTINGS.sliders.services); 
    }

    handleSliderArrows() {
        $('.js-change-slide').on('click', (e) => {
            e.preventDefault();

            let $self = $(e.currentTarget);

            $( $self.data('slider') ).slick( $self.data('action') );
        });
    }
}
