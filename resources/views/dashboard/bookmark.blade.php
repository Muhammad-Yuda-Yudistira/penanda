@extends('dashboard.layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <h1>Detail Bookmark</h1>
        <table class="table table-info table-hover table-striped-columns table-sm table-borderless">
            <thead>
              <tr>
                <th scope="col" colspan="2">Bookmark had by: {{ $bookmark->user->name }}</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                  <th scope="row">Name:</th>
                  <td>{{ $bookmark->name }}</td>
                </tr>
                <tr>
                  <th scope="row">Version:</th>
                  <td>{{ $bookmark->version }}</td>
                </tr>
                <tr>
                  <th scope="row">Category:</th>
                  <td>{{ $bookmark->category->name }}</td>
                </tr>
                <tr>
                  <th scope="row">File bookmark:</th>
                  <td>{{ asset('storage/' . $bookmark->file) }}</td>
                </tr>
                <tr>
                  <th scope="row">Created at:</th>
                  <td>{{ $bookmark->created_at }}</td>
                </tr>
                <tr>
                  <th scope="row">Updated at:</th>
                  <td>{{ $bookmark->updated_at }}</td>
                </tr>
                <tr>
                  <th scope="row">Description:</th>
                  <td>{!! $bookmark->description !!}</td>
                </tr>
            </tbody>
          </table>
          <a href="/dashboard/bookmarks/{{ auth()->user()->id }}">kembali</a>
    </div>
</div>
@endsection