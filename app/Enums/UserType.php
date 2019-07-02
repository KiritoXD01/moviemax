<?php

namespace App\Enums;

class UserType
{
    /*
     * Here we assign the user type to the users
     */
    const ADMIN = 1;
    const USER  = 2;
    /*
     * Array created to smooth the use in html forms and array iterations
     */
    const UserTypes = [
        1 => 'ADMIN',
        2 => 'USER'
    ];
}