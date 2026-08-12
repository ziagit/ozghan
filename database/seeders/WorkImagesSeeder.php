<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class WorkImagesSeeder extends Seeder
{
    public function run(): void
    {
        $directory = storage_path('app/public/works');
        if (! File::isDirectory($directory)) {
            return;
        }

        $extensions = ['avif', 'jpg', 'jpeg', 'png', 'webp', 'gif'];

        $files = collect(File::files($directory))
            ->filter(fn ($file) => in_array(strtolower($file->getExtension()), $extensions, true))
            ->sortBy(fn ($file) => $file->getFilename(), SORT_NATURAL | SORT_FLAG_CASE)
            ->values();

        foreach ($files as $index => $file) {
            $extension = strtolower($file->getExtension());
            $filename = $file->getFilename();
            $slug = 'work-'.Str::slug(pathinfo($filename, PATHINFO_FILENAME));
            $category = $index < 2 ? 'Commercial' : 'Residential';

            $data = [
                'category' => $category,
                'description' => null,
                'image_path' => 'works/'.$filename,
                'completed_at' => now()->subDays($index)->toDateString(),
                'is_featured' => true,
            ];
            if (Schema::hasColumn('works', 'title')) {
                $data['title'] = $category.' tiling project '.($index + 1);
            }
            if (Schema::hasColumn('works', 'is_active')) {
                $data['is_active'] = true;
            }

            Work::updateOrCreate(['slug' => $slug], $data);
        }
    }
}
