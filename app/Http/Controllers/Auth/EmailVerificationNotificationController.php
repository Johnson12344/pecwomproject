<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class EmailVerificationNotificationController extends Controller
{
	/**
	 * Send a new email verification notification.
	 */
	public function store(Request $request): RedirectResponse|Response|JsonResponse
	{
		if ($request->user()->hasVerifiedEmail()) {
			if ($request->expectsJson() || $request->wantsJson()) {
				return response()->noContent();
			}

			return redirect()->intended(route('dashboard', absolute: false));
		}

		$request->user()->sendEmailVerificationNotification();

		if ($request->expectsJson() || $request->wantsJson()) {
			return response()->json(['status' => 'verification-link-sent']);
		}

		return back()->with('status', 'verification-link-sent');
	}
}
