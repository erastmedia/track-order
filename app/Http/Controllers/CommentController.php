<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function uploadComments(Request $request)
    {
        try {
            $commentsData = $request->all();
            
            foreach ($commentsData as $commentData) {
                Comment::create([
                    'name' => $commentData['name'],
                    'idmfreceive' => $commentData['idmfreceive'],
                    'tanggal' => $commentData['tanggal'],
                    'message' => $commentData['message'],
                    'lr' => $commentData['lr'],
                    'kodebuyer' => $commentData['kodebuyer']
                ]);
            }
            
            return response()->json(['message' => 'Comments uploaded successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
