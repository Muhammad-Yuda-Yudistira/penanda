@extends('layouts.main')

@section('content')
    <div class="row justify-content-center text-center">
        <div class="col-lg-8">
            <h1>Donation</h1>  
            <p>
                Kenapa harus donasi: saya hanya mendapatkan uang dari donasi dan iklan. Ini adalah pekerjaan saya. Jika anda terbantu dan merasakan manfaatnya tolong berikan saya donasi sejumlah manfaat yang anda rasakan dan berdasar pada uang yang anda miliki. Jika saya dapat hidup dari ini, saya akan mengembangkan ini.
            </p>  
        </div>
    </div>
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