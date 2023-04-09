<?php

namespace App\Http\Controllers;

use App\Http\Requests\Photos\CreateRequest;
use App\Models\Photo;
use App\Models\User;
use App\Services\UploadFileService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PhotosController extends Controller
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
    public function create(User $user): View
    {
        return \view('photo.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request, User $user,
                          UploadFileService $uploadFileService)
    {
        $photo = new Photo($request->validated());

        $photo['user_id'] = $user->id;
        $photo['url'] = $uploadFileService->uploadImage($request->file('image'));
        if($photo->save()) {
            return \redirect()->route('album', ['id'=> $user->id])->with('success');
        }

        return \back()->with('error', 'вклеить фото не получилось');
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
