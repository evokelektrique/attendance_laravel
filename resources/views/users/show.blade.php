@extends("layouts.index")

@section("title", "Index page")

@section("content")

{{-- Information --}}
<p class="is-size-3 has-text-weight-bold">مشخصات کاربر "{{$user->name}}"</p>
<div class="columns is-centered mt-6">
    <div class="column is-3">
        <div class="box">LOGO</div>
    </div>
    <div class="column">
        <div class="box">
            <p class="mb-2">
                <span class="tag is-info">نام</span>
                <span class="tag is-light">{{$user->name}}</span>
            </p class="mb-2">
            <p class="mb-2">
                <span class="tag is-info">ایمیل</span>
                <span class="tag is-light">{{$user->email}}</span>
            </p class="mb-2">
            <p class="mb-2">
                <span class="tag is-info">نقش</span>
                <span class="tag is-light">{{$user->get_role()}}</span>
            </p class="mb-2">
            <p class="mb-2">
                <span class="tag is-info">وضعیت</span>
                <span class="tag is-light">{{$user->get_verified()}}</span>
            </p class="mb-2">
            <p class="mb-2">
                <span class="tag is-info">تاریخ ثبت نام</span>
                <span class="tag is-light">{{$user->created_at->toJalali()->format("Y-m-d")}}</span>
            </p class="mb-2">
        </div>
    </div>
</div>


@endsection
