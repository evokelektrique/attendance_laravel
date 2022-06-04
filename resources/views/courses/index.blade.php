@extends("layouts.index")

@section("title", "Courses")

@section("content")

{{-- Courses List --}}

<div class="level">
    <div class="level-right">
        <span class="level-item is-size-3 has-text-weight-bold mb-4">لیست درس ها</span>
    </div>
    <div class="level-left">
        <div class="level-item">

        <a href="{{ route("courses.create") }}" class="mb-4 button is-success is-outlined is-small">افزودن درس جدید</a>
        </div>

    </div>
</div>
<div class="b-table mt-6">
    <div class="table-wrapper has-mobile-cards">
        <table class="table is-fullwidth is-striped is-hoverable is-fullwidth has-text-right">
            <thead>
                <tr>
                    <th class="has-text-right">نام</th>
                    <th class="has-text-right">واحد</th>
                    <th class="has-text-right">تاریخ ایجاد</th>
                    <th class="has-text-right"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                <tr>
                    <td data-label="نام">{{ $course->name }}</td>
<<<<<<< HEAD
                    <td data-label="واحد">{{ $course->unit }}</td>
=======
                    <td data-label="ایمیل">{{ $course->unit }}</td>
>>>>>>> 12974a6c3b14b0a367d0d9647dfd294bb01fb326
                    <td data-label="تاریخ ایجاد">
                        <small class="has-text-grey is-abbr-like">{{ $course->created_at->toJalali()->format('Y-m-d') }}</small>
                    </td>
                    <td class="is-actions-cell">
                        <div class="buttons is-right">
                            {{-- Edit --}}
                            <a href="{{ route("courses.show", $course->id) }}" class="button is-small is-light" type="button">مشاهده</a>
                            <a href="{{ route("courses.edit", $course->id) }}" class="button is-small is-info" type="button">ویرایش</a>

                            {{-- Delete --}}
                            <form method="POST" action="{{route("courses.destroy", $course->id)}}">
                                {{ csrf_field() }}
                                {{ method_field("DELETE") }}
                                <button type="submit" class="button is-small is-danger jb-modal" data-target="sample-modal" type="button">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                    <p>No courses</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
