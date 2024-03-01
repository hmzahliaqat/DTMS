<?php

namespace App\Helper;
class getRoleIdFromUserRole{


    public static function getRole($roleName)
{

    switch ($roleName) {
        case 'hod_cs':
            return 3;
        case 'hod_eed':
            return 1;
        case 'hod_mth':
            return 2;
        default:
            return null; // if the role is not recognized
    }
}

}
