<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_master extends CI_Model
{
	public function getKelas()
	{
		return $this->db->get('kelas');
	}
	public function getStatus()
	{
		return $this->db->get('status');;
	}
}