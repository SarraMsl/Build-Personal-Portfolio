<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; // Import the Image facade
use App\Models\Portfolio;

class PortfolioController extends Controller
{
  public function  AllPortfolio(){
    $Portfolio=Portfolio::latest()->get();
    return view('admin.Portfolio.Portfolio_all',compact('Portfolio'));




    }}
