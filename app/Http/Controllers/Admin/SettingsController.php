<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function hotel_settings()
    {
        return view('admin.settings.view.hotel_data');
    }

    public function hotel_store(Request $request)
    {

    }

}
