<?php
namespace Modules\Users\Repositories;

use App\Repositories\Repository;
use App\Models\User;

use DB;

class UsersRepository extends Repository
{
    public function __construct(User $users){
        $this->model = $users;
    }
}