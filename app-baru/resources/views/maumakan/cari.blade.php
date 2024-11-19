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
                                    {{-- Morning meals --}}
                                    <tr>
                                        <td colspan="6" class="text-center"><strong>Makan Pagi</strong></td>
                                    </tr>
                                    @forelse($hasil->where('idWaktu', 1) as $p)
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{url('')}}/assets/assets/images/faces/face1.jpg" alt="image" />
                                        </td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->lokasi }}</td>
                                        <td>{{ $p->harga }}</td>
                                        <td><label class="badge badge-{{ $p->status_rekomendasi ? 'success' : 'danger' }}">
                                            {{ $p->status_rekomendasi ? 'Aktif' : 'Tyda Aktif' }}
                                            </label></td>
                                        <td>
                                            <a href="{{ url('cari/' . $p->id) }}">
                                                <button type="button" class="btn btn-primary">Lihat</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data untuk makan pagi</td>
                                    </tr>
                                    @endforelse
                                
                                    {{-- Afternoon meals --}}
                                    <tr>
                                        <td colspan="6" class="text-center"><strong>Makan Siang</strong></td>
                                    </tr>
                                    @forelse($hasil->where('idWaktu', 2) as $p)
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{url('')}}/assets/assets/images/faces/face1.jpg" alt="image" />
                                        </td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->lokasi }}</td>
                                        <td>{{ $p->harga }}</td>
                                        <td><label class="badge badge-{{ $p->status_rekomendasi ? 'success' : 'danger' }}">
                                            {{ $p->status_rekomendasi ? 'Aktif' : 'Tyda Aktif' }}
                                            </label></td>
                                        <td>
                                            <a href="{{ url('cari/' . $p->id) }}">
                                                <button type="button" class="btn btn-primary">Lihat</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data untuk makan siang</td>
                                    </tr>
                                    @endforelse
                                
                                    {{-- Evening meals --}}
                                    <tr>
                                        <td colspan="6" class="text-center"><strong>Makan Malam</strong></td>
                                    </tr>
                                    @forelse($hasil->where('idWaktu', 3) as $p)
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{url('')}}/assets/assets/images/faces/face1.jpg" alt="image" />
                                        </td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->lokasi }}</td>
                                        <td>{{ $p->harga }}</td>
                                        <td><label class="badge badge-{{ $p->status_rekomendasi ? 'success' : 'danger' }}">
                                            {{ $p->status_rekomendasi ? 'Aktif' : 'Tyda Aktif' }}
                                            </label></td>
                                        <td>
                                            <a href="{{ url('cari/' . $p->id) }}">
                                                <button type="button" class="btn btn-primary">Lihat</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data untuk makan malam</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

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


@endsection
