<?php
namespace App\Http\Controllers;

use App\User;

class UsersController extends CrudController
{
    public function __construct()
    {
        $this->classe = User::class;
    }

}
