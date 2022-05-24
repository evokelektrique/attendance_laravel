<?php

namespace App;

use App\Models\User;

class Helper {

    /**
     * Check wheither user has the permission for given action or not.
     *
     * @return boolean
     */
    public static function can(int $user_id, string $role) {
        $user = User::findOrFail($user_id);
        if($role !== $user->role) {
            return false;
        }

        return true;
    }

}
