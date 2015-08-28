<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends CI_Model {

	public function get_all()
	{
		$query = "SELECT * FROM notes";
		return $this->db->query($query)->result_array();
	}

	public function create($title)
	{
		$query = "INSERT INTO notes (title, created_at, updated_at) 
					VALUES (?, NOW(), NOW())";
		$result = $this->db->query($query, $title);
		return $this->db->insert_id();
	}

	public function delete($id)
	{
		$query = "DELETE FROM notes 
					WHERE id = ?";
		return $this->db->query($query, $id);
	}


	public function update($note)
	{
		$query = "UPDATE notes 
					SET content = ?, updated_at = NOW() 
					WHERE id = ?";
		$values = array($note['content'], $note['id']);
		return $this->db->query($query, $values);
	}

}
