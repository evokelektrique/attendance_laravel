<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helper;

class UsersController extends Controller
{
    protected $model;
    protected $user;

    public function __construct(User $user) {
        $this->model = $user;

        if(auth()->check()) {
            // Find current logged in user by his Email
            $user_email = auth()->user()->email;
            $this->user = $this->model->where("email", $user_email)->first();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user) {
        $users = $this->model::all();

        if(!Helper::can($this->user->id, "admin")) {
            return redirect()->route("dashboard.index");
        }

        return view("users.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Cannot be done with Auth0
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Cannot be done with Auth0
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->model->findOrFail($id);

        return view("users.show", ["user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->model->findOrFail($id);

        return view("users.edit", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if(!Helper::can($this->user->id, "admin")) {
            return redirect()->route("dashboard.index");
        }

        $rules = [
            "name" => "required",
            "email" => "required",
            "role" => "required",
            "verified" => "required",
        ];
        $attributes = $this->validate($request, $rules);

        $this->model->where("id", $id)->update($attributes);

        return redirect()->route("users.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Helper::can($this->user->id, "admin")) {
            return redirect()->route("dashboard.index");
        }

        $user = $this->model->find($id);
        dd($user->name);
    }
}
