<?php

namespace App\Http\Controllers;

use App\QueryBuilders\UserQueryBuilders;
use Illuminate\Contracts\View\View;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(UserQueryBuilders $userQueryBuilders): View
    {
        $lastUsers = $userQueryBuilders->getLastUsers();
        $waiting = $userQueryBuilders->getWaitingUsers();
        $ready = $userQueryBuilders->getNotWaitingUsers();
        return \view('welcome', ['last_users' => $lastUsers, 'waiting' => $waiting, 'ready' => $ready]);
    }
}
