
@extends('backend.layouts.master')

@section('title')
Tambah Role & Hak Akses - ERP
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
                <h4 class="page-title pull-left">Tambah Data</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dasbor</a></li>
                    <li><a href="{{ route('admin.roles.index') }}">Semua Role & Hak Akses</a></li>
                    <li><span>Tambah Data Role & Hak Akses</span></li>
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
                    <form action="{{ route('admin.roles.store') }}" method="POST">
                        @csrf
                        <div class="mb-2 row">
                            <div class="col-md-6">
                                <h4 class="header-title">Tambah Data Role & Hak Akses</h4>
                            </div>
                            <div class="text-right col-md-6">
                                <button type="submit" class="pl-4 pr-4 btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        @include('backend.layouts.partials.messages')
                        <div class="form-group">
                            <label for="name">Nama Role</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ketikkan Nama Role" required autofocus value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="name">Hak Akses</label>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                                <label class="form-check-label" for="checkPermissionAll">Pilih Semua</label>
                            </div>
                            <hr>
                            @php $i = 1; @endphp
                            @foreach ($permission_groups as $group)
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                            <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                        </div>
                                    </div>

                                    <div class="col-9 role-{{ $i }}-management-checkbox">
                                        @php
                                            $permissions = App\User::getpermissionsByGroupName($group->name);
                                            $j = 1;
                                        @endphp
                                        @foreach ($permissions as $permission)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                            @php  $j++; @endphp
                                        @endforeach
                                        <br>
                                    </div>
                                </div>
                                @php  $i++; @endphp
                            @endforeach
                        </div>

                        <button type="submit" class="pl-4 pr-4 mt-4 btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.roles.index') }}" class="pl-4 pr-4 mt-4 btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
@endsection

@section('scripts')
     @include('backend.pages.roles.partials.scripts')
@endsection
