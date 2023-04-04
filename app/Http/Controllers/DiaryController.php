<?php

namespace App\Http\Controllers;

use App\QueryBuilders\DiaryQueryBuilders;
use App\QueryBuilders\UserQueryBuilders;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiaryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function show(int $id, DiaryQueryBuilders $diaryQueryBuilders, UserQueryBuilders $userQueryBuilders): View
    {
        $diary = $diaryQueryBuilders->getPostsByUserId($id);
        $user = $userQueryBuilders->getUserById($id);
        return \view('diary.show', ['diary' => $diary, 'user' => $user]);
    }
}
