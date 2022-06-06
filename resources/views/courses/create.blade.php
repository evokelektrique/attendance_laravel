@extends("layouts.index")

@section("title", "Index page")

@section("content")

{{-- Information --}}
<p class="is-size-3 has-text-weight-bold has-text-centered-touch is-size-4-touch">افزودن کتاب</p>
<form id="create_course_form" method="POST" action="{{route('courses.store')}}">
    <div class="columns is-centered mt-6">
        <div class="column">
            <div class="box">
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
            </div>
        </div>

        {{-- Teacher --}}
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
                {{ csrf_field() }}

                @forelse($teachers as $teacher)
                <label class="panel-block is-flex is-justify-content-space-between">
                    <div class="is-flex is-align-items-center">
                        <input type="radio" name="teacher_id" @if($loop->first) checked="" @endif value="{{$teacher->id}}">
                        {{ $teacher->name }}
                    </div>
                    <div>
                        <span class="tag is-info">{{ $teacher->get_role() }}</span>
                    </div>
                </label>
                @empty
                <label class="panel-block">کاربری یافت نشد</label>
                @endforelse
            </article>
        </div>
    </div>
</form>


@endsection
