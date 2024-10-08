<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function getCategories()
    {
        $categories = Category::query();

        return DataTables::of($categories)
            ->make(true);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'status' => 'required|integer|in:0,1'
        ]);

        // Crear una nueva categoría
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();

        // Devolver una respuesta adecuada
        return response()->json(['success' => 'Categoría agregada exitosamente']);
    }


    public function update(Request $request, $id)
    {
        // Validación de los datos del formulario
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'status' => 'required|integer|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Encontrar el registro y actualizarlo
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        return response()->json(['message' => 'Categoría actualizada exitosamente.']);
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Categoría eliminada exitosamente.']);
    }

    public function updateStatus(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->status = $request->input('status');
        $category->save();

        return response()->json(['success' => true]);
    }

    //mostrar categoria en inicio e-commerce
    public function category()
    {

        $categories = Category::where('status', 1)->get();
        return view('category', compact('categories'));
    }


    public function tipoCategory($id)
    {
        // Lógica para manejar la categoría con el ID proporcionado
        $category = Category::find($id);

        if (!$category) {
            abort(404); // O manejar el caso en que la categoría no exista
        }

        $products = $category->products()
        ->join('users', 'products.user_id', '=', 'users.id')
        ->leftJoin('comments', 'products.id', '=', 'comments.product_id')
        ->leftJoin('likes', 'products.id', '=', 'likes.product_id')
        ->select('products.*', 'users.username as user_name',
                DB::raw('COUNT(DISTINCT comments.id) as comments_count'),
                DB::raw('COUNT(DISTINCT likes.id) as likes_count'),
                DB::raw('SUM(CASE WHEN likes.user_id = ' . ($userId ?? 0) . ' THEN 1 ELSE 0 END) as liked'))
        ->where('products.status', 1)
        ->groupBy('products.id', 'users.username')
        ->orderBy('products.created_at', 'desc')->get();
        // Pasar la categoría a la vista
        return view('tipo-categoria', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
