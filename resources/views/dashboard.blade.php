@extends("layouts.index")

@section("title", "Index page")

@section("content")

{{-- Dashboard Courses List --}}

<div class="level">
    <div class="level-right">
        <span class="level-item is-size-3 has-text-weight-bold has-text-centered-touch is-size-4-touch mb-4">لیست درس های شما</span>
        <small>(واحد های اخذ شده شما طبق نظر استاد راهنمای شما می باشد)</small>
    </div>
</div>

<div class="b-table mt-6">
    <div class="table-wrapper has-mobile-cards">
        <table class="table is-fullwidth is-striped is-hoverable is-fullwidth has-text-right">
            <thead>
                <tr>
                    <th class="has-text-right">نام</th>
                    <th class="has-text-right">واحد</th>
                    <th class="has-text-right">استاد</th>
                </tr>
            </thead>
            <tbody>
                @forelse($user->courses as $course)
                <tr>
                    <td data-label="نام">{{ $course->name }}</td>
                    <td data-label="واحد">{{ $course->unit }}</td>
                    <td data-label="واحد">{{ $course->get_teacher()->name }}</td>
                </tr>
                @empty
                    <p>درسی یافت نشد</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
