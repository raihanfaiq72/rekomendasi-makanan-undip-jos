@extends('Layout.header')

@section('main')
<div class="main-panel">
    <!-- Form Pencarian -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Hasil cari : {{$keyword}}</h4>
                        <form class="forms-sample" action="{{ url('cari') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Barang</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Barang"
                                    name="nama" value="{{ old('nama') }}">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Cari</button>
                        </form>
                        <div class="table-responsive">
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
                                        <td>{{$p->nama}}</td>
                                        <td>{{$p->lokasi}}</td>
                                        <td>{{$p->harga}}</td>
                                        <td><label class="badge badge-danger">
                                                @if($p->status_rekomendasi == 1)
                                                enable
                                                @else
                                                disable
                                                @endif
                                            </label></td>
                                        <td><a href="{{url('penjual/'.$p->id)}}/edit"><button type="button" class="btn btn-primary me-2">edit</button></a></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <p>Data Kosong</p>
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

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a
                    href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from
                BootstrapDash.</span>
            <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All rights
                reserved.</span>
        </div>
    </footer>
    <!-- partial -->
</div>
@endsection
