<?php
namespace App\Http\Traits;
use App\Models\Student;
trait ErrorLog {
    public function index($e) {
        Log::error('Error in aboutData(): ' . $e->getMessage());
    }
}