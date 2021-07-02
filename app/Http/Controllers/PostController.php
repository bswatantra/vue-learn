<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
	public function index(): JsonResponse
	{
		$posts = Post::latest()->paginate(1);
		return response()->json($posts);
	}

	public function store(): JsonResponse
	{
		request()->validate([
			'title' => 'required|min:10|max:255',
			'content' => 'required',
		]);

		$post = Post::create(request()->only('title', 'content'));
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

		$post = Post::update(request()->only('title', 'content'));
		return response()->json($post);
	}


	public function destroy($post): JsonResponse
	{
		Post::destroy($post);
		return response()->json("ok");
	}
}
