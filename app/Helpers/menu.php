<?php

function menu()
{
    $menu = [
        [
            'name' => awtTrans('بنرات الدخول للتطبيق'),
            'count' => \App\Models\Intro::count(),
            'icon' => '<i class="la la-image font-large-2 float-left"></i>',
            'url' => url('admin/intros'),
        ],[
            'name' => awtTrans('اكواد الدول'),
            'count' => \App\Models\Country::count(),
            'icon' => '<i class="la la-flag font-large-2 float-left"></i>',
            'url' => url('admin/countries'),
        ],[
            'name' => awtTrans('المدن'),
            'count' => \App\Models\City::count(),
            'icon' => '<i class="la la-location-arrow font-large-2 float-left"></i>',
            'url' => url('admin/cities'),
        ],[
            'name' => awtTrans('المشرفين'),
            'count' => \App\Models\User::where('user_type', 'admin')->count(),
            'icon' => '<i class="la la-user-secret font-large-2 float-left"></i>',
            'url' => url('admin/admins'),
        ],[
            'name' => awtTrans('العملاء'),
            'count' => \App\Models\User::where('user_type', 'user')->count(),
            'icon' => '<i class="la la-user-secret font-large-2 float-left"></i>',
            'url' => url('admin/users'),
        ],[
            'name' => awtTrans('محطات البنزين'),
            'count' => \App\Models\Station::count(),
            'icon' => '<i class="la la-forumbee font-large-2 float-left"></i>',
            'url' => url('admin/stations'),
        ],[
            'name' => awtTrans('عمال محطات البنزين'),
            'count' => \App\Models\Worker::count(),
            'icon' => '<i class="la la-male font-large-2 float-left"></i>',
            'url' => url('admin/workers'),
        ],[
            'name' => awtTrans('باقات الاشتراك'),
            'count' => \App\Models\Package::count(),
            'icon' => '<i class="la la-money font-large-2 float-left"></i>',
            'url' => url('admin/packages'),
        ],[
            'name' => awtTrans('انواع الوقود'),
            'count' => \App\Models\Fuel::count(),
            'icon' => '<i class="la la-car font-large-2 float-left"></i>',
            'url' => url('admin/fuels'),
        ],[
            'name' => awtTrans('الطلبات'),
            'count' => \App\Models\Order::count(),
            'icon' => '<i class="la la-cart-arrow-down font-large-2 float-left"></i>',
            'url' => url('admin/orders'),
        ],[
            'name' => awtTrans('البنوك'),
            'count' => \App\Models\Bank::count(),
            'icon' => '<i class="la la-bank font-large-2 float-left"></i>',
            'url' => url('admin/banks'),
        ],[
            'name' => awtTrans('حوالات الشحن'),
            'count' => \App\Models\Transfer::count(),
            'icon' => '<i class="la la-money font-large-2 float-left"></i>',
            'url' => url('admin/transfers'),
        ],[
            'name' => awtTrans('البنرات'),
            'count' => \App\Models\Image::count(),
            'icon' => '<i class="la la-image font-large-2 float-left"></i>',
            'url' => url('admin/images'),
        ],[
            'name' => awtTrans('الشكاوي والمقترحات'),
            'count' => \App\Models\Complaint::count(),
            'icon' => '<i class="la la-bullhorn font-large-2 float-left"></i>',
            'url' => url('admin/complaints'),
        ],[
            'name' => awtTrans('رسائل التواصل'),
            'count' => \App\Models\Message::count(),
            'icon' => '<i class="la la-wechat font-large-2 float-left"></i>',
            'url' => url('admin/messages'),
        ],[
            'name' => awtTrans('وسائل التواصل'),
            'count' => \App\Models\Social::count(),
            'icon' => '<i class="la la-facebook-f font-large-2 float-left"></i>',
            'url' => url('admin/socials'),
        ],[
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
