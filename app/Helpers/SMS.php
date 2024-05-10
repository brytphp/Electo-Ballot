<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Propaganistas\LaravelPhone\PhoneNumber;

function send_sms($to = '0248130682', $message = 'Hello World')
{
    if (config('app.env') == 'local') {
        Log::channel('sms')->info('sms', [
            'to' => $to,
            'message' => $message,
        ]);

        return false;
        exit();
    }

    if (strlen($to) == 10) {
        $to = str_starts_with($to, '233') ? $to : '233' . ltrim($to, '0');

        try {
            $host = 'https://api.wittyflow.com/v1/messages/send';

            $body = [
                'from' => 'ICAG',
                'to' =>  $to,
                'type' => 1,
                'message' => $message,
                'app_id' => config('witty.app_id'),
                'app_secret' => config('witty.secret'),
                'callback_url' => 'http://mrtimzke7p.sharedwithexpose.com/sms-callback', //route('sms-callback'),
            ];

            $response = Http::post($host, $body);
            $jsonData = $response->json();

            // Log::channel('sms')->info('sms', [
            //     'response' => $jsonData,
            // ]);

            return $jsonData;
        } catch (exception $e) {
            //code to handle the exception
        }
    }

    return 'lol';
}

function sent_messages()
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.wittyflow.com/v1/messages/retireve');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);

    curl_setopt($ch, CURLOPT_POSTFIELDS, '{
    "app_id": "c40f4061-0f4d-4d65-bcca-64d46368ffeb",
    "app_secret": "xpddLelShbPsTplcsTDA2rkuDT82ZIRLV104c0iXQwBr"
    }');

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    var_dump($response);
}

function local_phone_number($number)
{
    if (substr($number, 0, 4) == '+233') {
        $number = str_replace('+233', '0', $number);
    }

    if (substr($number, 0, 4) == '233') {
        $number = str_replace('233', '0', $number);
    }

    if (strlen($number) == 9) {
        (string) '0' . $number;
    }

    return $number;
}

function sanitize_phone_number($number)
{
    $number = str_replace('-', '', $number);
    $number = explode('/', $number)[0];
    $number = str_replace(',', '', $number);
    $number = str_replace('(+)', '+', $number);
    $number = str_replace("'", '', $number);
    $number = explode(',', $number)[0];
    $number = explode('&', $number)[0];
    $number = str_replace(' ', '', $number);
    $number = str_replace('O', '0', $number);
    $number = str_replace('(0)', '0', $number);

    if (in_array(substr($number, 0, 4), local_landlines_prefix())) {
        return null;
    }

    return $number;
}

function format_phone_number($number)
{
    // $number = str_replace('-', '', $number);
    $number = explode('/', $number)[0];
    $number = str_replace(',', '', $number);
    $number = str_replace("'", '', $number);
    $number = explode(',', $number)[0];
    $number = explode('&', $number)[0];
    $number = str_replace(' ', '', $number);
    $number = str_replace('O', '0', $number);

    // $number = (string) PhoneNumber::make($number, 'GH'); //->formatForCountry('GH');

    if (substr($number, 0, 4) == '+233') {
        $number = str_replace('+233', '0', $number);
    }

    if (substr($number, 0, 3) == '233') {
        $number = str_replace('233', '0', $number);
    }

    if (strlen($number) == 9) {
        (string) '0' . $number;
    }

    return $number;
}

function format_name($name)
{
    $name = explode(' ', $name)[0];
    $name = explode('-', $name)[0];
    $name = explode('.', $name)[0];

    return ucfirst(strtolower($name));
}

function wigal_sms($to = 'brytphp@gmail.com', $message = 'Hello World')
{
    $messagedata = [
        'username' => 'icag.accra',
        'password' => '1cAGh456$$',
        'senderid' => 'ICAG',
        'message' => $message,
        'service' => 'EMAIL',
        'smstype' => 'text',
        'subject' => 'Message Subject',
        'fromemail' => 'support@icagh.com',
        'destinations' => [
            [
                'destination' => $to,
                'msgid' => 101,
            ],
        ],
    ];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://frog.wigal.com.gh/api/v2/sendmsg',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($messagedata),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $response = json_decode($response);
    if (!$err || $err == '') {
        if ($response->status == 'ACCEPTED') {
            echo 'message accepted for sending';
        } else {
            echo 'message could not be sent';
        }
    } else {
        echo 'message could not be sent';
    }
}

function local_landlines_prefix()
{
    return [
        '0302',
        '0303',
        '03035',
        '03720',
        '03721',
        '03722',
        '03723',
        '03724',
        '03725',
        '03726',
        '03820',
        '03821',
        '03822',
        '03920',
        '03120',
        '03121',
        '03122',
        '03123',
        '03124',
        '03125',
        '03126',
        '03620',
        '03621',
        '03627',
        '03623',
        '03624',
        '03625',
        '03626',
        '03420',
        '03421',
        '03431',
        '03423',
        '03424',
        '03425',
        '03426',
        '03427',
        '03428',
        '034292',
        '03430',
        '03520',
        '03521',
        '03522',
        '03523',
        '03524',
        '03525',
        '03526',
        '03527',
        '03220',
        '03221',
        '03222',
        '03223',
        '03224',
        '03225',
        '03320',
        '03321',
        '03322',
        '03323',
    ];
}

function local_network_prefix()
{
    return ['023', '024', '025', '053', '054', '055', '059', '027', '057', '026', '056', '028', '020', '050'];
}

function telco($phone)
{

    $codes = [
        '024' => '<img src="' . asset('img/telcos/glo.png') . '" style="width:20px;">',
        '024' => '<img src="' . asset('img/telcos/mtn2.png') . '" style="width:20px;">',
        '025' => '<img src="' . asset('img/telcos/mtn2.png') . '" style="width:20px;">',
        '053' => '<img src="' . asset('img/telcos/mtn2.png') . '" style="width:20px;">',
        '054' => '<img src="' . asset('img/telcos/mtn2.png') . '" style="width:20px;">',
        '055' => '<img src="' . asset('img/telcos/mtn2.png') . '" style="width:20px;">',
        '059' => '<img src="' . asset('img/telcos/mtn2.png') . '" style="width:20px;">',
        '027' => '<img src="' . asset('img/telcos/airteltigo.png') . '" style="width:25px;">',
        '057' => '<img src="' . asset('img/telcos/airteltigo.png') . '" style="width:25px;">',
        '026' => '<img src="' . asset('img/telcos/airteltigo.png') . '" style="width:25px;">',
        '056' => '<img src="' . asset('img/telcos/airteltigo.png') . '" style="width:25px;">',
        '028' => '',
        '020' => '<img src="' . asset('img/telcos/vodafone.png') . '" style="width:25px;">',
        '050' => '<img src="' . asset('img/telcos/vodafone.png') . '" style="width:25px;">',
    ];

    return $codes[substr($phone, 0, 3)] ?? null;
}


function clean_country($country)
{
    if (isset($country) && ctype_alpha($country) && strlen($country) == 2) {
        return $country;
    }

    return 'GH';
}
