<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class MigrasiController extends Controller
{
    public function migrate()
    {
        Artisan::call('migrate', ['--force' => true]);

        $output = Artisan::output();
        return response()->json(['message' => 'Migrasi database berhasil dijalankan.', 'output' => $output]);
    }
}
