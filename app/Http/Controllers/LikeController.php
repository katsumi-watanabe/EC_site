<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function store($productId)
    {
        Auth::user()->likes($productId);
        // $like = new Like;
        // $like->user_id = Auth::user()->id;
        // $like->product_id = $productId;
        // dd(Auth::id());
        // $like->user_id = Auth::id();
        // $like->save();
        if (null === $like) {
            // do something here so the code
            // after the block doesn't fail
            abort(404, "Unable to find a role by slug"); // <-- example
        }

        return 'ok!'; //レスポンス内容
    }

    public function destroy($productId)
    {
        Auth::user()->unlike($productId);
        return 'ok!'; //レスポンス内容
    }
}
