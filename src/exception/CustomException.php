<?php
/**
 * Created by PhpStorm.
 * User: nurul
 * Date: 7.06.2020
 * Time: 23:35
 */

namespace TKGM\Adres\exception;

class CustomException extends \Exception
{
    public function __construct($message = "", $code = 0)
    {
        parent::__construct($message, $code);
    }
	
	public function __toString()
	{
		echo json_encode([
            'status'  => false,
            'data'    => [],
            'code'    => $this->code,
            'message' => $this->message
        ]);
		
		exit;
	}
}