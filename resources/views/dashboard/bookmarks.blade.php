@extends('dashboard.layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <h1>Bookmarks Management</h1>
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (session()->has('delete'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('delete') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (session()->has('update'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('update') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <a class="btn btn-info text-light mt-2 mb-3" href="/bookmarks/create" role="button">Tambahkan Bookmark Baru</a>
        <table class="table table-info table-striped table-hover table-bordered border-primary table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Summary</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              {{ $no = 1 }}
            @foreach($bookmarks as $bookmark)
                <tr>
                  <th scope="row">{{ $no++  }}</th>
                  <td>{{ $bookmark->name }}</td>
                  <td>{{ $bookmark->category->name }}</td>
                  <td>{{ $bookmark->summary }}</td>
                  <td>
                    <a href="/bookmarks/{{ $bookmark->slug }}" class="badge text-bg-info text-light rounded-pill">Detail</a>
                    <a href="/bookmarks/update/{{ $bookmark->slug }}" class="badge text-bg-warning text-light rounded-pill">Update</a>
                    <form action="/bookmarks/{{ $bookmark->slug }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge text-bg-danger text-light rounded-pill border-0" onclick="return confirm('Kamu yakin?')">Delete</button>
                    </form>
                  </td>
                </tr>
            @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection