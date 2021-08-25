<?php


function generate_code()
{
    $characters       = '0123456789';
    $charactersLength = strlen( $characters );
    $token            = '';
    $length           = 5;
    for ( $i = 0; $i < $length; $i++ ) {
        $token .= $characters[ rand( 0, $charactersLength - 1 ) ];
    }
    return $token;
}

function generateRandomString() {
    $length = 16;
    $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $str = "";

    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[mt_rand(0, strlen($chars) - 1)];
    }

    return $str;
}

function generate_room() {
    $characters = [0,1,2,3,4,5,6,7,8,9];
    $letters    =  ['Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M','q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m'];
    $identiy = '';
    for ($i = 0; $i < 50; $i++) {
        $identiy .= $characters[array_rand($characters)].$letters[array_rand($letters)];
    }
    if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $identiy))
    {
        $is_unique = is_unique_room('identity',$identiy);
        if($is_unique == 1 ){
            generate_room();
        }else{
            return substr(str_shuffle($identiy), 0, 10);
        }
    }else{
        generate_room();
    }
}

function is_unique_room($key,$value){
    $user                = \App\Models\User::where($key , $value)->first();
    if(  $user   )
    {
        return 1;
    }
    return 0;
}