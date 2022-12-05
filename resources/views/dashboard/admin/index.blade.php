@extends('dashboard.layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <h1>Users Management</h1>
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
        <a class="btn btn-info text-light mt-2 mb-3" href="/dashboard/users/create" role="button">Tambahkan User Baru</a>
        <table class="table table-info table-striped table-hover table-bordered border-primary table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($users as $user)
                <tr>
                  <th scope="row">{{ $loop->iteration  }}</th>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    <a href="/dashboard/users/{{ $user->username }}" class="badge text-bg-info text-light rounded-pill">Detail</a>
                    <a href="/dashboard/users/{{ $user->username }}/edit" class="badge text-bg-warning text-light rounded-pill">Update</a>
                    <form action="/dashboard/users/{{ $user->username }}" method="post" class="d-inline">
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