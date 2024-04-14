<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;

class DashboardController extends Controller
{
    //This are the default routes in web.php
    //for clean code we make a controller without --resource
    //and export the routes from here


    public function index(){
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }


    public function dashboard(){
        return Inertia::render('Dashboard');
    }
}
