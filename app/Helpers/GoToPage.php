<?php

function goto_page($candidate)
{
    $pages = [
        '0907602a-43ee-4490-8351-b6caa2a57be8' => 7,

        '75bbfa89-833f-49b2-9353-77649d95ec06' => 10,
        '0420ba32-e146-47e7-a0e9-c17b7076ab82' => 12,
        '75193a07-38a7-4c97-8d13-adbf30aec7c7' => 14,

        'f1d76bb9-0bda-43a5-acdc-7041c271fd66' => 16,
        '49f30ee8-4573-495f-bbf8-8809afbcf4af' => 19,
        '4d6c6d6b-d401-4553-8701-65606c44d56c' => 21,
        '197c25c6-30c4-422e-a17d-a1c1ff41f986' => 23,
        '973da841-1449-4ac6-97bd-e8dc012cda3a' => 26,
        'd5236ad8-15f6-4f35-8a73-9a0fbe81bf64' => 28,

        '66bda8dc-a9e5-49d0-9962-6777cfe5cb76' => 30,
        'b1c6ca1c-a26a-4bbb-a011-aa38038cfa01' => 33,
        'f6e7d366-5cd8-4cf4-a5b5-5106b3428b72' => 35,
    ];

    return $pages[$candidate] ?? 1;
}
