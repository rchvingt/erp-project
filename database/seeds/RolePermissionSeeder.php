<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class RolePermissionSeeder.
 *
 * @see https://spatie.be/docs/laravel-permission/v5/basic-usage/multiple-guards
 */
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Enable these options if you need same role and other permission for User Model
         * Else, please follow the below steps for admin guard.
         */

        // Permission List as array
        $permissions = [
            // [
            //     'group_name' => 'dashboard',
            //     'permissions' => [
            //         'dashboard.view',
            //         'dashboard.edit',
            //     ],
            // ],

            [
                'group_name' => 'admin',
                'permissions' => [
                    // Admin Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ],
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ],
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    // profile Permissions
                    'profile.view',
                    'profile.edit',
                    'profile.delete',
                    'profile.update',
                ],
            ],
            [
                'group_name' => 'material',
                'permissions' => [
                    // Material Permissions
                    'material.create',
                    'material.view',
                    'material.edit',
                    'material.delete',
                    'material.update',
                ],
            ],
            [
                'group_name' => 'supplier',
                'permissions' => [
                    // Supplier Permissions
                    'supplier.create',
                    'supplier.view',
                    'supplier.edit',
                    'supplier.delete',
                    'supplier.update',
                ],
            ],
            [
                'group_name' => 'pembelian',
                'permissions' => [
                    // Supplier Permissions
                    'pembelian.create',
                    'pembelian.view',
                    'pembelian.edit',
                    'pembelian.delete',
                    'pembelian.update',
                    'pembelian.approve',
                ],
            ],
            [
                'group_name' => 'penerimaan',
                'permissions' => [
                    // Penerimaan Permissions
                    'penerimaan.create',
                    'penerimaan.view',
                    'penerimaan.edit',
                    'penerimaan.delete',
                    'penerimaan.update',
                ],
            ],
            [
                'group_name' => 'penerimaan_detail',
                'permissions' => [
                    // Penerimaan Detail Permissions
                    'penerimaan_detail.create',
                    'penerimaan_detail.view',
                    'penerimaan_detail.edit',
                    'penerimaan_detail.delete',
                    'penerimaan_detail.update',
                ],
            ],
            [
                'group_name' => 'transfer_gudang',
                'permissions' => [
                    // Penerimaan Detail Permissions
                    'transfer_gudang.create',
                    'transfer_gudang.view',
                    'transfer_gudang.edit',
                    'transfer_gudang.delete',
                    'transfer_gudang.approve',
                ],
            ],
            [
                'group_name' => 'transfer_gudang_detail',
                'permissions' => [
                    // Penerimaan Detail Permissions
                    'transfer_gudang_detail.create',
                    'transfer_gudang_detail.view',
                    'transfer_gudang_detail.edit',
                    'transfer_gudang_detail.delete',
                    'transfer_gudang_detail.approve',
                ],
            ],
        ];

        // Do same for the admin guard for tutorial purposes.
        $admin = Admin::where('username', 'superadmin')->first();
        $roleSuperAdmin = $this->maybeCreateSuperAdminRole($admin);

        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); ++$i) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); ++$j) {
                $permissionExist = Permission::where('name', $permissions[$i]['permissions'][$j])->first();
                if (is_null($permissionExist)) {
                    $permission = Permission::create(
                        [
                            'name' => $permissions[$i]['permissions'][$j],
                            'group_name' => $permissionGroup,
                            'guard_name' => 'admin',
                        ]
                    );
                    $roleSuperAdmin->givePermissionTo($permission);
                    $permission->assignRole($roleSuperAdmin);
                }
            }
        }

        // Assign super admin role permission to superadmin user
        if ($admin) {
            $admin->assignRole($roleSuperAdmin);
        }
    }

    private function maybeCreateSuperAdminRole($admin): Role
    {
        if (is_null($admin)) {
            $roleSuperAdmin = Role::create(['name' => 'superadmin', 'guard_name' => 'admin']);
        } else {
            $roleSuperAdmin = Role::where('name', 'superadmin')->where('guard_name', 'admin')->first();
        }

        if (is_null($roleSuperAdmin)) {
            $roleSuperAdmin = Role::create(['name' => 'superadmin', 'guard_name' => 'admin']);
        }

        return $roleSuperAdmin;
    }
}
