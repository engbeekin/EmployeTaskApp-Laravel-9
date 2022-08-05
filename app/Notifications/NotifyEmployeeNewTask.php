<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyEmployeeNewTask extends Notification
{
    use Queueable;
    public $task_id;
    public $task_name;
    public $created_by;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($task_id,$task_name,$created_by)
    {
        $this->task_id=$task_id;
        $this->task_name=$task_name;
        $this->created_by=$created_by;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    // /**
    //  * Get the mail representation of the notification.
    //  *
    //  * @param  mixed  $notifiable
    //  * @return \Illuminate\Notifications\Messages\MailMessage
    //  */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'task_id'=>$this->task_id,
            'task_name'=>$this->task_name,
            'created_by'=>$this->created_by,
        ];
    }
}
