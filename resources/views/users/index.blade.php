@extends("layouts.index")

@section("title", "Users")

@section("content")

{{-- Users List --}}

<p class="is-size-3 has-text-weight-bold">لیست کاربران</p>
<div class="b-table mt-6">
    <div class="table-wrapper has-mobile-cards">
        <table class="table is-fullwidth is-striped is-hoverable is-fullwidth has-text-right">
            <thead>
                <tr>
                    <th class="has-text-right"></th>
                    <th class="has-text-right">نام</th>
                    <th class="has-text-right">ایمیل</th>
                    <th class="has-text-right">نقش</th>
                    <th class="has-text-right">وضعیت</th>
                    <th class="has-text-right">تاریخ ثبت نام</th>
                    <th class="has-text-right"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td class="is-image-cell">
                        <div class="image">
                            <img src="https://avatars.dicebear.com/v2/initials/sienna-hayes.svg" class="is-rounded">
                        </div>
                    </td>
                    <td data-label="نام">{{ $user->name }}</td>
                    <td data-label="ایمیل">{{ $user->email }}</td>
                    <td data-label="نقش">{{ $user->get_role() }}</td>
                    <td data-label="وضعیت" @class([
                        "has-text-danger" => !$user->verified,
                        "has-text-success" => $user->verified
                        ])>{{ $user->get_verified() }}</td>
                    <td data-label="تاریخ ثبت نام">
                        <small class="has-text-grey is-abbr-like">{{ $user->created_at->toJalali()->format('d-m-Y') }}</small>
                    </td>
                    <td class="is-actions-cell">
                        <div class="buttons is-right">
                            {{-- Edit --}}
                            <a href="{{ route("users.show", $user->id) }}" class="button is-small is-light" type="button">مشاهده</a>
                            <a href="{{ route("users.edit", $user->id) }}" class="button is-small is-info" type="button">ویرایش</a>

                            {{-- Delete --}}
                            <form method="POST" action="{{route("users.destroy", $user->id)}}">
                                {{ csrf_field() }}
                                {{ method_field("DELETE") }}
                                <button type="submit" class="button is-small is-danger jb-modal" data-target="sample-modal" type="button">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                    <p>No users</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
