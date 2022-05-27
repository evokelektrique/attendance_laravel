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
    <div class="column is-4">
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
                دانشجویان درس
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

    <div class="column is-4">
        <article class="panel is-info">
            <p class="panel-heading">
                استاد درس
            </p>
            <div class="panel-block has-text-centered is-justify-content-center">
                <p class="is-size-7 has-text-grey">
                    راهنما:
                    کاربر مورد نظر را انتخاب کرده و بر روی دکمه ثبت کلیک نمایید
                </p>
            </div>

            {{-- Users Form --}}
            <form method="POST" action="{{ route("course.update_teacher", $course) }}">
                {{ csrf_field() }}

                @forelse($teachers as $teacher)
                <label class="panel-block is-flex is-justify-content-space-between">
                    <div class="is-flex is-align-items-center">
                        <input type="radio" name="teacher_id" {!! ($course->users->contains($teacher->id)) ? 'checked=""' : "" !!} value="{{$teacher->id}}">
                        {{ $teacher->name }}
                    </div>
                    <div>
                        <span class="tag is-info">{{ $teacher->get_role() }}</span>
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

{{-- Sessions --}}

<div class="level">
    <div class="level-right">
        <span class="level-item is-size-3 has-text-weight-bold mb-4">لیست جلسات</span>
    </div>
    <div class="level-left">
        <div class="level-item">

        <a href="{{ route("courses.sessions.create", $course) }}" class="mb-4 button is-success is-outlined is-small">افزودن جلسه جدید</a>
        </div>

    </div>
</div>
<div class="b-table mt-6">
    <div class="table-wrapper has-mobile-cards">
        <table class="table is-fullwidth is-striped is-hoverable is-fullwidth has-text-right">
            <thead>
                <tr>
                    <th class="has-text-right">نام</th>
                    <th class="has-text-right">توضیحات</th>
                    <th class="has-text-right">تاریخ شروع</th>
                    <th class="has-text-right"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($course->sessions as $session)
                <tr>
                    <td data-label="نام">{{ $session->title }}</td>
                    <td data-label="توضیحات">{{ $session->description }}</td>
                    <td data-label="توضیحات">{{ verta($session->start_at)->format("Y-m-d") }}</td>
                    <td data-label="عملیات">
                        <div class="buttons is-right">
                            {{-- Edit --}}
                            <a href="{{ route("courses.sessions.show", [$course ,$session]) }}" class="button is-small is-light" type="button">مشاهده</a>

                            {{-- Show --}}
                            <a href="{{ route("courses.sessions.edit", [$course ,$session]) }}" class="button is-small is-info" type="button">ویرایش</a>

                            {{-- Delete --}}
                            <form method="POST" action="{{route("courses.sessions.destroy", [$course ,$session])}}">
                                {{ csrf_field() }}
                                {{ method_field("DELETE") }}
                                <button type="submit" class="button is-small is-danger jb-modal" data-target="sample-modal" type="button">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                    <p>No session</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
