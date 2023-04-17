<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Photos\CreateRequest;
use App\Http\Requests\Photos\EditRequest;
use App\Models\Photo;
use App\Models\User;
use App\QueryBuilders\PhotosQueryBuilders;
use App\Services\UploadFileService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function show(int $id, PhotosQueryBuilders $photosQueryBuilders): View
    {
        $photos = $photosQueryBuilders->getPhotosByUserId($id);
        return \view('photos', ['photos' => $photos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo): View
    {
        return \view('photo.edit', ['photo' => $photo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Photo $photo): RedirectResponse
    {
        $photo = $photo->fill($request->validated());

        if($photo->save()) {
            return \redirect()->route('photos', ['user_id' => $photo->user_id]);
        }

        return \back()->with('error', 'не получилось');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo): RedirectResponse
    {
        $photo->delete();

        return \back();
    }
}
