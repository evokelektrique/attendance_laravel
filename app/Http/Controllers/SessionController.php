<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Models\Course;

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
        return view("sessions.show", ["course" => $course, "session" => $session]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
}
