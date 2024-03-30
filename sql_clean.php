<?php
	
	function mysqlclean($array,$index,$maxlength,$connection)
	{
		if(isset($array["{$index}"]))
		{
			$input=substr($array["{$index}"],0,$maxlength);
			mysqli_real_escape_string($connection,$input);
			return($input);
		}
		else
		{
			return NULL;
		}
	}
