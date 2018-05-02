<?php

return [
    'app' => [
        'root' => getenv('APP_ROOT')
    ],

    'auth' => [

        /**
         * Authorization type
         * 
         * Example:
         * Check if a property ('user_type') of the current user equals value ('Admin'). 
         */
        'allowed' => [
            'admin' => ['user_type', '=', 'admin']
        ],

        /**
         * modulusPHP Auth Controllers
         */
        'controllers' => [
            'Login',
            'Password',
            'Register'
        ]
    ]
];