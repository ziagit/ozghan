<?php

namespace Database\Seeders;

use App\Models\TilingService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceContentSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['title' => 'Bathroom', 'category' => 'indoor', 'description' => 'Full wet-area tiling for bathrooms and ensuites, including certified waterproofing underneath every tile.', 'image_path' => 'services/bathroom-tiling.avif'],
            ['title' => 'Kitchen', 'category' => 'indoor', 'description' => 'Splashbacks, benchtop returns and kitchen floors built for daily heat, spills and wear.', 'image_path' => 'services/kitchen-tiling.avif'],
            ['title' => 'Indoor Floor', 'category' => 'indoor', 'description' => 'Precision floor tiling across rooms, hallways and laundries with consistent grout lines.', 'image_path' => 'services/1.avif'],
            ['title' => 'Indoor Wall', 'category' => 'indoor', 'description' => 'Feature walls and full wall coverage, set plumb and true from the first row to the last.', 'image_path' => 'services/2.avif'],
            ['title' => 'Waterproofing', 'category' => 'indoor', 'description' => 'Membrane waterproofing to Australian Standard AS 3740, with compliance certification.', 'image_path' => 'services/3.avif'],
            ['title' => 'Indoor Renovation', 'category' => 'indoor', 'description' => 'Strip-outs, substrate repair and re-tiling for bathroom and kitchen renovations.', 'image_path' => 'services/4.avif'],
            ['title' => 'Patio & Alfresco', 'category' => 'outdoor', 'description' => 'Durable outdoor surfaces for patios and alfresco areas, laid with correct falls.', 'image_path' => 'services/5.avif'],
            ['title' => 'Pool Surround', 'category' => 'outdoor', 'description' => 'Slip-rated pool surrounds and waterline finishes designed for Australian conditions.', 'image_path' => 'services/6.avif'],
            ['title' => 'Outdoor Floor', 'category' => 'outdoor', 'description' => 'Hardwearing outdoor floors for entries, entertaining areas and pathways.', 'image_path' => 'services/7.avif'],
            ['title' => 'Outdoor Wall', 'category' => 'outdoor', 'description' => 'Exterior feature walls and retaining surfaces with weather-appropriate materials.', 'image_path' => 'services/8.avif'],
            ['title' => 'Driveway & Path', 'category' => 'outdoor', 'description' => 'Practical tiled driveways, paths and entryways with durable, slip-rated finishes.', 'image_path' => 'services/10.avif'],
            ['title' => 'Outdoor Renovation', 'category' => 'outdoor', 'description' => 'Repairs and re-tiling for ageing patios, balconies, pool areas and outdoor rooms.', 'image_path' => 'services/13.avif'],
        ];

        foreach ($services as $service) {
            $service['slug'] = Str::slug($service['title']);
            $service['service_type'] = 'Residential';
            TilingService::updateOrCreate(['slug' => $service['slug']], $service);
        }

        foreach ([
            ['slug' => 'commercial-floor', 'title' => 'Floor', 'category' => 'indoor', 'description' => 'Hardwearing floor finishes for retail, office and hospitality spaces.', 'image_path' => 'services/14.avif'],
            ['slug' => 'commercial-wall', 'title' => 'Wall', 'category' => 'indoor', 'description' => 'Clean, durable wall finishes for commercial interiors and high-traffic areas.', 'image_path' => 'services/14.avif'],
            ['slug' => 'retail-hospitality-fit-out', 'title' => 'Retail & Hospitality Fit-out', 'category' => 'indoor', 'description' => 'Coordinated tiling for retail stores, cafés, restaurants and hospitality fit-outs.', 'image_path' => 'services/14.avif'],
            ['slug' => 'commercial-waterproofing', 'title' => 'Waterproofing', 'category' => 'indoor', 'description' => 'Compliant waterproofing preparation for commercial wet areas and amenities.', 'image_path' => 'services/14.avif'],
        ] as $service) {
            TilingService::updateOrCreate(
                ['slug' => $service['slug']],
                $service + ['service_type' => 'Commercial']
            );
        }
    }
}
