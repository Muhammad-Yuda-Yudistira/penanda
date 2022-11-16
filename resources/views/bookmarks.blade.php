@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <h1>Bookmarks Management</h1>
        <a class="btn btn-info text-light mt-2 mb-3" href="/bookmarks/create" role="button">Tambahkan Bookmark Baru</a>
        <table class="table table-info table-striped table-hover table-bordered border-primary table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Summary</th>
                <th scope="col" colspan="3">Actions</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($bookmarks as $bookmark)
                <tr>
                  <th scope="row">{{ $bookmark->id }}</th>
                  <td>{{ $bookmark->name }}</td>
                  <td>{{ $bookmark->category->name }}</td>
                  <td>{{ $bookmark->summary }}</td>
                  <td><a href="/bookmarks/{{ $bookmark->slug }}" class="badge text-bg-info text-light rounded-pill">Detail</a></td>
                  <td><a href="/bookmarks/update/{{ $bookmark->slug }}" class="badge text-bg-warning text-light rounded-pill">Update</a></td>
                  <td><a href="#" class="badge text-bg-danger text-light rounded-pill">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection