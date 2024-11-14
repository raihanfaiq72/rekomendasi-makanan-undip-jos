@extends('Layout.header')

@section('main')
<div class="main-panel">
    <!-- Form Pencarian -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Hasil cari: {{ $keyword }}</h4>

                        <!-- Form pencarian -->
                        <form class="forms-sample" action="{{ url('cari') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Barang</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Barang"
                                       name="nama" value="{{ old('nama') }}">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Cari</button>
                        </form>

                        <!-- Tabel Hasil Pencarian -->
                        <div class="table-responsive mt-4">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> Gambar </th>
                                        <th> Nama </th>
                                        <th> Lokasi </th>
                                        <th> Harga </th>
                                        <th> Status </th>
                                        <th> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($hasil as $p)
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{url('')}}/assets/assets/images/faces/face1.jpg" alt="image" />
                                        </td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->lokasi }}</td>
                                        <td>{{ $p->harga }}</td>
                                        <td><label class="badge badge-{{ $p->status_rekomendasi ? 'success' : 'danger' }}">
                                            {{ $p->status_rekomendasi ? 'Enable' : 'Disable' }}
                                            </label></td>
                                        <td>
                                            <a href="{{ url('penjual/' . $p->id) . '/edit' }}">
                                                <button type="button" class="btn btn-primary">Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Hasil Pencarian dan Peta -->
                        <div class="row mt-4">
                            @if(isset($hasil) && !$hasil->isEmpty())
                            @foreach($hasil as $item)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>{{ $item->nama }}</h5>
                                        <p>{{ $item->lokasi }}</p>
                                        <button class="btn btn-primary" 
                                                onclick="showLocation({{ $item->latitude }}, {{ $item->longitude }}, '{{ $item->nama }}')">
                                            Lihat Lokasi di Peta
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.
            </span>
            <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">
                Copyright © 2023. All rights reserved.
            </span>
        </div>
    </footer>
</div>

<!-- Link ke CSS Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Script Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

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
