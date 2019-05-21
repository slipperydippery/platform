<?php

if (!function_exists('testerfunction')) {
	function testerfunction(){
		return 'helpers work';
	}
}

if (!function_exists('map_array_to_attribute')) {
	/**
	 *  Maps an array to an attribute of that array
	 *
	 * @param  array $original_array
	 * Original array that is unmapped
	 *
	 * @param  string $attribute
	 * The name of the attribute that is mapped to.
	 *
	 * @return array that consists only of the mapped attributes
	 */
	
	function map_array_to_attribute($original_array, $attribute) {
		$mapped_array = [];
		foreach ($original_array as $item) {
			if( gettype($item) == 'array' ) {
				$mapped_array[] = $item[$attribute];
			} else { 								// gettype == 'object'
				$mapped_array[] = $item->$attribute;
			}
		}
		return $mapped_array;
	}
}

if (!function_exists('human_file_size')) {
    /**
     * Returns a human readable file size
     *
     * @param integer $bytes
     * Bytes contains the size of the bytes to convert
     *
     * @param integer $decimals
     * Number of decimal places to be returned
     *
     * @return string a string in human readable format
     *
     * */
    function human_file_size($bytes, $decimals = 2)
    {
        $sz = 'BKMGTPE';
        $factor = (int)floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . $sz[$factor];
 
    }
}
 
if (!function_exists('in_arrayi')) {
 
    /**
     * Checks if a value exists in an array in a case-insensitive manner
     *
     * @param mixed $needle
     * The searched value
     *
     * @param $haystack
     * The array
     *
     * @param bool $strict [optional]
     * If set to true type of needle will also be matched
     *
     * @return bool true if needle is found in the array,
     * false otherwise
     */
    function in_arrayi($needle, $haystack, $strict = false)
    {
        return in_array(strtolower($needle), array_map('strtolower', $haystack), $strict);
    }
}