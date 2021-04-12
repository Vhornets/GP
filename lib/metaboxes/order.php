<?php
acf_add_local_field_group([
    'key' => 'group_order',
    'title' => 'General settings',
    'fields' => [
        [
            'key' => 'field_order_number', 
            'label' => 'Order number',
            'name' => 'order__number',
            'type' => 'text',
        ],        
        [
            'key' => 'field_order_booking_number', 
            'label' => 'Booking number',
            'name' => 'order__booking-number',
            'type' => 'text',
        ],        
        [
            'key' => 'field_order_shipment', 
            'label' => 'Shipment status',
            'name' => 'order__shipment',
            'type' => 'select',
            'choices' => [
                '1' => 'Accepted',
                '2' => 'On schedule - processed',
                '3' => 'On schedule - date of departure',
                '4' => 'Delivered',
                '5' => 'Hold',
                '6' => 'Canceled',
            ]
        ],
        [
            'key' => 'field_order_shipment_text', 
            'label' => 'Shipment status text',
            'name' => 'order__shipment-text',
            'type' => 'repeater',
            'min' => 4,
            'max' => 4,
            'sub_fields' => [
                [
                    'key' => 'field_order_shipment_text_item', 
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'wysiwyg',
                    'tabs' => 'text',
                    'media_upload' => 0,
                    'toolbar' => 'full',                    
                ], 
            ]
        ],
        [
            'key' => 'field_order_week', 
            'label' => 'Week',
            'name' => 'order__week',
            'type' => 'number',
        ],
        [
            'key' => 'field_order_vessel', 
            'label' => 'Vessel',
            'name' => 'order__vessel',
            'type' => 'text',
        ],
        [
            'key' => 'field_order_destination', 
            'label' => 'Destination',
            'name' => 'order__destination',
            'type' => 'text',
        ],
        [
            'key' => 'field_order_carrier', 
            'label' => 'Carrier',
            'name' => 'order__carrier',
            'type' => 'text',
        ],
        [
            'key' => 'field_order_eta', 
            'label' => 'ETA',
            'name' => 'order__eta',
            'type' => 'text',
        ],
        [
            'key' => 'field_order_payment_info', 
            'label' => 'Payment information',
            'name' => 'order__payment-info',
            'type' => 'textarea',
        ],
        [
            'key' => 'field_order_content', 
            'label' => 'Order content',
            'name' => 'order__content',
            'type' => 'repeater',
            'sub_fields' => [
                [
                    'key' => 'field_order_content_item_container', 
                    'label' => 'Container',
                    'name' => 'container',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'key' => 'field_order_content_item_container_number', 
                            'label' => 'Container number',
                            'name' => 'text',
                            'type' => 'text',
                        ], 
                        [
                            'key' => 'field_order_content_item_container_url', 
                            'label' => 'URL',
                            'name' => 'url',
                            'type' => 'text',
                        ], 
                    ]
                ], 
                [
                    'key' => 'field_order_content_item_product', 
                    'label' => 'Product',
                    'name' => 'product',
                    'type' => 'text',
                ], 
                [
                    'key' => 'field_order_content_item_lot', 
                    'label' => 'Lot',
                    'name' => 'lot',
                    'type' => 'text',
                ], 
                [
                    'key' => 'field_order_content_item_wrap', 
                    'label' => 'Wrap',
                    'name' => 'wrap',
                    'type' => 'text',
                ], 
                [
                    'key' => 'field_order_content_item_packaging', 
                    'label' => 'Packaging',
                    'name' => 'packaging',
                    'type' => 'text',
                ],  
            ]
        ],
        [
            'key' => 'field_order_comment', 
            'label' => 'Comment',
            'name' => 'order__comment',
            'type' => 'text',
        ], 
        [
            'key' => 'field_order_schedule', 
            'label' => 'Schedule',
            'name' => 'order__schedule',
            'type' => 'file',
        ],                
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'green-order',
            ]
        ]
    ]
]);

acf_add_local_field_group([
    'key' => 'group_order_invoices',
    'title' => 'Order invoices',
    'fields' => [
        [
            'key' => 'field_order_invoices', 
            'label' => 'Invoices',
            'name' => 'order-invoices',
            'type' => 'repeater',
            'sub_fields' => [
                [
                    'key' => 'field_order_invoices_item_file', 
                    'label' => 'File',
                    'name' => 'file',
                    'type' => 'file',
                ], 
                [
                    'key' => 'field_order_invoices_item_number', 
                    'label' => 'Number',
                    'name' => 'number',
                    'type' => 'text',
                ], 
                [
                    'key' => 'field_order_invoices_item_date', 
                    'label' => 'Date',
                    'name' => 'date',
                    'type' => 'text',
                ], 
                [
                    'key' => 'field_order_invoices_item_delivery_status', 
                    'label' => 'Delivery status',
                    'name' => 'delivery-status',
                    'type' => 'text',
                ], 
                [
                    'key' => 'field_order_invoices_item_amount', 
                    'label' => 'Amount',
                    'name' => 'amount',
                    'type' => 'text',
                ], 
                [
                    'key' => 'field_order_invoices_item_expiry', 
                    'label' => 'Expiry date',
                    'name' => 'expiry',
                    'type' => 'text',
                ], 
                [
                    'key' => 'field_order_invoices_item_outstanding', 
                    'label' => 'Outstanding',
                    'name' => 'outstanding',
                    'type' => 'group',
                    'layout' => 'table',
                    'sub_fields' => [
                        [
                            'key' => 'field_order_invoices_item_outstanding_amount', 
                            'label' => 'Amount',
                            'name' => 'amount',
                            'type' => 'text',
                        ],
                        [
                            'key' => 'field_order_invoices_item_outstanding_paid', 
                            'label' => 'Is paid',
                            'name' => 'paid',
                            'type' => 'true_false',
                        ],
                    ]
                ], 
            ]
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'green-order',
            ]
        ]
    ]
]);