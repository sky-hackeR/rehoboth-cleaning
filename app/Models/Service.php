<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'content',
        'description',
        'meta_title',
        'base_price',
        'image_path',
    ];

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    public function getResolvedImageAttribute(){
        $directory = public_path('images/services');
        $files = File::exists($directory) ? File::files($directory) : [];

        if (empty($files)) {
            return asset('images/services/1.webp');
        }

        $resizeAndReturn = function ($path) use ($directory) {
            $filename = pathinfo($path, PATHINFO_FILENAME);
            $ext = pathinfo($path, PATHINFO_EXTENSION);

            if (str_contains($filename, '-1000x667')) {
                return asset('images/services/' . $filename . '.' . $ext);
            }

            $resizedName = $filename . '-1000x667.' . $ext;
            $resizedPath = $directory . '/' . $resizedName;

            if (!File::exists($resizedPath)) {
                $manager = new ImageManager(new Driver());
                $img = $manager->make($path);

                if ($img->width() !== 1000 || $img->height() !== 667) {
                    $img->fit(1000, 667)->save($resizedPath);
                } else {
                    File::copy($path, $resizedPath);
                }
            }

            return asset('images/services/' . $resizedName);
        };

        if ($this->image_path && File::exists(public_path($this->image_path))) {
            return $resizeAndReturn(public_path($this->image_path));
        }

        foreach ($files as $file) {
            if (str_contains(strtolower($file->getFilenameWithoutExtension()), strtolower($this->slug))) {
                return $resizeAndReturn($file->getRealPath());
            }
        }

        $index = ($this->id - 1) % count($files);
        return $resizeAndReturn($files[$index]->getRealPath());
    }
}