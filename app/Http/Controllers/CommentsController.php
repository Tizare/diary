<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Comments\CreateRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store (User $user, Post $post, CreateRequest $request): RedirectResponse
    {
        $comment = new Comment($request->validated());
        $comment['user_id'] = $user->id;
        $comment['post_id'] = $post->id;

        if ($comment->save()) {
            return \redirect()->route('comments', ['post_id' => $post->id])->with('success');
        }

        return \back()->with('error', 'создать пост не получилось');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
