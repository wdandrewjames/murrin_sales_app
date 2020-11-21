<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;

class ManualUserController extends Controller
{
    public function store(Request $request)
    {
        if ($request->user()->business_id != null) {
            return back();
        }

        $request->validate([
            'business_id' => 'integer|exists:businesses,id|unique:users,business_id',
        ]);

        $business = Business::findOrFail($request->business_id);

        $user = User::create([
            'name' => $business->name,
            'email' => $business->email,
            'email_verified_at' => now()->format('Y-m-d'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'business_id' => $request->business_id
        ]);

        return redirect()->route('business.show', $request->business_id)->with('status', 'Account Created Successfully');
    }
}
