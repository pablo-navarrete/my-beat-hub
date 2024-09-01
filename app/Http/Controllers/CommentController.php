<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function getComments($productId)
    {
        $comments = Comment::where('product_id', $productId)
                            ->with('user')
                            ->orderBy('created_at', 'desc')
                            ->get();
        return response()->json(['comments' => $comments]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'user_id' => 'required|integer', // Asegúrate de validar user_id
            'comment' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->product_id = $request->input('product_id');
        $comment->user_id = $request->input('user_id'); // Guardar user_id
        $comment->comment = $request->input('comment');
        $comment->save();

        return response()->json(['success' => true]);
    }
    
    public function destroy($id)
    {
        $comment = Comment::find($id);

        if ($comment && $comment->user_id == Auth::id()) {
            $comment->delete();
            return response()->json(['success' => true, 'message' => 'Comentario eliminado correctamente.']);
        } else {
            return response()->json(['success' => false, 'message' => 'No tienes permiso para eliminar este comentario.']);
        }
    }
}
