<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*Total function: 7*/
/*Start Common_model class*/
class BPT_model extends CI_Model
{

	function getBPTList($filters = null)
	{
		$this->db->select('*');
		if ($filters != null) {
			if (is_array($filters) && count($filters) > 0) {
				$this->db->where_in('bat_id', $filters);
			} else {
				$this->db->where('bat_id', $filters);
			}
		}
		$query = $this->db->get('bpt');
		$result = $query->result();
		return $result;
	}
}
