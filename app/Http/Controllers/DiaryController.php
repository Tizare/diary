<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\QueryBuilders\DiaryQueryBuilders;
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
