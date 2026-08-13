<?php

namespace App\Http\Controllers;

use App\Models\QuoteOption;
use App\Models\ServiceArea;
use App\Models\TilingService;
use App\Models\Work;
use App\Models\Faq;

class SiteController extends Controller
{
    public function home()
    {
        try {
            $homeServices = TilingService::where('is_active', true)->latest()->take(4)->get();
            $commercialWorks = Work::whereNotNull('image_path')
                ->whereRaw('LOWER(category) LIKE ?', ['%commercial%'])
                ->orderByDesc('completed_at')->orderByDesc('created_at')->take(2)->get();
            $residentialWorks = Work::where(function ($query) {
                $query->whereNull('category')->orWhereRaw('LOWER(category) NOT LIKE ?', ['%commercial%']);
            })->whereNotNull('image_path')
                ->orderByDesc('completed_at')->orderByDesc('created_at')->take(2)->get();
            $homeWorks = $commercialWorks->concat($residentialWorks);
        } catch (\Throwable) {
            $homeServices = collect();
            $homeWorks = collect();
        }
        return view('site.home', compact('homeServices', 'homeWorks'));
    }

    public function services()
    {
        try { $services = TilingService::where('is_active', true)->orderBy('sort_order')->get(); } catch (\Throwable) { $services = collect(); }
        return view('site.services', compact('services'));
    }

    public function faq()
    {
        try { $faqs = Faq::where('is_active', true)->orderBy('sort_order')->orderBy('id')->get(); } catch (\Throwable) { $faqs = collect(); }
        return view('site.faq', compact('faqs'));
    }

    public function serviceArea()
    {
        try { $serviceAreas = ServiceArea::where('is_active', true)->orderBy('sort_order')->get(); } catch (\Throwable) { $serviceAreas = collect(); }
        return view('site.service-area', compact('serviceAreas'));
    }

    public function ourWork()
    {
        try {
            $residentialWorks = Work::where(function ($query) {
                $query->whereNull('category')->orWhereRaw('LOWER(category) NOT LIKE ?', ['%commercial%']);
            })->orderByDesc('created_at')->paginate(18, ['*'], 'residential_page')->withQueryString();
            $commercialWorks = Work::whereRaw('LOWER(category) LIKE ?', ['%commercial%'])
                ->orderByDesc('created_at')->paginate(18, ['*'], 'commercial_page')->withQueryString();
        } catch (\Throwable) {
            $residentialWorks = collect();
            $commercialWorks = collect();
        }
        return view('site.our-work', compact('residentialWorks', 'commercialWorks'));
    }

    public function sitemap()
    {
        return response()
            ->view('site.sitemap')
            ->header('Content-Type', 'application/xml');
    }
}
