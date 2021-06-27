<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductComment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index() {
        $comments = DB::table('product_comments')
        ->join('users', 'users.id', '=', 'product_comments.user_id')
        ->select('users.name', 'users.surname', 'product_comments.comment', 'product_comments.id')->get();

        return view('admin.comments.index', [
            'comments' => $comments,
        ]);
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'max:32',
            'surname' => 'max:32',
            'comment' => '',
        ]);

        $productComment = ProductComment::get();

        $productComment->update([
            'comment' => $request->comment,
        ]);


        return back();
    }

    public function destroy($id)
    {
        $productComment = ProductComment::find($id);
        $productComment->delete();

        ProductComment::where('id', $id)->delete();
        return back();
    }
}
