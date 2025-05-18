<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
	public function index()
	{
		if (Auth::check()) {
			return redirect()->route('tasks.index');
		} else {
			return redirect()->route('login.index');
		}
	}
}
