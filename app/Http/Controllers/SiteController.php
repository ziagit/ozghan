<?php

namespace App\Http\Controllers;

use App\Models\QuoteOption;
use App\Models\ServiceArea;
use App\Models\TilingService;
use App\Models\Work;

class SiteController extends Controller
{
    public function home()
    {
        try {
            $homeServices = TilingService::where('is_active', true)->latest()->take(4)->get();
            $homeWorks = Work::where('is_active', true)->latest('completed_at')->latest()->take(4)->get();
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

    public function serviceArea()
    {
        try { $serviceAreas = ServiceArea::where('is_active', true)->orderBy('sort_order')->get(); } catch (\Throwable) { $serviceAreas = collect(); }
        return view('site.service-area', compact('serviceAreas'));
    }

    public function ourWork()
    {
        try { $works = Work::where('is_active', true)->orderBy('sort_order')->get(); } catch (\Throwable) { $works = collect(); }
        return view('site.our-work', compact('works'));
    }

    public function workDetails(string $slug)
    {
        try {
            $work = Work::where('slug', $slug)->where('is_active', true)->firstOrFail();
        } catch (\Throwable $exception) {
            abort($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException ? $exception->getStatusCode() : 404);
        }

        return view('site.work-details', compact('work'));
    }

    public function sitemap()
    {
        $works = collect();
        try { $works = Work::where('is_active', true)->get(['slug', 'updated_at']); } catch (\Throwable) { }

        return response()
            ->view('site.sitemap', compact('works'))
            ->header('Content-Type', 'application/xml');
    }
}
