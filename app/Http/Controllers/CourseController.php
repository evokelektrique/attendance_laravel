<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helper;

class CourseController extends Controller
{
    protected $model;
    protected $user;

    public function __construct(Course $course, User $user) {
        $this->model = $course;

        if(auth()->check()) {
            // Find current logged in user by his Email
            $user_email = auth()->user()->email;
            $this->user = User::where("email", $user_email)->first();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->model::all();

        if(!Helper::can($this->user->id, "teacher,admin,supervisor")) {
            return redirect()->route("dashboard.index");
        }

        // if(!Helper::can($this->user->id, "admin")) {
        //     return redirect()->route("dashboard.index");
        // }

        return view("courses.index", ["courses" => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(!Helper::can($this->user->id, "admin,supervisor")) {
            return redirect()->route("dashboard.index");
        }

        $teachers = User::all()->where("verified", true)->where("role", "teacher");
        return view("courses.create", ["teachers" => $teachers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!Helper::can($this->user->id, "admin,supervisor")) {
            return redirect()->route("dashboard.index");
        }

        $rules = [
            "name" => "required",
            "unit" => "required",
            "description" => "required",
            "teacher_id" => "required",
        ];

        // Validate
        $attributes = $this->validate($request, $rules);

        // Save
        $course = new $this->model($attributes);
        $course->save();

        return redirect()->route("courses.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {

        if(!Helper::can($this->user->id, "teacher,admin,supervisor")) {
            return redirect()->route("dashboard.index");
        }

        $users = User::all()->where("verified", true)->where("role", "student");
        $teachers = User::all()->where("verified", true)->where("role", "teacher");
        $data = ["course" => $course, "users" => $users, "teachers" => $teachers];

        return view("courses.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {

        if(!Helper::can($this->user->id, "admin,supervisor")) {
            return redirect()->route("dashboard.index");
        }

        return view("courses.edit", [ "course" => $course ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {

        if(!Helper::can($this->user->id, "admin,supervisor")) {
            return redirect()->route("dashboard.index");
        }

        $rules = [
            "name" => "required",
            "unit" => "required",
            "description" => "required",
        ];

        // Validate
        $attributes = $this->validate($request, $rules);

        $this->model->where("id", $course->id)->update($attributes);

        return redirect()->route("courses.index");
    }

    public function update_users(Request $request, Course $course) {

        if(!Helper::can($this->user->id, "admin,supervisor")) {
            return redirect()->route("dashboard.index");
        }

        $course->users()->detach();
        $course_users = $request->get("course_users");
        $course->users()->attach($course_users);

        $user_count = 0;

        if($course_users) {
            $user_count = count($course_users);
        }

        $message = "با موفقیت " . $user_count . " کاربر به درس مورد نظر اضافه شدند" ;
        return redirect()->back()->with("success", $message);
    }

    public function update_teacher(Request $request, Course $course) {

        if(!Helper::can($this->user->id, "admin,supervisor")) {
            return redirect()->route("dashboard.index");
        }

        $teacher_id = $request->get("teacher_id");
        $course->teacher_id = $teacher_id;
        $course->save();

        $message = "استاد مورد نظر با موفقیت به درس اضافه شد";
        return redirect()->back()->with("success_teacher", $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if(!Helper::can($this->user->id, "admin")) {
            return redirect()->route("dashboard.index");
        }

        $course->delete();
        return redirect()->back();
    }

}
