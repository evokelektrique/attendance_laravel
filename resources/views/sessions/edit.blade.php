@extends("layouts.index")

@section("title", "Index page")

@section("content")

{{-- Information --}}
<p class="is-size-3 has-text-weight-bold has-text-centered-touch is-size-4-touch">ویرایش جلسه "{{ $session->title }}"</p>
<div class="columns is-centered mt-6">
    <div class="column">
        <div class="box">
            <form id="create_session_form" method="POST" action="{{route('courses.sessions.store', [$course, $session])}}">

                {{ csrf_field() }}

                <div class="columns">
                    <div class="column">
                        <div class="mb-5 field">
                            <label class="label">نام</label>
                            <p class="control">
                                <input type="text" name="title" class="input" value="{{ $session->title }}" />
                            </p>
                        </div>
                    </div>

                    <div class="column">
                        <div class="mb-5 field">
                            <label class="label">تاریخ</label>
                            <p class="control">
                                <input type="text" name="start_at" class="input" data-jdp value="{{ verta($session->start_at)->format("Y-m-d") }}" />
                            </p>
                        </div>
                    </div>
                </div>


                <div class="mb-5 field">
                    <label class="label">توضیحات</label>
                    <p class="control">
                        <textarea name="description" class="input" style="min-height: 200px;">{{ $session->description }}</textarea>
                    </p>
                </div>

                <button type="submit" class="button is-success mt-5 is-small">ویرایش جلسه</button>
            </form>
        </div>
    </div>
</div>


@endsection
