<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class User extends Model {
    use HasFactory;

    protected $table = "users";
    protected $fillable = ["name", "email", "role", "status", "verified"];

    public function courses() {
        return $this->belongsToMany(Course::class, "course_user");
    }

    public function get_role() {
        switch ($this->role) {
            case 'student':
                return "دانشجو";
                break;

            case 'admin':
                return "مدیر کل";
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
