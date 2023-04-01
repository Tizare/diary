<?php

namespace App\Http\Controllers;

use App\QueryBuilders\DiaryQueryBuilders;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiaryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function show(int $id, DiaryQueryBuilders $diaryQueryBuilders): View
    {
        $posts = $diaryQueryBuilders->getUserById($id);
        return \view('diary.show', ['posts' => $posts]);
    }
}
