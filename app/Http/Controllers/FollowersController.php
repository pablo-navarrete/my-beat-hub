<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Follower;
use Illuminate\Http\Request;

class FollowersController extends Controller
{
    public function follow(Request $request)
    {
        $followerId = Auth::id();
        $followedId = $request->input('followed_id');

        // Verifica si ya está siguiendo
        $exists = Follower::where('follower_id', $followerId)
                            ->where('followed_id', $followedId)
                            ->exists();

        if ($exists) {
            // Dejar de seguir
            Follower::where('follower_id', $followerId)
                    ->where('followed_id', $followedId)
                    ->delete();
            return response()->json(['status' => 'unfollowed']);
        } else {
            // Seguir
            Follower::create([
                'follower_id' => $followerId,
                'followed_id' => $followedId,
            ]);
            return response()->json(['status' => 'followed']);
        }
    }
}
