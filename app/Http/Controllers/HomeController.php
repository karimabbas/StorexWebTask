<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::with('category')
            ->latest()
            ->limit(8)
            ->filter($request->query())
            ->get();

        return view('front.home', compact('movies'));
    }
}
