<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends CrudController
{
    public function __construct()
    {
        $this->classe = User::class;
    }

    public function indexActive(Request $request)
    {
        return $this->classe::where('active', true)->paginate($request->per_page);
    }
}
