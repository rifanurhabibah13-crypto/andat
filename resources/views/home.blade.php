@extends('layouts.main')

@section('title','Studio Musik - Home')

@section('content')
<section class="hero">
    <div class="container">
        <h1>Studio Musik</h1>
        <p class="lead">Sewa ruang studio profesional untuk recording, rehearsal, streaming atau sesi privat. Mudah dipesan, aman, dan terjangkau.</p>
        <div class="cta">
            <a href="{{ route('register') }}" class="button">Daftar Sekarang</a>
            <a href="{{ route('login') }}" style="margin-left:12px;color:#fff;opacity:0.95">Masuk</a>
        </div>
        <div class="card-grid">
            <div class="card">
                <h3>Ruang Profesional</h3>
                <p class="muted">Ruang ber-AC, akustik terkontrol, peralatan tersedia sesuai paket.</p>
            </div>
            <div class="card">
                <h3>Layanan Fleksibel</h3>
                <p class="muted">Recording, rehearsal, live streaming — pilih layanan sesuai kebutuhan.</p>
            </div>
            <div class="card">
                <h3>Pemesanan Mudah</h3>
                <p class="muted">Pilih tanggal dan jam, konfirmasi pembayaran manual, pantau riwayat booking.</p>
            </div>
        </div>
    </div>
</section>

<section class="container" style="margin-top:28px">
    <h2>Bagaimana Cara Kerja</h2>
    <ol>
        <li>Daftar / Masuk</li>
        <li>Pilih ruangan</li>
        <li>Tentukan tanggal & jam, lalu pesan</li>
        <li>Lakukan pembayaran (manual/opsi admin)</li>
    </ol>
</section>

@endsection
