<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        // Restituisce la dashboard amministratore
        return view('admin.dashboard');
    }
}
