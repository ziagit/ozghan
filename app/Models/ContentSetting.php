<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContentSetting extends Model
{
    protected $fillable = ['key', 'value'];

    /**
     * Resolve a stored image path to a usable URL.
     *
     * Handles the three shapes a value can take:
     *  - an absolute URL (http/https) — returned as-is
     *  - a path uploaded through the admin ("content/…", "services/…", etc.) — served from the public disk
     *  - a bundled asset path ("images/…", "logo.png") — resolved with asset()
     */
    public static function resolveUrl(?string $path, ?string $fallback = null): ?string
    {
        if (! $path) {
            return $fallback;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        if (Str::startsWith($path, ['services/', 'works/', 'areas/', 'content/'])) {
            return '/storage/'.ltrim($path, '/');
        }

        return asset(ltrim($path, '/'));
    }
}
