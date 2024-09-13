 <!-- sidebar menu area start -->
 @php
     $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">ERP</h2>
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">


                    <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="ti-dashboard"></i><span>Dasbor</span></a>


                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Role & Hak Akses
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">Semua Role & Hak Akses</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Tambah Data</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif



                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Manajemen Admin
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">

                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">Semua Admin</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Tambah Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif



                    @if ($usr->can('material.create') || $usr->can('material.view') ||  $usr->can('material.edit') ||  $usr->can('material.delete'))

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cubes"></i><span>
                            Master Material
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.material.create') || Route::is('admin.material.index') || Route::is('admin.material.edit') || Route::is('admin.material.show') ? 'in' : '' }}">

                            @if ($usr->can('material.view'))
                                <li class="{{ Route::is('admin.material.index')  || Route::is('admin.material.edit') ? 'active' : '' }}"><a href="{{ route('admin.material.index') }}">Semua Material</a></li>
                            @endif

                            @if ($usr->can('material.create'))
                                <li class="{{ Route::is('admin.material.create')  ? 'active' : '' }}"><a href="{{ route('admin.material.create') }}">Tambah Material</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('supplier.create') || $usr->can('supplier.view') ||  $usr->can('supplier.edit') ||  $usr->can('supplier.delete'))

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cubes"></i><span>
                            Master Supplier
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.supplier.create') || Route::is('admin.supplier.index') || Route::is('admin.supplier.edit') || Route::is('admin.supplier.show') ? 'in' : '' }}">

                            @if ($usr->can('supplier.view'))
                                <li class="{{ Route::is('admin.supplier.index')  || Route::is('admin.supplier.edit') ? 'active' : '' }}"><a href="{{ route('admin.supplier.index') }}">Semua Supplier</a></li>
                            @endif

                            @if ($usr->can('supplier.create'))
                                <li class="{{ Route::is('admin.supplier.create')  ? 'active' : '' }}"><a href="{{ route('admin.supplier.create') }}">Tambah Supplier</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif



                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
