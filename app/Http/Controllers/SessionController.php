<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Session;
use App\Models\Attendance;

class SessionController extends Controller
{
    protected $model;

    public function __construct(Session $session) {
        $this->model = $session;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        return view("sessions.create", ["course" => $course]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Course $course, Request $request)
    {

        $rules = [
            "title" => "required",
            "description" => "required",
            "start_at" => "required",
        ];

        // Validate
        $attributes = $this->validate($request, $rules);

        // Convert Jalali datetime to Gregorian
        $start_at_timestamp = verta()::parseFormat('Y-m-d', $attributes["start_at"])->formatGregorian("Y-m-d H:i:s");
        $attributes["start_at"] = $start_at_timestamp;

        // Save
        $course->sessions()->create($attributes);

        return redirect()->route("courses.show", [$course->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Session $session)
    {
        // $attendances =
        return view("sessions.show", ["course" => $course, "session" => $session]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Session $session)
    {
        $data = ["course" => $course, "session" => $session];
        return view("sessions.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Session $session)
    {
        $session->delete();

        return redirect()->back();
    }

    /**
     * Make a user absent
     *
     * @param  \App\Models\Course  $course
     * @param  \App\Models\Session $session
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function absent(Course $course, Session $session, User $user) {
        $match = ["user_id" => $user->id, "session_id" => $session->id];
        $attendance = Attendance::where($match);
        $attendance->delete();

        return redirect()->back();
    }

    /**
     * Make a user present
     *
     * @param  \App\Models\Course  $course
     * @param  \App\Models\Session $session
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function present(Course $course, Session $session, User $user) {
        $attendance = Attendance::firstOrCreate([
            "user_id" => $user->id,
            "session_id" => $session->id,
        ]);

        return redirect()->back();
    }
}
