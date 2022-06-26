<?php


namespace App\Traits;

use Illuminate\Support\Str;

trait Uuid
{
    protected function setUuidAttribute()
    {
        return Str::uuid();
    }
}