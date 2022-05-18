<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    use HasFactory;

    protected $table = "users";
    protected $fillable = ["name", "email", "role", "status", "verified"];

    public function get_role() {
        switch ($this->role) {
            case 'student':
                return "دانشجو";
                break;

            default:
                break;
        }
    }

    public function get_verified() {
        if(!$this->verified) {
            return "تایید نشده";
        }

        return "تایید شده";
    }

}
