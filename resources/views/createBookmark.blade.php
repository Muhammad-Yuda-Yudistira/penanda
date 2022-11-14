@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <h1>{{ $title }}</h1>
        <form action="/bookmarks" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="email" class="form-control" id="name" aria-describedby="nameHelp" name="name">
              <div id="emailHelp" class="form-text">Gunakan nama sesuai bidang keahlian dari yang general sampai ke hal spesifik. <span class="text-info">*nama yang komunikatif atau jelas spesifik akan memudahkan dalam memahami isi bookmark.</span></div>
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="email" class="form-control" id="slug" aria-describedby="slugHelp" name="slug">
              <div id="emailHelp" class="form-text">Slug adalah nama yang telah dimodifikasi menjadi huruf kecil semua dan mengganti setiap spasi dengan garis lurus.</div>
            </div>
            <div class="mb-3">
              <label for="version" class="form-label">Version</label>
              <input type="email" class="form-control" id="version" aria-describedby="versionHelp" name="version">
              <div id="emailHelp" class="form-text">Gunakan nama version seperti dalam pengembangan. contoh: 1.0.0</div>
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <input type="email" class="form-control" id="category" aria-describedby="categoryHelp" name="category">
              <div id="emailHelp" class="form-text">Pilih category paling general dari sebuah profesi bukan nama jurusannya. <span class="text-info">*Hanya kesepakatan dari admin supaya tidak bercabang dalam satu keahlian yang sama. contohnya programmer dan programming adalah dua hal yang sama.</span></div>
            </div>
            <div class="mb-3">
              <label for="uploadFile" class="form-label">Upload File</label>
              <input type="email" class="form-control" id="uploadFile" aria-describedby="uploadFileHelp" name="uploadFile">
              <div id="emailHelp" class="form-text">Pastikan file yang diupload namanya sama persis seperti input nama yang anda isikan diatas. <span class="text-danger">*Jika tidak akan error.</span></span></div>
            </div>
            <div class="mb-3">
              <label for="summary" class="form-label">Summary</label>
              <input type="email" class="form-control" id="summary" aria-describedby="summaryHelp" name="summary">
              <div id="emailHelp" class="form-text">Buatlah slogan yang menjelaskan keunggulan dari bookmark anda dengan penjelasan yang singkat.</div>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <input type="email" class="form-control" id="description" aria-describedby="descriptionHelp" name="description">
              <div id="emailHelp" class="form-text">jelaskan sedetail-detailnya.</div>
            </div>
            <button type="submit" class="btn btn-primary">Buat Bookmark</button>
          </form>
    </div>
</div>
@endsection