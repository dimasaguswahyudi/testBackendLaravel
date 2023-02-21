<?php
if (! function_exists('jenis'))
{
	function jenis($jenis_kelamin)
	{
		if ($jenis_kelamin == 'L') {
            return "Laki-Laki";
        }
        else{
            return "Perempuan";
        }
	}
}
