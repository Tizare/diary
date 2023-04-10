<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\QueryBuilders\DiaryQueryBuilders;
use App\QueryBuilders\UserQueryBuilders;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiaryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function show(User $user, DiaryQueryBuilders $diaryQueryBuilders): View
    {
        $diary = $diaryQueryBuilders->getPostsByUserId($user->id);
        return \view('diary.show', ['diary' => $diary, 'user' => $user]);
    }
}
