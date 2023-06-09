<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\QueryBuilders\AlbumQueryBuilders;
use Illuminate\View\View;

class AlbumController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function show(int $id, AlbumQueryBuilders $albumQueryBuilders): View
    {
        $album = $albumQueryBuilders->getPhotosByUserId($id);
        return \view('album.show', ['album' => $album]);
    }

}
