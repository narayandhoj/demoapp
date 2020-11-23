<?php

namespace Modules\Users\Controllers;

use Hash;
use Validator;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\Users\Repositories\UsersRepository;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  consumersRepository  $contents
     * @return void
     */
    public function __construct(UsersRepository $users){
        $this->users = $users;
    }
}