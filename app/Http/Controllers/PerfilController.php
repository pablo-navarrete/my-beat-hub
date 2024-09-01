<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    public function perfil($id)
    {
        // Obtener el usuario junto con el conteo de sus productos
        $user = User::where('id', $id)
            ->firstOrFail();

        $seguidores = Follower::where('followed_id',$id)->count();
        $seguidos = Follower::where('follower_id',$id)->count();

        $seguidoresName = DB::table('followers')
        ->join('users', 'followers.follower_id', '=', 'users.id')
        ->where('followers.followed_id', $id)
        ->select('users.id', 'users.username')
        ->get();

        $seguidosName = DB::table('followers')
        ->join('users', 'followers.followed_id', '=', 'users.id')
        ->where('followers.follower_id', $id)
        ->select('users.id', 'users.username')
        ->get();

        $userId = Auth::id(); // Obtener el ID del usuario autenticado

        $isFollowing = false;

        if (Auth::check()) {
            $isFollowing = Follower::where('follower_id', Auth::id())
                                   ->where('followed_id', $id)
                                   ->exists();
        }

    
     // Verificar si el usuario autenticado sigue a cada seguidor
     $seguidoresName = $seguidoresName->map(function($followed) use ($userId) {
        $followed->isFollowing = DB::table('followers')
            ->where('follower_id', $userId)
            ->where('followed_id', $followed->id)
            ->exists();
        return $followed;
    });

      // Verificar si el usuario autenticado sigue a cada seguidor
      $seguidosName = $seguidosName->map(function($follower) use ($userId) {
        $follower->isFollowing = DB::table('followers')
            ->where('followed_id', $userId)
            ->where('follower_id', $follower->id)
            ->exists();
        return $follower;
    });
      
        $products = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('users', 'products.user_id', '=', 'users.id')
        ->leftJoin('comments', 'products.id', '=', 'comments.product_id')
        ->leftJoin('likes', 'products.id', '=', 'likes.product_id')
        ->select(
            'products.id',
            'products.title',
            'products.description',
            'products.price',
            'products.image_url',
            'products.audio_url',
            'products.category_id',
            'products.key',
            'products.tempo',
            'categories.name as category_name',
            'users.username as user_name',
            DB::raw('COUNT(DISTINCT comments.id) as comments_count'),
            DB::raw('COUNT(DISTINCT likes.id) as likes_count'),
            DB::raw('SUM(CASE WHEN likes.user_id = ' . ($userId ?? 0) . ' THEN 1 ELSE 0 END) as liked')
        )
        ->where('products.user_id', $id)
        ->where('products.status', 1)
        ->groupBy('products.id', 'products.title', 'products.description', 'products.created_at', 'users.username')
        ->orderBy('products.created_at', 'desc')
        ->get();
    
       $countProducts = Product::where('user_id',$id)
       ->where('status',1)->count();
        // Pasar los datos a la vista
        return view('perfil', compact('user', 'products','countProducts','isFollowing','seguidores','seguidos','seguidoresName','seguidosName'));
    }

    public function getFollowStats($id)
    {
        
        $seguidores = Follower::where('followed_id',$id)->count();
        $seguidos = Follower::where('follower_id',$id)->count();

        return response()->json([
            'seguidores' => $seguidores,
            'seguidos' => $seguidos
        ]);
    }

    

}
