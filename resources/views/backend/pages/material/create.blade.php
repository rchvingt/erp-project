
@extends('backend.layouts.master')

@section('title')
Form Data Material
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
                <h4 class="page-title pull-left">Tambah Material</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.material.index') }}">Semua Material</a></li>
                    <li><span>Tambah Material</span></li>
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
                    <h4 class="header-title">Tambah Material</h4>
                    @include('backend.layouts.partials.messages')

                    <form action="{{ route('admin.material.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="material">Material</label>
                                <input type="text" class="form-control" id="material" name="material" placeholder="Ketik material" required autofocus value="{{ old('material') }}">
                            </div>

                        </div>



                        <button type="submit" class="pl-4 pr-4 mt-4 btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.material.index') }}" class="pl-4 pr-4 mt-4 btn btn-secondary">Batal</a>
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
