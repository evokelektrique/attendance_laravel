<?php

namespace App;

use App\Models\User;

class Helper {

    /**
     * Check wheither user has the permission for given action or not.
     * (Caution, It could have been written in a better shape, but I'm in a hurry, not you)
     *
     * @return boolean
     */
    public static function can(int $user_id, string $requested_roles) {
        $user = User::findOrFail($user_id);
        $roles = explode(",", $requested_roles);

        $tickets = [];

        foreach($roles as $role) {
            if($role !== $user->role) {
                $tickets[] = false;
            } else {
                $tickets[] = true;
            }
        }

        if(in_array(true, $tickets)) {
            return true;
        }

        return false;
    }

}
