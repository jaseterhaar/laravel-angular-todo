<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TodoController extends Controller
{
    public function index () {
        return view('tasks.todolist');
    }
}
