@extends("layouts.index")

@section("title", "Index page")

@section("content")

{{-- Information --}}
<p class="is-size-3 has-text-weight-bold">مشخصات کاربری</p>
<div class="columns is-centered mt-6">
    <div class="column is-3">
        <div class="box">LOGO</div>
    </div>
    <div class="column">
        <div class="box">
            <p class="mb-2">
                <span class="tag is-info">نام</span>
                <span class="tag is-light">نام</span>
            </p class="mb-2">
            <p class="mb-2">
                <span class="tag is-info">نام</span>
                <span class="tag is-light">نام</span>
            </p class="mb-2">
            <p class="mb-2">
                <span class="tag is-info">نام</span>
                <span class="tag is-light">نام</span>
            </p class="mb-2">
            <p class="mb-2">
                <span class="tag is-info">نام</span>
                <span class="tag is-light">نام</span>
            </p class="mb-2">
        </div>
    </div>
</div>

{{-- Users Table --}}
<p class="is-size-3 has-text-weight-bold">لیست کاربران</p>
<div class="b-table mt-6">
    <div class="table-wrapper has-mobile-cards">
        <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>City</th>
                    <th>Progress</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="is-image-cell">
                        <div class="image">
                            <img src="https://avatars.dicebear.com/v2/initials/sienna-hayes.svg" class="is-rounded">
                        </div>
                    </td>
                    <td data-label="Name">Sienna Hayes</td>
                    <td data-label="Company">Conn, Jerde and Douglas</td>
                    <td data-label="City">Jonathanfort</td>
                    <td data-label="Progress" class="is-progress-cell">
                        <progress max="100" class="progress is-small is-primary" value="55">55</progress>
                    </td>
                    <td data-label="Created">
                        <small class="has-text-grey is-abbr-like" title="Mar 7, 2019">Mar 7, 2019</small>
                    </td>
                    <td class="is-actions-cell">
                        <div class="buttons is-right">
                            <button class="button is-small is-primary" type="button">
                                <span class="icon"><i class="mdi mdi-eye"></i></span>
                            </button>
                            <button class="button is-small is-danger jb-modal" data-target="sample-modal" type="button">
                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
