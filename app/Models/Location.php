<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Location extends Model
{
    //

    protected $fillable = [
        'city',
        'slug',
        'state',
        'zip_codes',
        'manager_email',
        'address',
        'phone_number'
    ];



    public function getResolvedImageAttribute(){
        $directory = public_path('images/locations');
        $files = File::exists($directory) ? File::files($directory) : [];

        if (empty($files)) {
            return asset('images/projects/1.webp');
        }

        $slug = Str::slug($this->city);

        foreach ($files as $file) {
            $filename = $file->getFilename();
            if (Str::contains(Str::lower($filename), Str::lower($slug))) {

                if (Str::contains($filename, '-1000x1000')) {
                    return asset('images/locations/' . $filename);
                }

                return $this->resizeImageOnce($file->getRealPath(), $directory);
            }
        }

        $index = ($this->id - 1) % count($files);
        $file = $files[$index];

        if (Str::contains($file->getFilename(), '-1000x1000')) {
            return asset('images/locations/' . $file->getFilename());
        }

        return $this->resizeImageOnce($file->getRealPath(), $directory);
    }

    /**
     * Resize image to 1000x1000 if not already done.
     */
    protected function resizeImageOnce($path, $directory){
        $filename = pathinfo($path, PATHINFO_FILENAME);
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $resizedName = $filename . '-1000x1000.' . $ext;
        $resizedPath = $directory . '/' . $resizedName;

        if (!File::exists($resizedPath)) {
            $manager = new ImageManager(new Driver());
            $img = $manager->make($path)->fit(1000, 1000);
            $img->save($resizedPath);
        }

        return asset('images/locations/' . $resizedName);
    }

}
