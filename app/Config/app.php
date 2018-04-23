<?php

return [
    'auth' => [

        /**
         * Authorization type
         * 
         * Example:
         * Check if a property ('user_type') of the current user equals value ('Admin'). 
         */
        'authorization' => [
            'admin' => ['user_type', '=', 'Admin']
        ],

        /**
         * modulusPHP Auth Controllers
         */
        'controllers' => [
            'Login',
            'Logout',
            'Password',
            'Register'
        ]
    ]
];