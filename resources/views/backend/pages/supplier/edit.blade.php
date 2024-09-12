
@extends('backend.layouts.master')

@section('title')
Ubah Supplier - ERP
@endsection

@section('styles')

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection

@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="clearfix breadcrumbs-area">
                <h4 class="page-title pull-left">Supplier Edit - {{ $supplier->supplier }}</h4>

                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.supplier.index') }}">Semua Supplier</a></li>
                    <li><span>Edit Supplier</span></li>
                </ul>
            </div>
        </div>
        <div class="clearfix col-sm-6">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="mt-5 col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Ubah Supplier - {{ $supplier->nama_supplier }}</h4>
                    @include('backend.layouts.partials.messages')

                    <form action="{{ route('admin.supplier.update', $supplier->id_supplier) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nama_supplier">Nama Supplier</label>
                                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Masukkan Supplier" value="{{ $supplier->nama_supplier }}" required autofocus>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Supplier" value="{{ $supplier->alamat }}" required autofocus>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan Telepon Supplier" value="{{ $supplier->telepon }}" required autofocus>
                            </div>

                        </div>

                        <button type="submit" class="pl-4 pr-4 mt-4 btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.supplier.index') }}" class="pl-4 pr-4 mt-4 btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
@endsection

@section('scripts')

@endsection
