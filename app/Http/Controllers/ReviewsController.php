<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    //thêm đánh giá
    public function postReview(Request $request){
         // Validate dữ liệu đầu vào
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'star' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        // Tạo đánh giá mới
            // $review = new Comment;
            // $review->product_id = $request->input('product_id');
            // $review->user_id = Auth::id();
            // $review->star = $request->input('star');
            // $review->content = $request->input('comment');
            
            // $review->save();
        Comment::create($request->all());

        return redirect()->back()->with('success', 'Đánh giá của bạn đã được ghi nhận!');
    }

    public function listComment() {
        $comments = Comment::all();
        return view('admins.comment.list', compact('comments'));
    }

    public function deleteComment($id) {
        $comments = Comment::findOrFail($id);
        $comments->delete();
        return redirect()->back();
    }

    public function updateStatus(Request $req) {
        $comment = Comment::findOrFail($req->commentId);
        $comment->status = $req->status;
        $comment->save();
    }
}
