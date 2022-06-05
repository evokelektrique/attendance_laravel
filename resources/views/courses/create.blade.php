@extends("layouts.index")

@section("title", "Index page")

@section("content")

{{-- Information --}}
<p class="is-size-3 has-text-weight-bold">افزودن کتاب</p>
<div class="columns is-centered mt-6">
    <div class="column">
        <div class="box">

            <form id="create_course_form" method="POST" action="{{route('courses.store')}}">

            <form id="edit_user_form" method="POST" action="{{route('courses.store')}}">


                {{ csrf_field() }}

                <div class="mb-5 field">
                    <label class="label">نام</label>
                    <p class="control">
                        <input type="text" name="name" class="input"/>
                    </p>
                </div>

                <div class="mb-5 field">
                    <label class="label">تعداد واحد</label>
                    <p class="control">
                        <input type="number" min="1" max="99" name="unit" class="input" value="1" />
                    </p>
                </div>

                <div class="mb-5 field">
                    <label class="label">توضیحات</label>
                    <p class="control">
                        <textarea name="description" class="input" style="min-height: 200px;"></textarea>
                    </p>
                </div>

                <button type="submit" class="button is-success mt-5 is-small">ثبت کتاب</button>
            </form>
        </div>
    </div>
</div>


@endsection
