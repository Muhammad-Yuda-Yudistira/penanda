@extends('dashboard.layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <h1>{{ $title }}</h1>
        <form action="/bookmarks" method="post">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Bookmark Names</label>
              <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name" autofocus>
              <div id="emailHelp" class="form-text">Gunakan nama sesuai bidang keahlian dari yang general sampai ke hal spesifik. <span class="text-info">*nama yang komunikatif atau jelas spesifik akan memudahkan dalam memahami isi bookmark.</span></div>
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control" id="slug" aria-describedby="slugHelp" name="slug" readonly>
              <div class="form-text">Slug adalah nama yang telah dimodifikasi menjadi huruf kecil semua dan mengganti setiap spasi dengan garis lurus.</div>
            </div>
            <div class="mb-3">
              <label for="version" class="form-label">Version</label>
              <input type="text" class="form-control" id="version" aria-describedby="versionHelp" name="version">
              <div id="version" class="form-text">Gunakan nama version seperti dalam pengembangan. contoh: 1.0.0</div>
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <input type="text" class="form-control" id="category" aria-describedby="categoryHelp" name="category">
              <div id="emailHelp" class="form-text">Pilih category paling general dari sebuah profesi bukan nama jurusannya. <span class="text-info">*Hanya kesepakatan dari admin supaya tidak bercabang dalam satu keahlian yang sama. contohnya programmer dan programming adalah dua hal yang sama.</span></div>
            </div>
            <div class="mb-3">
              <label for="file" class="form-label">Masukan file berekstensi html</label>
              <input class="form-control" type="file" id="file" name="file">
              <div id="emailHelp" class="form-text">Pastikan file yang diupload namanya sama persis seperti slug yang anda isikan diatas. <span class="text-danger">*Jika tidak akan error.</span></span></div>
            </div>
            <div class="mb-3">
              <label for="summary" class="form-label">Summary</label>
              <input type="text" class="form-control" id="summary" aria-describedby="summaryHelp" name="summary">
              <div id="emailHelp" class="form-text">Buatlah slogan yang menjelaskan keunggulan dari bookmark anda dengan penjelasan yang singkat.</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
              <input id="description" type="hidden" name="description">
                <trix-editor input="description"></trix-editor>
              <div id="emailHelp" class="form-text">jelaskan sedetail-detailnya.</div>
            </div>
            <button type="submit" class="btn btn-primary">Buat Bookmark</button>
          </form>
          <a href="/bookmarks">kembali</a>
    </div>
</div>

<script>
  const name = document.querySelector('#name')
  const slug = document.querySelector('#slug')

  name.addEventListener('change', function() {
    fetch('/bookmarks/checkSlug?name=' + name.value, )
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  })
</script>
@endsection