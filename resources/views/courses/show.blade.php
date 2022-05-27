@extends("layouts.index")

@section("title", "Show course")

@section("content")

{{-- Information --}}
<p class="is-size-3 has-text-weight-bold">مشاهده درس "{{$course->name}}"</p>

{{-- Notifications --}}
@if(Session::has("success"))
    <div class="notification is-success my-5">
        <button class="delete"></button>
        {{ Session::get("success") }}
    </div>
@endif

<div class="columns is-centered mt-6">
    {{-- Course Information --}}
    <div class="column is-8">
        <div class="box">
            <div class="is-flex mb-5">
                <p class="ml-2">
                    <span class="tag is-info">آخرین ویرایش</span>
                    <span class="tag is-light">{{$course->updated_at->toJalali()->format("Y-m-d")}}</span>
                </p>
                <p class="ml-2">
                    <span class="tag is-info">کاربران درس</span>
                    <span class="tag is-light">{{ count($course->users) }}</span>
                </p>
            </div>

            <p class="mb-2">
                {{$course->description}}
            </p>

        </div>
    </div>

    <div class="column is-4">
        <article class="panel is-info">
            <p class="panel-heading">
                کاربران درس
            </p>
            <div class="panel-block has-text-centered is-justify-content-center">
                <p class="is-size-7 has-text-grey">
                    راهنما:
                    کاربر مورد نظر را انتخاب کرده و بر روی دکمه ثبت کلیک نمایید
                </p>
            </div>

            {{-- Users Form --}}
            <form method="POST" action="{{ route("course.update_users", $course) }}">
                {{ csrf_field() }}

                @forelse($users as $user)
                <label class="panel-block is-flex is-justify-content-space-between">
                    <div class="is-flex is-align-items-center">
                        <input type="checkbox" name="course_users[]" {!! ($course->users->contains($user->id)) ? 'checked=""' : "" !!} value="{{$user->id}}">
                        {{ $user->name }}
                    </div>
                    <div>
                        <span class="tag is-info">{{ $user->get_role() }}</span>
                    </div>
                </label>
                @empty
                <label class="panel-block">کاربری یافت نشد</label>
                @endforelse
                <div class="panel-block">
                    <button class="button is-success is-outlined is-fullwidth" type="submit">ثبت</button>
                </div>
            </form>
        </article>
    </div>
</div>


@endsection
