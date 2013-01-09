<?php
class Application_View_Helper_PhoneNumber extends Zend_View_Helper_Abstract {
	public function phoneNumber($number) {
		if( !is_string($number)  ) {
			return '';
		}
		if(  preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $number,  $matches ) ) {
			$result = '(' . $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
			return $result;
		}
		else {
			return $number;
		}
	}
}