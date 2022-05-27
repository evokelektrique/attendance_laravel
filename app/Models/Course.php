<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Course extends Model {
    use HasFactory;

    protected $table = "courses";
    protected $fillable = ["name", "description", "unit"];

    public function users() {
        return $this->belongsToMany(User::class, "course_user");
    }
}
