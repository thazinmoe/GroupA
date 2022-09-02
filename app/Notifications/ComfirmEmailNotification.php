<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\Customer_comfirm;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ComfirmEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Customer_comfirm $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello, '.$this->customer->customer_name)
                    ->line('Welcome to Tour-booking-project(GROUPA).')
                    ->line('Package Name - '.$this->customer->travel_packages->name)
                    ->line('Package Duration - '.$this->customer->travel_packages->duration)
                    ->line('Package Price - '.$this->customer->travel_packages->price.'MMK')
                    ->line('Package Count - '.$this->customer->package_count)
                    ->line('Total Package Price - '.$this->customer->package_price.'MMK')
                    ->action('HomePage', url('/'))
                    ->line('Thank you for Booking!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
