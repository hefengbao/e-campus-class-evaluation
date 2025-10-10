<?php

return [
    'sso' => env('SSO', false),
    'cas' => [
        'server_hostname' => env('CAS_SERVER_HOSTNAME'),
        'server_port' => env('CAS_SERVER_PORT',443),
        'server_uri' => env('CAS_SERVER_URI','/authserver'),
        'service_base_url' => explode(',', env('CAS_SERVICE_BASE_URL')),
    ]
];
