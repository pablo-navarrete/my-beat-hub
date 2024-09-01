<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){

        return view('product.index');
    }

    public function create(){

        $categories = Category::where('status', 1)->get();

        return view('product.create', compact('categories'));
    }

  
    public function store(Request $request)
    {
        // Validación
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'tempo' => 'required|numeric',
            'key' => 'required|string',
            'category' => 'required|integer',
            'price' => 'required|numeric',
            'filepond' => 'required|file|mimes:jpeg,png',
            'fileInputBeat' => 'required|file|mimes:mp3',
        ]);
    
        // Retornar errores de validación
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->messages()
            ], 422);
        }
        
        // Obtener el ID del usuario
        $userId = auth()->id();
    
        // Guardar la imagen en la carpeta específica para el usuario
        $imagePath = $request->file('filepond')->store("images/{$userId}", 'public');
    
        // Guardar el archivo de audio en la carpeta específica para el usuario
        $audioPath = $request->file('fileInputBeat')->store("audio/{$userId}", 'public');
    
        // Crear el producto en la base de datos
        $product = new Product();
        $product->title = $request->input('name');
        $product->description = $request->input('description');
        $product->tempo = $request->input('tempo');
        $product->key = $request->input('key');
        $product->category_id = $request->input('category');
        $product->price = $request->input('price');
        $product->image_url = $imagePath;
        $product->audio_url = $audioPath;
        $product->user_id = $userId; // Asegúrate de almacenar el ID del usuario si es necesario
        $product->status = 0;
        $product->license_id = 0;
        $product->copyright_id = 0;
        $product->save();
    
        return response()->json([
            'message' => 'El producto se ha guardado correctamente.',
            'redirect_url' => route('product.index')
        ]);
    }
    
    public function getProduct()
    {
        $userId = auth()->id();
    
        $products = Product::where('user_id', $userId)
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->select('products.*', 'categories.name as category_name');
    
        return DataTables::of($products)
            ->filterColumn('category_name', function($query, $keyword) {
                $query->where('categories.name', 'like', "%{$keyword}%");
            })
            ->make(true);
    }

    public function verProducto($id){
    
        $userId = Auth::id(); 
    
        $product = Product::join('categories', 'products.category_id', '=', 'categories.id')
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
                'products.user_id',
                'categories.name as category_name',
                'users.username as user_name',
                DB::raw('COUNT(comments.id) as comments_count'),
                DB::raw('COUNT(DISTINCT likes.id) as likes_count'),
                DB::raw('SUM(CASE WHEN likes.user_id = ' . ($userId ?? 0) . ' THEN 1 ELSE 0 END) as liked')
            )
            ->where('products.id', $id)
            ->groupBy(
                'products.id',
                'products.title',
                'products.image_url',
                'products.audio_url',
                'products.description',
                'products.key',
                'products.tempo',
                'products.price',
                'products.category_id',
                'categories.name',
                'users.username'
            )
            ->first();
    
        return view('view-product', [
            'product' => $product
        ]);
    }
    

}
