<?php
namespace App\Http\Controllers\admin;
use App\Comment;

class CommentController {

	public function oper() {

		$comment = Comment::orderBy('create','desc')->paginate(6);

		return view('admin/comment/oper',['comment'=>$comment]);
	}


	public function delete($comment_id) {

		$res = Comment::where('id', $comment_id)->delete();

		if ($res) {
			$data = [
				'status' => 0,
				'msg' => '删除成功',
			];
		} else {
			$data = [
				'status' => 1,
				'msg' => '删除失败',
			];
		}

		return $data;
	}
}