<?php

namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


trait LogError
{
    function logError($exception)
    {
        Log::error('Error occurred: ' . $exception->getMessage());
    }
}