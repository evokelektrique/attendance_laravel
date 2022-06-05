<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use App\Models\Session;


class Course extends Model {
    use HasFactory;

    protected $table = "courses";

    protected $fillable = ["name", "description", "unit", "teacher_id"];

    protected $fillable = ["name", "description", "unit"];


    public function users() {
        return $this->belongsToMany(User::class, "course_user");
    }


    public function sessions() {
        return $this->hasMany(Session::class);
    }

    public function get_teacher() {
        return User::find($this->teacher_id);
    }

}
