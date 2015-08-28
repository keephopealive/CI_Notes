<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {

	
	public function index()
	{
		$notes = $this->Note->get_all();
		$this->load->view('index', array('notes' => $notes));
	}

	public function create()
	{
		$id = $this->Note->create($this->input->post('title'));
		$data = array('id' => $id, 'title' => $this->input->post('title'));
		$note = $this->parser->parse('partials/note', $data, TRUE);
		echo json_encode(array('type'=>'create', 'note' => $note));
	}

	public function delete()
	{
		$this->Note->delete($this->input->post('id'));
		echo json_encode(array('type'=>'delete','id' => $this->input->post('id')));
	}

	public function update()
	{
		$this->Note->update($this->input->post());
		echo json_encode(true);
	}


















}
