<?php

namespace App\Http\Controllers;

use App\Events\TaskEvent;
use App\Models\task;
use App\Models\User;
use App\Models\Depatment;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatetaskRequest;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tasks=task::getTask();
         return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Depatment::all('id','dep_name');
        return view('tasks.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      $task=  task::create($request->all());

    TaskEvent::dispatch($task);

        return to_route('task.index')->with('success','Task Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task=task::findOrFail($id);
         $departments=Depatment::all('id','dep_name');
        return view('tasks.edit',compact('task','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests  $request
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $task=task::findOrFail($id);
         $task->update($request->all());
         return to_route('task.index')->with('success','Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task)
    {
        $task->delete();
        return to_route('task.index')->with('delete','Task Deleted Successfully');
    }
}
