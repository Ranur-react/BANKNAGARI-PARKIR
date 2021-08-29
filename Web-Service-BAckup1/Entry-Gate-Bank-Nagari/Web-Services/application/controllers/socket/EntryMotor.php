<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EntryMotor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

	}
	public function index()
	{
		redirect(base_url().'/SOCKET_PARKIR_V3_Motor/index.php');
	}
	
}
