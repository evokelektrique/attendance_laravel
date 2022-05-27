<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Session extends Model {
    use HasFactory;

    protected $table = "sessions";
    protected $fillable = ["course_id", "title", "description", "start_at"];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
