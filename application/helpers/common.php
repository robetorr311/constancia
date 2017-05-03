<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function date_for_view($str)
{
	return date('d/m/Y', strtotime($str));
}

function date_for_sql($str)
{
	return date('Y-m-d', strtotime($str));
}
