@extends('Layout.header')

@section('main')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 mb-4">
                <h2 class="mt-2 text-center font-weight-light text-muted text-uppercase">
                    {{$hasil->nama ?? 'Nama belum diseet'}}</h2>
            </div>
            <div class="col-12 grid-margin" id="introduction">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4">Keterangan</h3>
                        <p>{{$hasil->keterangan ?? 'keterangan belum diset'}}</p>
                        <form action="{{url('button-tidak-aktif/'.$hasil->id)}}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">Ngga Suka</button>
                        </form>
                    </div>
                </div>
                <br><br><br>

                <div class="col-12 grid-margin" id="options">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Detail</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <thead>

                                        </thead>
                                        <tr>
                                            <td>Cocok Untuk </td>
                                            <td>
                                                @if($hasil->idWaktu == 1)
                                                Makan Pagi
                                                @elseif($hasil->idWaktu == 2)
                                                Makan Siang
                                                @else
                                                Makan Malam
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>{{$hasil->nama ?? 'Nama belum diset'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Lokasi</td>
                                            <td>{{$hasil->lokasi}}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>Rp {{$hasil->harga}}</td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>{{$hasil->keterangan}}</td>
                                        </tr>
                                        <tr>
                                            <td>Status Rekomendasi</td>
                                            <td>
                                                @if($hasil->status_rekomendasi == 1)
                                                Active
                                                @else
                                                Deactive
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="alert alert-info" role="alert">
                                    <p class="d-inline text-danger"><strong>PERHATIAN!</strong>:Fitur ini broken , saya
                                        malas untuk mengintegrasikannya dengan API GMaps , jadi untuk prototyping saja ya ......
                                    </p>
                                </div>

                                <button class="btn btn-primary"
                                    onclick="showLocation({{ $hasil->latitude }}, {{ $hasil->longitude }}, '{{ $hasil->nama }}')">
                                    Lihat Lokasi di Peta
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    @if(isset($hasil))
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5>{{ $hasil->nama }}</h5>
                                <p>{{ $hasil->lokasi }}</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <p>Tidak ada hasil ditemukan.</p>
                    @endif
                </div>

                <!-- Peta Leaflet -->
                <div id="map" style="height: 500px; width: 100%;"></div>

            </div>
        </div>
    </div>
</div>


<script>
    let map;
    let userLocationMarker;

    // Inisialisasi peta
    function initMap() {
    map = L.map('map').setView([6.2088, 106.8456], 13); // Default center (misalnya Jakarta)

    // Menambahkan layer OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Mengambil lokasi pengguna
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            const userLat = position.coords.latitude;
            const userLng = position.coords.longitude;

            // Menandai lokasi pengguna di peta
            userLocationMarker = L.marker([userLat, userLng]).addTo(map)
                .bindPopup("Lokasi Anda")
                .openPopup();

            // Pusatkan peta ke lokasi pengguna
            map.setView([userLat, userLng], 13);
        }, function (error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("Pengguna menolak permintaan lokasi. Silakan izinkan akses lokasi pada browser Anda.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Informasi lokasi tidak tersedia. Pastikan Anda terhubung dengan internet dan memiliki GPS aktif.");
                    break;
                case error.TIMEOUT:
                    alert("Waktu permintaan lokasi telah habis. Coba lagi.");
                    break;
                default:
                    alert("Terjadi kesalahan tidak terduga saat mendapatkan lokasi.");
            }
        });
    } else {
        alert("Geolocation tidak didukung oleh browser ini.");
    }
}



    // Menampilkan lokasi ayam geprek di peta
    function showLocation(lat, lng, name) {
        const location = [lat, lng];

        // Tambahkan marker untuk lokasi ayam geprek
        L.marker(location).addTo(map)
            .bindPopup(name)
            .openPopup();

        // Pusatkan peta ke lokasi ayam geprek
        map.setView(location, 13);
    }

    // Panggil fungsi initMap setelah halaman selesai dimuat
    window.onload = initMap;
</script>

@endsection
