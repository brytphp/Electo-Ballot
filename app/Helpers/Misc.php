<?php

use App\Models\User;

function mask($str, $first, $last)
{
    try {
        $len = strlen($str);
        $toShow = $first + $last;

        return substr($str, 0, $len <= $toShow ? 0 : $first).str_repeat('*', $len - ($len <= $toShow ? 0 : $toShow)).substr($str, $len - $last, $len <= $toShow ? 0 : $last);
    } catch (\Throwable $th) {
        //throw $th;
    }
}

function mask_email($email)
{
    try {

        $mail_parts = explode('@', $email);
        $domain_parts = explode('.', $mail_parts[1]);

        $mail_parts[0] = mask($mail_parts[0], 2, 1); // show first 2 letters and last 1 letter
        // $domain_parts[0] = mask($domain_parts[0], 2, 1); // same here
        $mail_parts[1] = implode('.', $domain_parts);

        return implode('@', $mail_parts);
    } catch (\Throwable $th) {
        //throw $th;
    }
}

function nice_number($amount = null)
{
    return number_format($amount);
}

function img_encode($path)
{
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);

    return $base64 = 'data:image/'.$type.';base64,'.base64_encode($data);
}

function sms_deliverability()
{
    $progress = 0;
    try {
        $voters = User::where('access_role', 'user')->count();
        $unchecked = User::whereNotNull('phone')->where('access_role', 'user')->count();
        $progress = round((($unchecked / $voters) * 100), 2);
    } catch (\Throwable $th) {
        //throw $th;
    }

    return $progress;
}

function total_number_of_voters()
{
    return User::where('access_role', 'user')->count();
}
