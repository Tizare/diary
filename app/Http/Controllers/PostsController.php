<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\Theme;
use App\Http\Requests\Posts\CreateRequest;
use App\Http\Requests\Posts\EditRequest;
use App\Models\Post;
use App\Models\User;
use App\QueryBuilders\PostsQueryBuilders;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user): View
    {
        $themes = Theme::all();
        return \view('post.create', ['themes' => $themes, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request, User $user): RedirectResponse
    {
        $post = new Post($request->validated());
        $post["user_id"] = $user->id;

        if ($post->save()) {
            return \redirect()->route('diary', ['user' => $user])->with('success');
        }

        return \back()->with('error', 'создать пост не получилось');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id, PostsQueryBuilders $postsQueryBuilders): View
    {
        $post = $postsQueryBuilders->getPostWithComments($id);
        return \view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        $themes = Theme::all();
        return \view('post.edit', ['post' => $post, 'themes' => $themes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Post $post): RedirectResponse
    {
        $post = $post->fill($request->validated());

        if($post->save()) {
            return \redirect()->route('diary', ['user' => $post->user_id])->with('success');
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
