@extends("layouts.index")

@section("title", "Index page")

@section("content")

{{-- Information --}}

<p class="is-size-3 has-text-weight-bold has-text-centered-touch is-size-4-touch">ویرایش کتاب "{{ $course->name }}"</p>

<div class="columns is-centered mt-6">
    <div class="column">
        <div class="box">
            <form id="edit_course_form" method="POST" action="{{route('courses.update', $course)}}">

                {{ csrf_field() }}
                {{ method_field("PUT") }}

                <div class="mb-5 field">
                    <label class="label">نام</label>
                    <p class="control">
                        <input type="text" name="name" class="input" value="{{ $course->name }}" />
                    </p>
                </div>

                <div class="mb-5 field">
                    <label class="label">تعداد واحد</label>
                    <p class="control">
                        <input type="number" min="1" max="99" name="unit" class="input" value="{{ $course->unit }}" />
                    </p>
                </div>

                <div class="mb-5 field">
                    <label class="label">توضیحات</label>
                    <p class="control">
                        <textarea name="description" class="input" style="min-height: 200px;">{{ $course->description }}</textarea>
                    </p>
                </div>

                <button type="submit" class="button is-success mt-5 is-small">ویرایش کتاب</button>
            </form>
        </div>
    </div>
</div>


@endsection
