<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileEditRequest;
use App\Models\Settings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
	public function index(): View
	{
		$user = Auth::user();

		return view('profile.index', [
			'user' => $user,
		]);
	}

	public function update(ProfileEditRequest $request): RedirectResponse
	{
		$user = Auth::user();

		if ($request->update_profile_image === '1') {
			if ($user->profile_image) {
				Storage::disk('public')->delete($user->profile_image);

				$user->profile_image = null;
			}

			if ($request->hasFile('profile_image')) {
				$path = $request->file('profile_image')->store('profile_images', 'public');

				$user->profile_image = $path;
			}
		}

		if ($request->update_cover_image === '1') {
			$coverImg = Settings::first();

			if ($coverImg) {
				Storage::disk('public')->delete($coverImg->cover_image);

				$coverImg->delete();
			}

			if ($request->hasFile('cover_image')) {
				$path = $request->file('cover_image')->store('cover_images', 'public');

				Settings::create(['cover_image' => $path]);
			}
		}

		if ($request->filled('password')) {
			$user->password = $request->password;
		}

		$user->save();

		return redirect()->route('tasks.index')->with('success', __('successMsg.edit_profile'));
	}
}
