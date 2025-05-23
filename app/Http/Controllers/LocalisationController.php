<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class LocalisationController extends Controller
{
	public function changeLocale($locale)
	{
		if (!in_array($locale, ['en', 'ka'])) {
			abort(400);
		}

		Session::put('locale', $locale);

		return redirect()->back();
	}
}
