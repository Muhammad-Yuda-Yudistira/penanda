@extends('layouts.main')

@section('content')
    {{-- bagian product --}}
    <div class="row justify-content-center mb-4">
        <div class="col-lg-8">
            <h1 class="text-center">Penanda</h1>
            <p>Download bookmark khusus untuk web backend programmer dalam mengelola sumber daya yang dibutuhkan. mulai dari app-app untuk coding, documentasinya, framework, package, plugin, app-app frontend dan tools pendukung lainnya yang menunjang keseluruhan project yang akan dikembangkan, end to end, dari tools untuk bisnisnya sampai ke deploy.</p>
        </div>
    </div>


    {{-- bagian download file --}}
    <div class="row justify-content-center mb-4">
      <h1 class="text-center">Bookmark yang tersedia</h1>
      @foreach ($bookmarks as $bookmark)
        <div class="col-lg-4 my-2">
          <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $bookmark->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Category: {{ $bookmark->category_id }}</h6>
                <p class="card-text">{{ $bookmark->summary }}</p>
              </div>
              <div class="card-body">
                <a href="#" class="card-link">programmer</a>
                <a href="#" class="card-link">web developer</a>
                <a href="#" class="card-link">backend developer</a>
                <a href="#" class="card-link">PHP developer</a>
              </div>
              <div class="card-body">
                  <a href="/download/{{ $bookmark->slug }}" class="btn btn-primary">Download</a>
              </div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- bagian how to use --}}
    <div class="row justify-content-center mb-4">
        <div class="col-lg-8 text-center">
            <h1>Bagaimana cara menggunakan bookmark ini</h1>
            <p>Cara menggunakan: download bookmark yang anda inginkan (dalam bentuk file html). Lalu import ke dalam bookmark yang ada di setting web browser(setiap browser mungkin memiliki sedikit perbedaan).</p>
        </div>
    </div>
    
    {{-- bagian donation --}}
    <div class="row justify-content-center mb-4 text-center">
        <h1>Donasi sekarang</h1>
        <p>Bantu kami untuk mengembangkan bookmark terbaik dengan berdonasi sejumlah manfaat yang anda rasakan</p>
        <div class="col-lg-6">
            <form action="" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Alamat email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">Kami tidak pernah membagikan email anda dengan siapa pun</div>
              </div>
              <div class="mb-3">
                <label for="bank" class="form-label">Bank</label>
                <input type="email" class="form-control" id="bank" aria-describedby="emailHelp" name="bank">
                <div id="emailHelp" class="form-text">Pilih bank yang anda miliki.</div>
              </div>
              <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="email" class="form-control" id="nominal" aria-describedby="emailHelp" name="nominal">
                <div id="emailHelp" class="form-text">Jumlah uang yang akan anda donasikan.</div>
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Tulis pesan anda</label>
                <textarea class="form-control" id="message" rows="3" name="message"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
@endsection