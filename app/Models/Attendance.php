<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Session;

class Attendance extends Model {
    use HasFactory;

    protected $table = "attendances";
    protected $fillable = ["user_id", "session_id"];

    public function session() {
        return $this->belongsTo(Session::class);
    }
}
