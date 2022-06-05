<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Session;

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

            case 'teacher':
                return "استاد";
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

    /**
     * Check if user has attended to the session
     *
     * @param  Session $session
     * @return boolean
     */
    public function is_attended(Session $session) {
        if($session->attendances->contains("user_id", $this->id)) {
            return true;
        }

        return false;
    }

}
