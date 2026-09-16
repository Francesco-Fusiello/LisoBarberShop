<?php

namespace App\Console\Commands;

use App\Models\GalleryImage;
use Illuminate\Console\Command;

class UpdateGalleryImageDimensions extends Command
{
    protected $signature = 'gallery:update-dimensions';

    protected $description = 'Update width and height for existing gallery images';

    public function handle(): int
    {
        $images = GalleryImage::whereNull('width')
            ->orWhereNull('height')
            ->get();

        if ($images->isEmpty()) {
            $this->info('All gallery images already have dimensions.');

            return self::SUCCESS;
        }

        foreach ($images as $image) {
            $path = public_path($image->image_path);

            if (! file_exists($path)) {
                $this->warn("File not found: {$image->image_path}");
                continue;
            }

            $dimensions = getimagesize($path);

            if ($dimensions === false) {
                $this->warn("Unable to read dimensions: {$image->image_path}");
                continue;
            }

            $image->update([
                'width' => $dimensions[0],
                'height' => $dimensions[1],
            ]);
        }

        $this->info('Gallery image dimensions updated successfully.');

        return self::SUCCESS;
    }
}