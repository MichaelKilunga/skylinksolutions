<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountDeletionController extends Controller
{
    public function requestDeletion(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'deletion_requested_at' => now(),
        ]);

        return back()->with('status', 'account-deletion-requested');
    }

    public function cancelDeletion(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'deletion_requested_at' => null,
        ]);

        return back()->with('status', 'account-deletion-cancelled');
    }
}
