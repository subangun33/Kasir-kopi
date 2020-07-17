<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function transaksi($text)
{
    $text = ("<a href='javascript:void(0)' class='btn btn-sm btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' onclick='edit_data(".$text.")'><i class='fa fa-list-alt'></i></a>
    	<a href='javascript:void(0)' class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='top' title='Hapus' onclick='delete_data(".$text.")'><i class='fa fa-info '></i></a>");
 
    return $text;
}

?>