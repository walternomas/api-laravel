<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

use App\Http\Resources\V1\PostResource;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //return $post;
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // $post->delete();

        // return response()->json([
        //     'message' => 'Success'
        // ], 204);
        if ($post->delete()) {
            return response()->json([
                'data' => [
                    'message' => 'Post Deleted'
                ]
            ], Response::HTTP_NO_CONTENT);
        }
        return response()->json([
            'data' => [
                'message' => 'Error deleting Post'
            ]
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
