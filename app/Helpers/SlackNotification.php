<?php

use App\Models\User;
use App\Notifications\Telegram;
use App\Notifications\ToSlack;

function toSlack($message)
{
    // if (misc()->send_slack_notifications == 1) {}
    Notification::send(User::whereAccessRole('admin')->first(), new ToSlack($message));
}

function toTelegram($message = null)
{
    User::whereAccessRole('admin')->first()->notify(new Telegram(['text' => 'Am here']));
}
