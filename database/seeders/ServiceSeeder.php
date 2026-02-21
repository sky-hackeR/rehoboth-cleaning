<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Routine Janitorial Services',
                'description' => 'General cleaning for offices, including trash removal, restroom sanitation, and common area upkeep to maintain a clean and professional environment.',
                'content' => 'Rehoboth provides consistent, high-quality daily or weekly cleaning tailored to your office needs. Our team handles trash removal, restroom sanitation, and common area upkeep to keep your business running smoothly.',
                'meta_title' => 'Professional Janitorial Services | Rehoboth Cleaning',
                'base_price' => 0.12,
            ],
            [
                'name' => 'Medical Grade Cleaning',
                'description' => 'Specialized cleaning for healthcare facilities, using hospital-grade disinfectants and following OSHA & JCAHO protocols.',
                'content' => 'Our specialized healthcare cleaning follows OSHA and JCAHO standards. We use hospital-grade disinfectants to eliminate pathogens in clinics, dental offices, and surgical centers, ensuring patient safety.',
                'meta_title' => 'Medical & Healthcare Facility Cleaning | Rehoboth',
                'base_price' => 0.22,
            ],
            [
                'name' => 'Disinfecting Services',
                'description' => 'Deep sanitization for high-traffic areas using EPA-approved chemicals and electrostatic sprayers.',
                'content' => 'Using electrostatic sprayers and EPA-approved chemicals, Rehoboth provides deep-level sanitization for high-traffic environments to prevent the spread of viruses and bacteria.',
                'meta_title' => 'Professional Disinfecting & Sanitizing Services',
                'base_price' => 0.15,
            ],
            [
                'name' => 'Green Commercial Cleaning',
                'description' => 'Eco-friendly cleaning with certified non-toxic chemicals and HEPA vacuums for a safe, sustainable environment.',
                'content' => 'Rehoboth is committed to sustainability. Our green cleaning service uses certified non-toxic chemicals and HEPA vacuums to provide a healthy environment without harsh odors or residues.',
                'meta_title' => 'Eco-Friendly Green Cleaning Solutions',
                'base_price' => 0.14,
            ],
            [
                'name' => 'Hard Floor Care',
                'description' => 'Floor maintenance including stripping, waxing, buffing, and polishing for tile, hardwood, and concrete surfaces.',
                'content' => 'Preserve the life of your flooring. We offer professional stripping, waxing, buffing, and polishing for VCT tile, hardwood, and concrete floors to maintain a high-gloss professional look.',
                'meta_title' => 'Hard Floor Maintenance, Stripping & Waxing',
                'base_price' => 0.35,
            ],
            [
                'name' => 'Carpet Cleaning',
                'description' => 'Deep carpet cleaning with extraction methods, routine maintenance, and spot treatment to remove dirt and allergens.',
                'content' => 'Our deep extraction methods remove deep-seated dirt and allergens. We provide routine maintenance and spot treatment to keep your carpets looking new and extend their lifespan.',
                'meta_title' => 'Commercial Carpet Cleaning & Extraction',
                'base_price' => 0.25,
            ],
            [
                'name' => 'Post-Construction Cleanup',
                'description' => 'Thorough cleanup after new construction or renovation, removing dust, debris, and adhesives.',
                'content' => 'New build or renovation? Rehoboth handles the heavy lifting, removing dust, debris, and adhesives to make your new facility move-in ready and sparkling.',
                'meta_title' => 'Final Post-Construction Cleaning Services',
                'base_price' => 0.45,
            ],
            [
                'name' => 'Pressure Washing',
                'description' => 'Exterior cleaning of sidewalks, parking lots, and building facades to remove grime, mold, and stains.',
                'content' => 'Enhance your curb appeal. We clean sidewalks, parking lots, and building facades, removing grime, mold, and stains from exterior surfaces.',
                'meta_title' => 'Commercial Pressure Washing & Exterior Cleaning',
                'base_price' => 0.18,
            ],
            [
                'name' => 'Window Cleaning',
                'description' => 'Interior and exterior window cleaning, including sills and tracks, for a streak-free finish.',
                'content' => 'Crystal clear views for your storefront or office building. We provide interior and exterior window cleaning, including sills and tracks, for a streak-free finish.',
                'meta_title' => 'Professional Commercial Window Cleaning',
                'base_price' => 0.10,
            ],
        ];

        $directory = public_path('images/services');
        $manager = new ImageManager(new Driver());

        foreach ($services as $service) {
            $slug = Str::slug($service['name']);
            $originalImagePath = $directory . '/' . $slug . '.jpg';
            $resizedPath = $directory . '/' . $slug . '-1000x667.jpg';

            if (File::exists($originalImagePath)) {
                if (!File::exists($resizedPath)) {
                    $manager->read($originalImagePath)
                            ->cover(1000, 667)
                            ->toJpeg()
                            ->save($resizedPath);
                }
                $imagePathToStore = 'services/' . $slug . '-1000x667.jpg';
            } else {
                $imagePathToStore = 'services/1.webp';
            }

            Service::create([
                'name' => $service['name'],
                'slug' => $slug,
                'description' => $service['description'],
                'content' => $service['content'],
                'meta_title' => $service['meta_title'],
                'base_price' => $service['base_price'],
                'image_path' => $imagePathToStore,
            ]);
        }
    }
}