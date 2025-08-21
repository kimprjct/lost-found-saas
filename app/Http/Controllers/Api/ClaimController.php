<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function store(Request $request)
    {
        // TODO: Implement claim creation logic
        return response()->json(['message' => 'Claim created']);
    }
}
