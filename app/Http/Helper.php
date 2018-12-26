<?php
function level()
{
    $level=array(
        '0'=>'Administrator',
        '1'=>'Staf Admin',
        '2'=>'Admin Lapangan'
    );
    return $level;
}
function rupiah($angka){
	
	$hasil_rupiah = number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
?>