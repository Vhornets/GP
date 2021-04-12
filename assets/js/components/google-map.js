import GMaps from 'gmaps';

export default class GoogleMap {
    constructor(id) {
        this.id = id;
        this.$map = $(id);

        if(!this.$map.length) return;

        this.mapMarkers = this.$map.data('map-markers');

        this.loadGoogleMapsApi();
    }

    loadGoogleMapsApi() {
        let lang = 'en';

        if ($('html').attr('lang')) {
            lang = $('html').attr('lang');
        }

        let js_file = document.createElement('script');

        js_file.type = 'text/javascript';
        js_file.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC5jtelIafbf3u7eWfxHxvR-XaaTvr8V34&language=' + lang;
        document.getElementsByTagName('head')[0].appendChild(js_file);

        js_file.onload = () => this.initMap();
    }

    initMap() {
        let markers_locations = [];

        let map_atts = {
            div: this.id,
            scaleControl: false,
            zoomControl: true,
            fullscreenControl: false,
            mapTypeControl: false,
            scrollwheel: false,
            streetViewControl: false,
            lat: this.mapMarkers[0].marker.lat,
            lng: this.mapMarkers[0].marker.lng
        };

        let map = new GMaps(map_atts);

        $.each(this.mapMarkers, (i, elem) => {
            let marker = map.addMarker({
                lat: elem.marker.lat,
                lng: elem.marker.lng,
            });

            markers_locations.push( new google.maps.LatLng(elem.marker.lat, elem.marker.lng) );
        });

        if (this.mapMarkers.length != 1) {
            map.fitLatLngBounds(markers_locations);
            map.fitZoom(markers_locations);
            // setTimeout(() => map.setZoom(17), 500);
        }

        else {
            map.setZoom(11);
        }
    }
}
