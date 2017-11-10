<?php
/**
* Create by UnoTrung 05-2017
*/
class Unolib {
	
	public function __construct()
	{

	}
	
	/* create seo string */
	public function bodau($string){
		return convert_accented_characters($string);
	}

	public function seoString($string){
		return str_replace(" ","-",$string);
	}
}