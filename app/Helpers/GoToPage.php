<?php

function goto_page($candidate)
{
    $pages = [
        '0907602a-43ee-4490-8351-b6caa2a57be8' => 8,

        '9d510d59-07ef-4afd-9125-ee9d4d1358f9' => 10,
        'af305fbb-1604-4c0e-a809-02e5011f587e' => 12,

        'db41f679-2a8f-4a30-8ebd-f9b4a8d08be5' => 15,
        '16c985b9-41a8-43e0-8706-e1ebe1b9a2a1' => 17,
        'c800aec8-d45a-4938-9d5d-d51ace1191d7' => 19,
        '5a89f26b-cff7-4aa4-ae78-e6139a637102' => 22,
        '4ca0371f-f031-4313-a375-b7ef3da97d82' => 24,


        'dfeb1608-bfce-47b6-b1ee-42584ff47dde' => 27,
        '3cff6c88-7cdc-49a0-a886-1804984197f4' => 30,
    ];

    return $pages[$candidate] ?? 1;
}
