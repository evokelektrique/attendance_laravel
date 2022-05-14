@extends("layouts.index")

@section("title", "Users")

@section("content")

{{-- List Users --}}
@forelse($users as $user)
    <p>This is user {{ $user->id }}</p><br>
@empty
    <p>No users</p>
@endforelse

@endsection
