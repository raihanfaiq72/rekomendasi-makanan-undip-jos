@extends('Layout.header')

@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cari makanan kesukaanmu hariini</h4>
                        <form class="forms-sample" action="{{url('cari')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Makanan</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Makanan" name="nama">
                            </div>
                            
                            <button type="submit" class="btn btn-primary me-2">Cari</button>
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
