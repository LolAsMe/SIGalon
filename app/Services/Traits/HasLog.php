<?php

namespace App\Services\Traits;

use App\Models\Galon\Log;

trait HasLog
{
    public function log()
    {
        return $this->morphMany(Log::class,'owner');
    }
}
