<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Routine Janitorial Services',
                'content' => 'Rehoboth provides consistent, high-quality daily or weekly cleaning tailored to your office needs. Our team handles trash removal, restroom sanitation, and common area upkeep to keep your business running smoothly.',
                'meta_title' => 'Professional Janitorial Services | Rehoboth Cleaning',
                'base_price' => 0.12,
            ],
            [
                'name' => 'Medical Grade Cleaning',
                'content' => 'Our specialized healthcare cleaning follows OSHA and JCAHO standards. We use hospital-grade disinfectants to eliminate pathogens in clinics, dental offices, and surgical centers, ensuring patient safety.',
                'meta_title' => 'Medical & Healthcare Facility Cleaning | Rehoboth',
                'base_price' => 0.22,
            ],
            [
                'name' => 'Disinfecting Services',
                'content' => 'Using electrostatic sprayers and EPA-approved chemicals, Rehoboth provides deep-level sanitization for high-traffic environments to prevent the spread of viruses and bacteria.',
                'meta_title' => 'Professional Disinfecting & Sanitizing Services',
                'base_price' => 0.15,
            ],
            [
                'name' => 'Green Commercial Cleaning',
                'content' => 'Rehoboth is committed to sustainability. Our green cleaning service uses certified non-toxic chemicals and HEPA vacuums to provide a healthy environment without harsh odors or residues.',
                'meta_title' => 'Eco-Friendly Green Cleaning Solutions',
                'base_price' => 0.14,
            ],
            [
                'name' => 'Hard Floor Care',
                'content' => 'Preserve the life of your flooring. We offer professional stripping, waxing, buffing, and polishing for VCT tile, hardwood, and concrete floors to maintain a high-gloss professional look.',
                'meta_title' => 'Hard Floor Maintenance, Stripping & Waxing',
                'base_price' => 0.35,
            ],
            [
                'name' => 'Carpet Cleaning',
                'content' => 'Our deep extraction methods remove deep-seated dirt and allergens. We provide routine maintenance and spot treatment to keep your carpets looking new and extend their lifespan.',
                'meta_title' => 'Commercial Carpet Cleaning & Extraction',
                'base_price' => 0.25,
            ],
            [
                'name' => 'Post-Construction Cleanup',
                'content' => 'New build or renovation? Rehoboth handles the heavy lifting, removing dust, debris, and adhesives to make your new facility move-in ready and sparkling.',
                'meta_title' => 'Final Post-Construction Cleaning Services',
                'base_price' => 0.45,
            ],
            [
                'name' => 'Pressure Washing',
                'content' => 'Enhance your curb appeal. We clean sidewalks, parking lots, and building facades, removing grime, mold, and stains from exterior surfaces.',
                'meta_title' => 'Commercial Pressure Washing & Exterior Cleaning',
                'base_price' => 0.18,
            ],
            [
                'name' => 'Window Cleaning',
                'content' => 'Crystal clear views for your storefront or office building. We provide interior and exterior window cleaning, including sills and tracks, for a streak-free finish.',
                'meta_title' => 'Professional Commercial Window Cleaning',
                'base_price' => 0.10,
            ],
        ];

        foreach ($services as $service) {
            Service::create([
                'name' => $service['name'],
                'slug' => Str::slug($service['name']),
                'content' => $service['content'],
                'meta_title' => $service['meta_title'],
                'base_price' => $service['base_price'],
                'image_path' => 'services/' . Str::slug($service['name']) . '.jpg',
            ]);
        }
    }
}