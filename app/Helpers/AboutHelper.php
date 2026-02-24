<?php

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

if (!function_exists('about_image')) {

    /**
     * Resize and cache About Team images with a focus on the top of the frame.
     *
     * @param string $filename
     * @param int $size
     * @return string
     */
    function about_image(string $filename, int $size = 500): string
    {
        $directory = public_path('images/team');
        $cacheDir = $directory . '/cache';
        $originalPath = $directory . '/' . $filename;

        if (!File::exists($originalPath)) {
            return asset('images/misc/placeholder.webp');
        }

        if (!File::exists($cacheDir)) {
            File::makeDirectory($cacheDir, 0755, true);
        }

        $version = 'v2';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $nameOnly = pathinfo($filename, PATHINFO_FILENAME);
        $resizedName = $nameOnly . "-{$size}x{$size}-{$version}." . $extension;
        $resizedPath = $cacheDir . '/' . $resizedName;

        if (!File::exists($resizedPath)) {
            $manager = new ImageManager(new Driver());
            
            $image = $manager->read($originalPath);
            
            
            $image->cover($size, $size, 'top'); 
            
            $image->save($resizedPath);
        }

        return asset("images/team/cache/{$resizedName}");
    }
}