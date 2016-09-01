<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Task;

class ApiTodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
		return $tasks;
    }

    public function store(Request $request)
    {
        $tasks = Task::create(Request::all());
		return $tasks;
    }


    public function update(Request $request, $id)
    {
		$task = Task::find($id);
        $task->taak = Request::input('taak');
		$task->done = Request::input('done');
		$task->save();
 
		return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		Task::destroy($id);
    }
}
