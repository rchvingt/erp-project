
@extends('backend.layouts.master')

@section('title')
Manajemen Admin
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

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
                <h4 class="page-title pull-left">Edit Data</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dasbor</a></li>
                    <li><a href="{{ route('admin.admins.index') }}">Semua Admin</a></li>
                    <li><span>Edit Admin - {{ $admin->name }}</span></li>
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
                    <h4 class="header-title">Edit Admin - {{ $admin->name }}</h4>
                    @include('backend.layouts.partials.messages')

                    <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Ketikkan Nama Admin" value="{{ $admin->name }}" required autofocus>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Ketikkan Email" value="{{ $admin->email }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password">Password (Optional)</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ketikkan Password">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password_confirmation">Konfirmasi Password (Optional)</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-6">
                                <label for="password">Tentukan Role</label>
                                <select name="roles[]" id="roles" class="form-control select2" multiple required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" {{ $admin->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <label for="username"> Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Ketikkan Username" required value="{{ $admin->username }}">
                            </div>
                        </div>

                        <button type="submit" class="pl-4 pr-4 mt-4 btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.admins.index') }}" class="pl-4 pr-4 mt-4 btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection
