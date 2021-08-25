<?php

function getArabicDate($data) {
    $months = [
        "Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل",
        "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس",
        "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"
    ];

    $day = date("d", strtotime($data));
    $month = date("M", strtotime($data));
    $year = date("Y", strtotime($data));

    $time = date("h:i a", strtotime($data));

    $month = $months[$month];
    if (strpos($time, 'am') !== false)
    {
        $time = str_replace('am','ص',$time);
    }
    else{
        $time = str_replace('pm','م',$time);
    }
    return $day . '  ' . $month ;
}

function getArabicMonth($data) {
    $months = [
        "Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل",
        "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس",
        "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"
    ];

    $month = date("M", strtotime($data));


    $month = $months[$month];

    return  $month ;
}

function day_name( $date )
{
    $days = [
        'Saturday'  => 'السبت',
        'Sunday'    => 'الأحد',
        'Monday'    => 'الاثنين',
        'Tuesday'   => 'الثلاثاء',
        'Wednesday' => 'الأربعاء',
        'Thursday'  => 'الخميس',
        'Friday'    => 'الجمعة',

    ];

    $d    = new DateTime( $date );
    $name = $d -> format( 'l' );
    return App ::getLocale() == 'en' ? $name : $days[ $name ];

}