<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = [
        'site_name',
        'logo',
        'tagline',
        'email',
        'phone',
        'address',
        'facebook',
        'linkedin',
        'instagram',
        'youtube',
    ];

    public static function current(): self
    {
        return static::query()->firstOrCreate(
            ['id' => 1],
            [
                'site_name' => 'CodeExpress',
                'tagline' => 'Digital solutions with speed and precision.',
                'email' => 'info@codeexpress.net',
                'phone' => '+8801344720466',
                'address' => 'Dhaka, Bangladesh',
            ]
        );
    }
}
