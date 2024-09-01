<?php

namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LikeController extends Controller
{
    public function store($productId)
    {
        $userId = Auth::id();

        // Verificar si el usuario ya ha dado "like" al producto
        $existingLike = Like::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->first();

        if ($existingLike) {
            // Si ya existe, eliminar el "like"
            $existingLike->delete();
        } else {
            // Si no existe, crear un nuevo "like"
            Like::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);
        }

        // Obtener el nuevo conteo de "likes"
        $likesCount = Product::find($productId)->likes()->count();

        return response()->json(['success' => true, 'likes_count' => $likesCount]);
    }

    //muestra los like en el menu
    public function getLikedProducts()
    {
        $user = Auth::user();
        
        // Obtener los productos limitados
        $likedProducts = $user->likes()->with('product')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Contar todos los productos que le gustan
        $totalLikedProducts = $user->likes()->count();
        
        // Construir URLs para los productos y usuarios
        $likedProducts->transform(function ($like) {
            $like->product->url = route('product.verProducto', ['id' => $like->product->id]);
            $like->product->userUrl = route('perfil.perfil', ['id' => $like->product->user_id]);
            $like->product->image_url = Storage::url($like->product->image_url);
            return $like;
        });
    
        return response()->json([
            'products' => $likedProducts,
            'total' => $totalLikedProducts
        ]);
    }
    
    //quitar el like de menu 
    public function removeLike($productId)
    {
        try {
            $user = Auth::user();
            $like = $user->likes()->where('product_id', $productId)->first();
    
            if ($like) {
                $like->delete();
    
                // Obtener el conteo actualizado de likes para el producto
                $likesCount = DB::table('likes')->where('product_id', $productId)->count();
    
                return response()->json([
                    'message' => 'Like removed successfully',
                    'likes_count' => $likesCount
                ]);
            }
    
            return response()->json(['message' => 'Like not found'], 404);
    
        } catch (\Exception $e) {
            // Log the error message for debugging
            Log::error('Error removing like: ' . $e->getMessage());
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }
    

        
}
