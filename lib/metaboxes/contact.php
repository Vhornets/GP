<?php
acf_add_local_field_group([
    'key' => 'group_map',
    'title' => 'Map',
    'fields' => [
        [
            'key' => 'field_map', 
            'label' => 'Map markers',
            'name' => 'map',
            'type' => 'repeater',
            'sub_fields' => [
                [
                    'key' => 'field_map_marker', 
                    'label' => 'Map markers',
                    'name' => 'marker',
                    'type' => 'google_map',
                ],
            ]
        ],
    ],
    'location' => acf_get_template_location_array('contact')
]);