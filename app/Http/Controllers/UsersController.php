<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {

        if ($this->sortable()) {
            $users = User::orderBy(request('sortBy'), request('direction'))->paginate(20);
        } else {
            $users = User::paginate(20);
        }


        return view('users.index', compact('users'));
    }

    protected function sortable()
    {
        if (request('direction') !== 'asc' && request('direction') !== 'desc') {
            return false;
        }

        if (request('sortBy') !== 'name' && request('sortBy') !== 'city') {
            return false;
        }

        return true;
    }
}
