
@extends('backend.layouts.master')

@section('title')
Dasbor - ERP
@endsection
@php
$usr = Auth::guard('admin')->user();
@endphp

@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="clearfix breadcrumbs-area">
                <h4 class="page-title pull-left">Dasbor</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Dasbor</span></li>
                </ul>
            </div>
        </div>
        <div class="clearfix col-sm-6">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->
@if ($usr->can('roles.view') || $usr->can('admin.view'))
<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-8">
        <div class="row">
            <div class="mt-5 mb-3 col-md-6">
                {{-- @if ($usr->can('roles.view')) --}}
                <div class="card">
                    <div class="seo-fact sbg1">
                        <a href="{{ route('admin.roles.index') }}">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-users"></i>Role</div>
                                <h2>{{ $total_roles }}</h2>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <div class="mb-3 col-md-6 mt-md-5">
                <div class="card">
                    <div class="seo-fact sbg2">
                        <a href="{{ route('admin.admins.index') }}">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-user"></i> Pengguna</div>
                                <h2>{{ $total_admins }}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@else
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 mt-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Selamat Datang</h4>

        </div>
        </div>
        </div>
</div>
@endforelse
@endsection
