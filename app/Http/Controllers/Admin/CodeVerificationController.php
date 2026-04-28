<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CodeVerificationController extends Controller
{
    /**
     * Show the form to verify the 6-digit code.
     */
    public function showVerifyForm(Request $request)
    {
        $email = $request->email;
        if (!$email) {
            return redirect()->route('admin.password.request')->withErrors(['email' => 'Please enter your email first.']);
        }

        return view('admin.auth.verify-code', compact('email'));
    }

    /**
     * Verify the 6-digit code.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'code' => 'required|digits:6',
        ]);

        $record = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if (!$record) {
            return back()->withErrors(['code' => 'Invalid request or code expired.']);
        }

        // Check expiry (30 minutes)
        if (Carbon::parse($record->created_at)->addMinutes(30)->isPast()) {
            return redirect()->route('admin.password.request')->withErrors(['email' => 'Verification code has expired.']);
        }

        // Verify hash
        if (!Hash::check($request->code, $record->token)) {
            return back()->withErrors(['code' => 'The code you entered is incorrect.']);
        }

        // Store in session to allow access to reset form
        session(['reset_email' => $request->email, 'reset_code' => $request->code]);

        return redirect()->route('admin.password.reset', ['token' => 'verified']) // Using 'verified' as a dummy token
                        ->with('status', 'Code verified. You can now reset your password.');
    }
}
