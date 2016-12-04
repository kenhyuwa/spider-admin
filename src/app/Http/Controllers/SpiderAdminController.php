<?php

namespace Ken\SpiderAdmin\App\Http\Controllers;

use App\Http\Controllers\Controller;

class SpiderAdminController extends Controller
{
	public function index()
	{
		return view('home');
	}
}
