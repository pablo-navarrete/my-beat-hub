<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Follower;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TiendaController extends Controller
{
    public function index() {
        $banners = Banner::where('status', 1)->get();

        $userId = Auth::id(); // Obtener el ID del usuario autenticado
        $users = User::all();
        $recentProducts = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->leftJoin('comments', 'products.id', '=', 'comments.product_id')
            ->leftJoin('likes', 'products.id', '=', 'likes.product_id')
            ->select('products.*', 'users.username as user_name',
                DB::raw('COUNT(DISTINCT comments.id) as comments_count'),
                DB::raw('COUNT(DISTINCT likes.id) as likes_count'),
                DB::raw('SUM(CASE WHEN likes.user_id = ' . ($userId ?? 0) . ' THEN 1 ELSE 0 END) as liked') // Verificar si el usuario ha dado like
            )
            ->where('products.status', 1)
            ->groupBy('products.id', 'users.username')
            ->orderBy('products.created_at', 'desc')
            ->limit(8)
            ->get();


            $isFollowing = [];

    if (Auth::check()) {
        foreach ($users as $user) {
            // Verificar si el usuario autenticado sigue a cada usuario en la lista
            $isFollowing[$user->id] = Follower::where('follower_id', $userId)
                                              ->where('followed_id', $user->id)
                                              ->exists();
        }
    }

        return view('welcome', compact('recentProducts', 'banners','users','isFollowing'));
    }

}
