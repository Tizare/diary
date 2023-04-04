<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\EditRequest;
use App\Models\Post;
use App\QueryBuilders\PostsQueryBuilders;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $id, PostsQueryBuilders $postsQueryBuilders): View
    {
        $posts = $postsQueryBuilders->getPostsByUserId($id);
        return \view('diary.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, PostsQueryBuilders $postsQueryBuilders): View
    {
        $post = $postsQueryBuilders->getPostById($id);
        return \view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Post $post): RedirectResponse
    {
        $post = $post->fill($request->validated());

        if($post->save()) {
            return \back()->with('success');
        }

        return \back()->with('error', 'не получилось');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
