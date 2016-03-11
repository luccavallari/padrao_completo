<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Funcoes
{
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}

    public function preparaURL($str)
    {
		$str = strtolower($str);
		$str = preg_replace('/[áàãâä]/ui', 'a', $str);
		$str = preg_replace('/[éèêë]/ui', 'e', $str);
		$str = preg_replace('/[íìîï]/ui', 'i', $str);
		$str = preg_replace('/[óòõôö]/ui', 'o', $str);
		$str = preg_replace('/[úùûü]/ui', 'u', $str);
		$str = preg_replace('/[ç]/ui', 'c', $str);
		// $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
		$str = preg_replace('/[^a-z0-9]/i', '-', $str);
		$str = preg_replace('/_+/', '-', $str); // ideia do Bacco :)
		return $str;
	}
}