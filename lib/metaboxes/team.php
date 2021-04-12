<?php
acf_add_local_field_group([
    'key' => 'group_team_member',
    'title' => 'General settings',
    'fields' => [
        [
            'key' => 'field_team_member_position', 
            'label' => 'Position',
            'name' => 'team-member__position',
            'type' => 'text',
        ],
        [
            'key' => 'field_team_memebr_linkedin', 
            'label' => 'linkedin',
            'name' => 'team-member__linkedin',
            'type' => 'text',
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'team-member',
            ]
        ]
    ]
]);