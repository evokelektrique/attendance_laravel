@extends("layouts.index")

@section("title", "Index page")

@section("content")

{{-- Information --}}
<p class="is-size-3 has-text-weight-bold has-text-centered-touch is-size-4-touch">ویرایش کاربر "{{$user->name}}"</p>
<div class="columns is-centered mt-6">
    <div class="column is-3">
        <div class="box">LOGO</div>
    </div>
    <div class="column">
        <div class="box">
            <form id="edit_user_form" method="POST" action="{{route("users.update", $user->id)}}">

                {{ csrf_field() }}
                {{ method_field("PUT") }}

                <div class="mb-2 field has-addons">
                    <p class="control">
                        <a href="#" class="button is-static">نام</a>
                    </p>
                    <p class="control">
                        <input type="text" name="name" class="input" value="{{$user->name}}"/>
                    </p>
                </div>

                <div class="mb-2 field has-addons">
                    <p class="control">
                        <a href="#" class="button is-static">ایمیل</a>
                    </p>
                    <p class="control">
                        <input type="text" name="email" class="input" value="{{$user->email}}"/>
                    </p>
                </div>

                <div class="mb-2 field has-addons">
                    <p class="control">
                        <a href="#" class="button is-static">نقش</a>
                    </p>

                    <div class="control">
                        <div class="select">
                            @php
                            $roles = ["student" => "دانشجو", "admin" => "مدیر کل", "teacher" => "استاد", "supervisor" => "مسئول"];
                            @endphp
                            <select name="role">
                                @foreach($roles as $option_key => $option_value)
                                <option value="{{$option_key}}" {{$option_key == $user->role ? "selected" : ""}}>{{$option_value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-2 field has-addons">
                    <p class="control">
                        <a href="#" class="button is-static">وضعیت</a>
                    </p>
                    <div class="control">
                        <div @class([
                        "select",
                        "is-danger" => !$user->verified,
                        "is-success" => $user->verified,
                        ])>
                            @php
                            $verified_options = [0 => "تایید نشده", 1 => "تایید شده"];
                            @endphp
                            <select name="verified">
                                @foreach($verified_options as $option_key => $option_value)
                                <option value="{{$option_key}}" {{$option_key == $user->verified ? "selected" : ""}}>{{$option_value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="button is-success mt-5 is-small">ثبت ویرایش</button>
            </form>
        </div>
    </div>
</div>


@endsection
