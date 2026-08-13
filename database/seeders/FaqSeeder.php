<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            ['question' => 'What tiling services does Ozghan provide?', 'answer' => 'We provide bathroom, kitchen, floor, wall, outdoor, renovation and commercial tiling across Brisbane, along with wet-area waterproofing and substrate preparation.'],
            ['question' => 'Do you provide waterproofing for bathrooms and wet areas?', 'answer' => 'Yes. We prepare and waterproof wet areas before tiling, including bathrooms, ensuites and laundries. Waterproofing requirements are assessed for the project and completed in line with applicable Australian standards.'],
            ['question' => 'How much does tiling cost in Brisbane?', 'answer' => 'The cost depends on the area, tile size and material, surface preparation, waterproofing, access and the complexity of the layout. Send us the project details and photos for a more accurate quote.'],
            ['question' => 'Can you help choose the right tiles and grout?', 'answer' => 'Yes. We can discuss tile suitability, slip ratings, grout colour, tile format and the practical requirements of bathrooms, kitchens, floors and outdoor areas.'],
            ['question' => 'Do you remove existing tiles?', 'answer' => 'Yes. Removal and disposal can be included where required. We inspect the exposed substrate afterward and identify any preparation or repair needed before the new tiles are installed.'],
            ['question' => 'How long does a bathroom tiling project take?', 'answer' => 'Timelines vary depending on demolition, substrate repairs, waterproofing cure times, tile format and the size of the room. We confirm an expected schedule as part of the quote and project planning.'],
            ['question' => 'Do you install tiles supplied by the customer?', 'answer' => 'In many cases, yes. Before installation we confirm that the tiles are suitable, that there is enough material including allowance for cuts and breakages, and that the required trims and accessories are available.'],
            ['question' => 'Do you handle commercial tiling projects?', 'answer' => 'Yes. We work on commercial floors, walls, hospitality spaces, retail areas and fit-outs. Commercial enquiries can include the site conditions, access restrictions, programme and required staging.'],
            ['question' => 'What Brisbane areas do you service?', 'answer' => 'We currently service Brisbane CBD and surrounding suburbs including New Farm, Fortitude Valley, Paddington, West End, Toowong, Indooroopilly, Woolloongabba, South Brisbane and nearby areas.'],
            ['question' => 'How do I request a tiling quote?', 'answer' => 'Use the online quote form, call 0468 430 893 or email contact@ozghan.com. Helpful details include the suburb, project type, approximate area, preferred timing and photos of the existing space.'],
        ];

        foreach ($faqs as $sortOrder => $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                $faq + ['sort_order' => $sortOrder, 'is_active' => true]
            );
        }
    }
}
