@extends("layouts.index")

@section("title", "Index page")

@section("content")

{{-- Information --}}

<p class="is-size-3 has-text-weight-bold">جلسه "{{$session->title}}"</p>

<div class="columns is-centered mt-6">
    <div class="column">
        <div class="box">
            <p class="mb-2">
                <span class="tag is-info">نام</span>
                <span class="tag is-light">{{$session->title}}</span>
            </p class="mb-2">
            <p class="mb-2">
                <span class="tag is-info">توضیحات</span>
                <span class="tag is-light">{{$session->description}}</span>
            </p class="mb-2">
            <p class="mb-2">
                <span class="tag is-info">تاریخ شروع جلسه</span>
                <span class="tag is-light">{{verta($session->start_at)->format("Y-m-d")}}</span>
            </p>
            <p class="mb-2">
                <span class="tag is-info">تاریخ ایجاد جلسه</span>
                <span class="tag is-light">{{$session->created_at->toJalali()->format("Y-m-d")}}</span>
            </p>
        </div>
    </div>
</div>

{{-- Attendance --}}

<div class="level">
    <div class="level-right">
        <span class="level-item is-size-3 has-text-weight-bold mb-4">حضور و غیاب دانشجویان</span>
    </div>
</div>

<div class="b-table mt-6">
    <div class="table-wrapper has-mobile-cards">
        <table class="table is-fullwidth is-striped is-hoverable is-fullwidth has-text-right">
            <thead>
                <tr>
                    <th class="has-text-right">نام</th>
                    <th class="has-text-right">توضیحات</th>
                    <th class="has-text-right"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($course->users as $user)
                <tr>
                    <td data-label="نام">{{ $user->name }}</td>
                    <td data-label="توضیحات">N/A</td>
                    <td data-label="عملیات">
                        <div class="buttons is-right">
                            {{-- Edit --}}
                            <a href="{{ route("courses.sessions.show", [$course ,$session]) }}" class="button is-small is-light" type="button">مشاهده دانشجو</a>

                            {{-- Show --}}
                            <form method="POST" action="{{route("courses.sessions.destroy", [$course ,$session])}}">
                                <button type="submit" class="button is-small is-danger jb-modal" data-target="sample-modal" type="button">حاضر</button>
                            </form>

                            {{-- Delete --}}
                            <form method="POST" action="{{route("courses.sessions.destroy", [$course ,$session])}}">
                                <button type="submit" class="button is-small is-danger jb-modal" data-target="sample-modal" type="button">غایب</button>
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
