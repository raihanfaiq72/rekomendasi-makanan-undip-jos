@extends('Layout.header')

@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Buat Data Penjual</h4>
                        <p class="card-description"><a href="{{url('penjual')}}"><button class="btn btn-primary me-2">Kembali</button></a></p>
                        <form class="forms-sample" action="{{url('penjual')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Barang</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Barang" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Lokasi</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Lokasi" name="lokasi">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Harga</label>
                                <input type="text" class="form-control" id="exampleInputPassword4"
                                    placeholder="Harga" name="harga">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Keterangan</label>
                                <input type="text" class="form-control" id="exampleInputPassword4"
                                    placeholder="Masukan keterangan untuk lokasi anda" name="keterangan">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Cocok untuk ?</label>
                                <select name="idWaktu" class="form-control" id="">
                                    <option value="1">Makan Pagi</option>
                                    <option value="2">Makan Siang</option>
                                    <option value="3">Makan Malam</option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div> -->
                            
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                            <button class="btn btn-danger">Delete</button>
                        </form>
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
