@extends('backend.layouts.master')

@section('title')
    {{ __('Master Supplier - ERP') }}
@endsection

@section('styles')

    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/responsive.css') }}">
@endsection

@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="clearfix breadcrumbs-area">
                <h4 class="page-title pull-left">{{ __('Supplier') }}</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li><span>{{ __('Daftar Supplier') }}</span></li>
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
                    <p class="float-left mb-2">
                        @if (auth()->user()->can('supplier.create'))
                            <a class="text-white btn btn-primary" href="{{ route('admin.supplier.create') }}">
                                {{ __('Tambah Supplier') }}
                            </a>
                        @endif
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>{{ __('No.') }}</th>
                                    <th>{{ __('Supplier') }}</th>
                                    <th>{{ __('Alamat') }}</th>
                                    <th>{{ __('Telepon') }}</th>
                                    <th>{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($supplier as $row)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $row->nama_supplier }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->telepon }}</td>

                                    <td>
                                        @if (auth()->user()->can('supplier.edit'))
                                            <a class="text-white btn btn-success btn-xs" href="{{ route('admin.supplier.edit', $row->id_supplier) }}">Ubah</a>
                                        @endif

                                        @if (auth()->user()->can('supplier.delete'))
                                        <a class="text-white btn btn-danger btn-xs" href="javascript:void(0);"
                                        onclick="event.preventDefault(); if(confirm('Yakin ingin mengubah data ini?')) { document.getElementById('delete-form-{{ $row->id_supplier }}').submit(); }">
                                            {{ __('Hapus') }}
                                        </a>

                                        <form id="delete-form-{{ $row->id_supplier }}" action="{{ route('admin.supplier.destroy', $row->id_supplier) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>
</div>
@endsection

@section('scripts')
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

     <script>
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true,
                autoWidth: true
            });
        }
     </script>
@endsection
