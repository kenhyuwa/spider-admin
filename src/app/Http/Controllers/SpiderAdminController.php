<?php

namespace Ken\SpiderAdmin\App\Http\Controllers;

use App\Http\Controllers\Controller;

class SpiderAdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('home');
  }
}
