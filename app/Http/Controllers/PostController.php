<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class PostController extends Controller
{
	public function index(): JsonResponse
	{
		$posts = Post::where('user_id', auth('api')->id())->latest()->paginate(10);
		return response()->json($posts);
	}

	public function store(Request $request): JsonResponse
	{
		request()->validate([
			'title' => 'required|min:10|max:255',
			'content' => 'required',
		]);

		$request->request->add(['user_id' => auth('api')->id()]);
		$post = Post::create($request->all());
		return response()->json($post);
	}


	public function show(Post $post): JsonResponse
	{
		return response()->json($post);
	}


	public function update(Request $request, Post $post): JsonResponse
	{
		request()->validate([
			'title' => 'required|min:10|max:255',
			'content' => 'required',
		]);
		$request->request->add(['user_id' => auth('api')->id()]);
		Post::where('id', $request->id)->update($request->all());
		return response()->json($request->all());
	}


	public function destroy($post): JsonResponse
	{
		Post::destroy($post);
		return response()->json("ok");
	}
}
