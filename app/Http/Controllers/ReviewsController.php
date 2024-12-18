<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    //thêm đánh giá
    public function postReview(Request $request){
         // Validate dữ liệu đầu vào
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'star' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ],
        [
            'star.required' => 'Bạn phải chọn số sao đánh giá.',
            'comment.required' => 'Nội dung đánh giá không được để trống.',
        ]);;
        $user_name = 'ẩn danh';
        if(auth()->user()){
            $user_name = auth()->user()->name;
    }
        $data = [
            'product_id' => $request->product_id,
            'users_name' =>  $user_name,
            'star' => $request->star,
            'comment' =>$request->comment,
            'status' => 0,
        ];
        // Tạo đánh giá mới
            // $review = new Comment;
            // $review->product_id = $request->input('product_id');
            // $review->user_id = Auth::id();
            // $review->star = $request->input('star');
            // $review->content = $request->input('comment');

            // $review->save();
        $review=Comment::create($data);


        return response()->json([
            'success' => true,
            'message' => 'Review submitted successfully!',
            'star' => $review->star,
            'comment' => $review->comment,
            'user_name' => $review->user->name ?? 'Unknown User',
            'user_avatar' => $review->user->image ?? asset('laptop/assets/img/user/user-1.png'),
            'created_at' => $review->created_at->format('F d, Y'),
        ]);


    }


    public function listComment()
{   
   // $comments = Comment::with('product')->get(); // Lấy danh sách comment và sản phẩm liên quan
   $comments = DB::table('comments')
   ->join('products', 'comments.product_id', '=', 'products.id')
//    ->join('users', 'comments.users_id', '=', 'users.id') // Kiểm tra xem cột này có đúng không
   ->select('comments.*', 'products.name as product_name')
   ->get();

//    dd($comments);
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
