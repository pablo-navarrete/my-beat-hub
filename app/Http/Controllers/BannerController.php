<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index(){

        

        return view('admin.banner.index');
    }

    public function getBanner()
    {
    
        $banners = Banner::all();
    
        return DataTables::of($banners)->make(true);
    }

    public function create(){
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        // Validación
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|string',
            'name_button' => 'required|string',
            'filepond' => 'required|file|mimes:jpeg,png',
            'status' => 'required|string',
        ]);
    
        // Retornar errores de validación
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->messages()
            ], 422);
        }
        
    
        // Guardar la imagen en la carpeta específica para el usuario
        $imagePath = $request->file('filepond')->store("images/banner", 'public');
    
    
        // Crear el banner en la base de datos
        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');
        $banner->url = $request->input('url');
        $banner->name_button = $request->input('name_button');
        $banner->image_url = $imagePath;
        $banner->status = $request->input('status');
        $banner->save();
    
        return response()->json([
            'message' => 'El banner se ha guardado correctamente.',
            'redirect_url' => route('banner.index')
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->status = $request->input('status');
        $banner->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        Storage::delete('public/' . $banner->image_url);
        $banner->delete();

        return response()->json(['message' => 'Banner eliminado exitosamente.']);
    }
}
