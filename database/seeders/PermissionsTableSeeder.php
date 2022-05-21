<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'category_create',
            ],
            [
                'id'    => 22,
                'title' => 'category_edit',
            ],
            [
                'id'    => 23,
                'title' => 'category_show',
            ],
            [
                'id'    => 24,
                'title' => 'category_delete',
            ],
            [
                'id'    => 25,
                'title' => 'category_access',
            ],
            [
                'id'    => 26,
                'title' => 'product_create',
            ],
            [
                'id'    => 27,
                'title' => 'product_edit',
            ],
            [
                'id'    => 28,
                'title' => 'product_show',
            ],
            [
                'id'    => 29,
                'title' => 'product_delete',
            ],
            [
                'id'    => 30,
                'title' => 'product_access',
            ],
            [
                'id'    => 31,
                'title' => 'employe_create',
            ],
            [
                'id'    => 32,
                'title' => 'employe_edit',
            ],
            [
                'id'    => 33,
                'title' => 'employe_show',
            ],
            [
                'id'    => 34,
                'title' => 'employe_delete',
            ],
            [
                'id'    => 35,
                'title' => 'employe_access',
            ],
            [
                'id'    => 36,
                'title' => 'job_create',
            ],
            [
                'id'    => 37,
                'title' => 'job_edit',
            ],
            [
                'id'    => 38,
                'title' => 'job_show',
            ],
            [
                'id'    => 39,
                'title' => 'job_delete',
            ],
            [
                'id'    => 40,
                'title' => 'job_access',
            ],
            [
                'id'    => 41,
                'title' => 'hrmenu_access',
            ],
            [
                'id'    => 42,
                'title' => 'product_menu_access',
            ],
            [
                'id'    => 43,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 44,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 45,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 46,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 47,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 48,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 49,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 50,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 51,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 52,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 53,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 54,
                'title' => 'project_menu_access',
            ],
            [
                'id'    => 55,
                'title' => 'project_create',
            ],
            [
                'id'    => 56,
                'title' => 'project_edit',
            ],
            [
                'id'    => 57,
                'title' => 'project_show',
            ],
            [
                'id'    => 58,
                'title' => 'project_delete',
            ],
            [
                'id'    => 59,
                'title' => 'project_access',
            ],
            [
                'id'    => 60,
                'title' => 'site_create',
            ],
            [
                'id'    => 61,
                'title' => 'site_edit',
            ],
            [
                'id'    => 62,
                'title' => 'site_show',
            ],
            [
                'id'    => 63,
                'title' => 'site_delete',
            ],
            [
                'id'    => 64,
                'title' => 'site_access',
            ],
            [
                'id'    => 65,
                'title' => 'stock_create',
            ],
            [
                'id'    => 66,
                'title' => 'stock_edit',
            ],
            [
                'id'    => 67,
                'title' => 'stock_show',
            ],
            [
                'id'    => 68,
                'title' => 'stock_delete',
            ],
            [
                'id'    => 69,
                'title' => 'stock_access',
            ],
            [
                'id'    => 70,
                'title' => 'slip_create',
            ],
            [
                'id'    => 71,
                'title' => 'slip_edit',
            ],
            [
                'id'    => 72,
                'title' => 'slip_show',
            ],
            [
                'id'    => 73,
                'title' => 'slip_delete',
            ],
            [
                'id'    => 74,
                'title' => 'slip_access',
            ],
            [
                'id'    => 75,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
