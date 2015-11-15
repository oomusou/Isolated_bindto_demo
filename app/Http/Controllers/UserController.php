<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Closure;

class UserController extends Controller
{
    /**
     * @var Closure
     */
    protected $getAll;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->getAll = function () {
            return User::all();
        };
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->getAll->__invoke();
        return view('users.index', compact('users'));
    }
}
