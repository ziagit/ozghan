<?php

namespace Database\Seeders;

use App\Models\QuoteOption;
use App\Models\ServiceArea;
use App\Models\TilingService;
use App\Models\Work;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['title' => 'Bathroom Tiling', 'category' => 'indoor', 'description' => 'Full wet-area tiling for bathrooms and ensuites, including certified waterproofing underneath every tile.'],
            ['title' => 'Kitchen Tiling', 'category' => 'indoor', 'description' => 'Splashbacks, benchtop returns and kitchen floors built for daily heat, spills and wear.'],
            ['title' => 'Indoor Floor Tiling', 'category' => 'indoor', 'description' => 'Precision floor tiling across rooms, hallways and laundries with consistent grout lines.'],
            ['title' => 'Indoor Wall Tiling', 'category' => 'indoor', 'description' => 'Feature walls and full wall coverage, set plumb and true from the first row to the last.'],
            ['title' => 'Waterproofing', 'category' => 'indoor', 'description' => 'Membrane waterproofing to Australian Standard AS 3740, with compliance certification.'],
            ['title' => 'Indoor Renovation Tiling', 'category' => 'indoor', 'description' => 'Strip-outs, substrate repair and re-tiling for bathroom and kitchen renovations.'],
            ['title' => 'Patio & Alfresco Tiling', 'category' => 'outdoor', 'description' => 'Durable outdoor surfaces for patios and alfresco areas, laid with correct falls.'],
            ['title' => 'Pool Surround Tiling', 'category' => 'outdoor', 'description' => 'Slip-rated pool surrounds and waterline finishes designed for Australian conditions.'],
            ['title' => 'Outdoor Floor Tiling', 'category' => 'outdoor', 'description' => 'Hardwearing outdoor floors for entries, entertaining areas and pathways.'],
            ['title' => 'Outdoor Wall Tiling', 'category' => 'outdoor', 'description' => 'Exterior feature walls and retaining surfaces with weather-appropriate materials.'],
            ['title' => 'Driveway & Path Tiling', 'category' => 'outdoor', 'description' => 'Practical tiled driveways, paths and entryways with durable, slip-rated finishes.'],
            ['title' => 'Outdoor Renovation Tiling', 'category' => 'outdoor', 'description' => 'Repairs and re-tiling for ageing patios, balconies, pool areas and outdoor rooms.'],
        ];
        foreach ($services as $order => $service) {
            TilingService::updateOrCreate(['slug' => Str::slug($service['title'])], $service + ['sort_order' => $order]);
        }

        foreach (['Brisbane CBD', 'New Farm', 'Fortitude Valley', 'Paddington', 'West End', 'Toowong', 'Indooroopilly', 'Woolloongabba', 'South Brisbane', 'Auchenflower', 'Milton', 'Kangaroo Point'] as $order => $name) {
            ServiceArea::updateOrCreate(['name' => $name], ['sort_order' => $order, 'is_active' => true]);
        }

        $works = [
            ['title' => 'Ensuite retile & waterproofing', 'category' => 'Bathroom', 'location' => 'New Farm, Brisbane', 'area_m2' => 18.50, 'completed_at' => '2026-01-18', 'description' => 'Full strip-out, new membrane, matte floor tile with contrast wall feature.'],
            ['title' => 'Splashback & benchtop return', 'category' => 'Kitchen', 'location' => 'Paddington, Brisbane', 'area_m2' => 9.25, 'completed_at' => '2026-02-04', 'description' => 'Herringbone splashback tiled around existing joinery.'],
            ['title' => 'Alfresco & pool surround', 'category' => 'Outdoor', 'location' => 'West End, Brisbane', 'area_m2' => 42.00, 'completed_at' => '2026-02-22', 'description' => 'Slip-rated pavers laid to fall around an existing pool shell.'],
            ['title' => 'Café fit-out floor', 'category' => 'Commercial', 'location' => 'Fortitude Valley, Brisbane', 'area_m2' => 86.00, 'completed_at' => '2026-03-08', 'description' => 'Full floor re-tile completed over a weekend closure.'],
            ['title' => 'Full bathroom renovation', 'category' => 'Renovation', 'location' => 'Toowong, Brisbane', 'area_m2' => 24.00, 'completed_at' => '2026-03-21', 'description' => 'Strip-out, substrate repair, waterproofing and re-tile in eight days.'],
            ['title' => 'Open-plan living floor', 'category' => 'Floor', 'location' => 'Indooroopilly, Brisbane', 'area_m2' => 58.00, 'completed_at' => '2026-04-02', 'description' => 'Large-format porcelain laid through kitchen, dining and living zones.'],
        ];
        foreach ($works as $order => $work) {
            $slug = Str::slug($work['title']);
            unset($work['title']);
            Work::updateOrCreate(['slug' => $slug], $work + ['is_featured' => true]);
        }

        foreach ([
            'commercial_property_type' => ['Airport', 'Shopping mall', 'Hotel', 'Train station'],
            'tile_size' => ['Small', 'Medium', 'Big'],
        ] as $group => $labels) {
            foreach ($labels as $order => $label) {
                QuoteOption::updateOrCreate(['option_group' => $group, 'value' => $label], ['label' => $label, 'sort_order' => $order, 'is_active' => true]);
            }
        }
    }
}
