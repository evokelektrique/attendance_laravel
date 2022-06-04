<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
<<<<<<< HEAD
use App\Models\Session;
=======
>>>>>>> 12974a6c3b14b0a367d0d9647dfd294bb01fb326

class Course extends Model {
    use HasFactory;

    protected $table = "courses";
<<<<<<< HEAD
    protected $fillable = ["name", "description", "unit", "teacher_id"];
=======
    protected $fillable = ["name", "description", "unit"];
>>>>>>> 12974a6c3b14b0a367d0d9647dfd294bb01fb326

    public function users() {
        return $this->belongsToMany(User::class, "course_user");
    }
<<<<<<< HEAD

    public function sessions() {
        return $this->hasMany(Session::class);
    }

    public function get_teacher() {
        return User::find($this->teacher_id);
    }
=======
>>>>>>> 12974a6c3b14b0a367d0d9647dfd294bb01fb326
}
