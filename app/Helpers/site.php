<?php

	use App\Models\Ads;
	use App\Models\Category;
	use App\Models\SiteSetting;


	function public_data()
	{

		$setting = SiteSetting ::where( 'key', '!=', 'about_ar' )
		                       -> where( 'key', '!=', 'about_en' )
		                       -> where( 'key', '!=', 'terms_ar' )
		                       -> where( 'key', '!=', 'terms_en' )
		                       -> where( 'key', '!=', 'privacy_ar' )
		                       -> where( 'key', '!=', 'privacy_en' )
		                       -> get();

		$data = [];
		foreach ( $setting as $s ) {
			$data[ $s -> key ] = $s -> value;
		}

		return $data;


	}