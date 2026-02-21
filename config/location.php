<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Locations Page Top Section
    |--------------------------------------------------------------------------
    |
    | Configure the main banner section for the locations page.
    | You can set the title, subtitle/description, and the image.
    | These values can be overridden without touching the Blade.
    |
    */

    'top_section' => [
        'title' => 'Locations We Serve',
        'subtitle' => 'Enjoy a spotless space with our expert cleaning team. Available at locations across Canada!',
        'image' => 'images/misc/6.webp',
        'decor_image' => 'images/deco/s1.webp',
    ],



    'fallback' => [
        [
            'city' => 'New York',
            'state' => 'NY',
            'country' => 'USA',
            'address' => '123 Main Street, New York, NY 10001',
            'image' => 'images/projects/1.webp'
        ],
        [
            'city' => 'Los Angeles',
            'state' => 'CA',
            'country' => 'USA',
            'address' => '456 Oak Avenue, Los Angeles, CA 90001',
            'image' => 'images/projects/2.webp'
        ],
        [
            'city' => 'Chicago',
            'state' => 'IL',
            'country' => 'USA',
            'address' => '789 Pine Street, Chicago, IL 60601',
            'image' => 'images/projects/3.webp'
        ],
    ],


    'content' => [

        'toronto' => [
            'title' => 'Professional Cleaning Services in Toronto',
            'body' => '
                <p class="lead">
                    Our Toronto team delivers high-quality residential and
                    commercial cleaning services across the GTA.
                </p>
                <p>
                    We specialize in eco-friendly deep cleaning,
                    office sanitation, and move-in/move-out services.
                </p>
            ',
        ],

        'vancouver' => [
            'title' => 'Reliable Cleaning Experts in Vancouver',
            'body' => '
                <p class="lead">
                    Serving Vancouver with premium cleaning solutions
                    tailored to homes and businesses.
                </p>
                <p>
                    From downtown condos to corporate offices,
                    our team ensures spotless results every time.
                </p>
            ',
        ],

        'default' => [
            'title' => 'Trusted Cleaning Services',
            'body' => '
                <p class="lead">
                    We proudly provide professional, eco-conscious
                    cleaning services tailored to your needs.
                </p>
                <p>
                    Contact your local branch today to experience
                    premium service and attention to detail.
                </p>
            ',
        ],
    ],
];