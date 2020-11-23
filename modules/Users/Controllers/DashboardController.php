<?php

namespace Modules\Users\Controllers;

use Auth;
use Hash;
use Validator;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Modules\Users\Repositories\UsersRepository;

class DashboardController extends Controller
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

    public function index()
    {  
        return view('Users::dashboard');
    }
}