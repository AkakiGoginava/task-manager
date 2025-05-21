<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
	public function index(): RedirectResponse
	{
		if (Auth::check()) {
			return redirect()->route('tasks.index');
		} else {
			return redirect()->route('login.index');
		}
	}
}
