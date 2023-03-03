<?php

namespace CTXFeed\V5\Common;


/**
 * Class Helper
 *
 * @package    CTXFeed\V5\Common
 * @subpackage CTXFeed\V5\Common
 */
class Helper {
	/**
	 * Object to array
	 *
	 * @param array $array|$object
	 *
	 * @return array
	 */
	public  static function object_to_array( $obj ) {
		//only process if it's an object or array being passed to the function
		if(is_object($obj) || is_array($obj)) {
			$arr = (array) $obj;
			foreach($arr as &$item) {
				//recursively process EACH element regardless of type
				$item = self::object_to_array($item);
			}
			return $arr;
		}
		//otherwise (i.e. for scalar values) return without modification
		else {
			return $obj;
		}
	}
}
