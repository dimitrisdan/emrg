<?php

/**
 * Authy configuration & API credentials
 * @author Raza Mehdi<srmk@outlook.com>
 */

return [
    'mode' => env('AUTHY_MODE', 'live'), // Can be either 'live' or 'sandbox'. If empty or invalid 'live' will be used
    'sandbox' => [
        'key' => env('AUTHY_TEST_KEY', 'f45ec9af9dcb7419dc52b05889c858e9')
    ],
    'live' => [
        'key' => env('AUTHY_LIVE_KEY', 'KShA2sDrQupg8zjTYRPpbeKU3Yvq69cz')
    ],
    'sms' => env('AUTHY_SEND_SMS', true),
];
