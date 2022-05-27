@extends("layouts.index")

@section("title", "Index page")

@section("content")

{{-- Information --}}
<p class="is-size-3 has-text-weight-bold">افزودن جلسه</p>
<div class="columns is-centered mt-6">
    <div class="column">
        <div class="box">
            <form id="create_session_form" method="POST" action="{{route('courses.sessions.store', $course)}}">

                {{ csrf_field() }}

                <div class="columns">
                    <div class="column">
                        <div class="mb-5 field">
                            <label class="label">نام</label>
                            <p class="control">
                                <input type="text" name="title" class="input"/>
                            </p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="mb-5 field">
                            <label class="label">تاریخ</label>
                            <p class="control">
                                <input type="text" name="start_at" class="input" data-jdp />
                            </p>
                        </div>
                    </div>
                </div>


                <div class="mb-5 field">
                    <label class="label">توضیحات</label>
                    <p class="control">
                        <textarea name="description" class="input" style="min-height: 200px;"></textarea>
                    </p>
                </div>

                <button type="submit" class="button is-success mt-5 is-small">ثبت جلسه</button>
            </form>
        </div>
    </div>
</div>


@endsection
