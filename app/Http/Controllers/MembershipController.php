<?php

namespace App\Http\Controllers;

use App\Models\Membership;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::with('donor', 'payments')->get();
        return view('admin-template.memberships', compact('memberships'));
    }
}
