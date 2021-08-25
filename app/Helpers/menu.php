<?php


function menu()
{
    $menu = [
        [
            'name' => awtTrans('المشرفين'),
            'count' => \App\Models\User::where('user_type', 'admin')->count(),
            'icon' => '<i class="la la-user-secret font-large-2 float-left"></i>',
            'url' => url('admin/admins'),
        ], [
            'name' => awtTrans('العملاء'),
            'count' => \App\Models\User::where('user_type', 'user')->count(),
            'icon' => '<i class="la la-user-secret font-large-2 float-left"></i>',
            'url' => url('admin/users'),
        ], [
            'name' => awtTrans('محركات البحث'),
            'count' => \App\Models\Seo::count(),
            'icon' => '<i class="la la-search font-large-2 float-left"></i>',
            'url' => url('admin/seos'),
        ], [
            'name' => awtTrans('الصلاحيات'),
            'count' => \App\Models\Role::count(),
            'icon' => '<i class="la la-eye font-large-2 float-left"></i>',
            'url' => url('admin/roles'),
        ],
    ];

    return $menu;
}

function statistics()
{
    $menu = [
        [
            'name' => awtTrans('العملاء النشطين'),
            'count' => \App\Models\User::where('user_type', 'user')->where('active', 1)->count(),
            'icon' => '<i class="la la-user font-large-2 float-left"></i>',
            'url' => url('admin/users'),
        ], [
            'name' => awtTrans('العملاء الغير نشطين'),
            'count' => \App\Models\User::where('user_type', 'user')->where('active', 0)->count(),
            'icon' => '<i class="la la-user font-large-2 float-left"></i>',
            'url' => url('admin/users'),
        ], [
            'name' => awtTrans('العملاء المحظورين'),
            'count' => \App\Models\User::where('user_type', 'user')->where('block', 1)->count(),
            'icon' => '<i class="la la la-user-times font-large-2 float-left"></i>',
            'url' => url('admin/users'),
        ], [
            'name' => awtTrans('محركات البحث'),
            'count' => \App\Models\Seo::count(),
            'icon' => '<i class="la la-search font-large-2 float-left"></i>',
            'url' => url('admin/seos'),
        ],
    ];

    return $menu;
}
