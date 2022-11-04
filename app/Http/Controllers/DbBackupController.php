<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DbBackupController extends Controller
{
    public function db_backup(){
        try {
            Artisan::call('back:run --only-db');
            $output = Artisan::output();
            session()->flash('success', 'BackuP sussessfully!');
            return back();
        }catch (Exception $e) {
            session()->flash('danger', $e->getMessage());
            return back();
        }
    }
}
