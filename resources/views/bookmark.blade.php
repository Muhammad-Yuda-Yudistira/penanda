@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <h1>Bookmarks Management</h1>
        <table class="table table-info table-hover table-striped-columns table-sm table-borderless">
            <thead>
              <tr>
                <th scope="col" colspan="2">Nama: {{ $bookmark->name }}</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                  <th scope="row">Version:</th>
                  <td>{{ $bookmark->version }}</td>
                </tr>
                <tr>
                  <th scope="row">Category:</th>
                  <td>{{ $bookmark->category->name }}</td>
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
                  <td>{{ $bookmark->description }}</td>
                </tr>
            </tbody>
          </table>
          <a href="/bookmarks">kembali</a>
    </div>
</div>
@endsection