<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Footer Configuration
    |--------------------------------------------------------------------------
    */
    'footer' => [

        // Logo and Description
        'brand' => [
            'logo' => 'images/logo.webp',
            'description' => "We are a team of passionate cleaning experts who take pride in delivering the highest standard of service. With years of experience in the industry, we’ve perfected our cleaning methods to ensure every job is done right."
        ],

        // Social Media Links
        'socials' => [
            'facebook-f' => '#',
            'x-twitter' => '#',
            'discord' => '#',
            'tiktok' => '#',
            'youtube' => '#',
        ],

        // Company Links
        'company_links' => [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Our Services', 'url' => '/services'],
            ['title' => 'About', 'url' => '/about'],
            ['title' => 'Contact', 'url' => '/contact'],
        ],

        // Office Info
        'office' => [
            'hours' => 'Monday - Saturday 08.00 - 18.00',
            'location' => '100 S Main St, New York, NY',
            'email' => 'contact@uclean.com',
        ],

        'subfooter' => [
            'company_name' => 'REHOBOTH',
            'company_tagline' => 'JANITORIAL SERVICES',
            'terms' => ['Terms & Conditions' => '#', 'Privacy Policy' => '#'],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Header Configuration
    |--------------------------------------------------------------------------
    */
    'header' => [

        // Brand
        'brand' => [
            'company_name' => 'REHOBOTH',
            'company_tagline' => 'JANITORIAL SERVICES',
            'url' => '/',
        ],

        // Main Menu
        'menu' => [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Services', 'url' => '#'],
            ['title' => 'Locations', 'url' => '/locations'],
            ['title' => 'About', 'url' => '/about'],
            ['title' => 'Contact', 'url' => '/contact'],
        ],

        // Call-to-Action
        'cta' => [
            'button_text' => 'Get Instant Quote',
            'button_url' => '#quote',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Home Page / Hero & Other Dynamic Content
    |--------------------------------------------------------------------------
    */
    'home' => [
        'hero' => [
            'subtitle' => 'Trusted Across Canada',
            'title' => 'Exceptional Clean for <br> <span class="id-color-2">Exceptional Businesses</span>',
            'description' => 'Rehoboth Cleaning and Janitorial Services provides hospital-grade disinfection and customized facility maintenance from Toronto to Quebec.',
            'cta_buttons' => [
                ['text' => 'Start Your Quote', 'href' => '#quote', 'class' => 'btn-main'],
                ['text' => 'WhatsApp Us', 'href' => 'https://wa.me/+2348082574927', 'class' => 'btn-main btn-line wow fadeInUp text-dark', 'style' => 'margin-left:10px;'],
            ],
            'hero_image' => 'images/misc/1.webp',
        ],

        'about' => [
            'subtitle' => 'About Rehoboth',
            'title' => 'Bringing Clean, Comfort, and Care Together',
            'description' => 'We are a team of passionate cleaning experts who take pride in delivering the highest standard of service. With years of experience in the industry, we’ve perfected our cleaning methods to ensure every job is done right.',
            'cta_button' => ['text' => 'Get Instant Quote', 'href' => '#quote', 'class' => 'btn-main bg-color-2 text-dark'],
            'images' => [
                'images/misc/11.webp',
                'images/misc/3.webp',
                'images/misc/10.webp',
                'images/misc/8.webp',
            ],
        ],

        'features' => [
            [
                'icon' => 'images/icons/white/labor.webp',
                'title' => 'Professional Team',
                'description' => 'Our trained, insured cleaners ensure professional, trusted service and impeccable results.'
            ],
            [
                'icon' => 'images/icons/white/calendar.webp',
                'title' => 'On Time Service',
                'description' => 'Reliable, punctual service that respects your schedule and exceeds expectations.'
            ],
            [
                'icon' => 'images/icons/white/best-price.webp',
                'title' => 'Transparent Pricing',
                'description' => 'Affordable, upfront rates with no hidden costs — quality cleaning at the right price.'
            ],
            [
                'icon' => 'images/icons/white/eco-friendly.webp',
                'title' => 'Eco Friendly',
                'description' => 'We use non-toxic, eco-friendly products for a safe, healthy, and sparkling environment.'
            ],
        ],
    ],

];
