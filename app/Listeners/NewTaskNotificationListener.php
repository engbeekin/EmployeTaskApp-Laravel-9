<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NotifyEmployeeNewTask;
use Illuminate\Support\Facades\Notification;

class NewTaskNotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $task=$event->task;
         $users=User::where('department_id',$task->department_id)->get();
        Notification::send($users,new NotifyEmployeeNewTask($task->id,$task->task_name,auth()->user()->name));
    }
}
