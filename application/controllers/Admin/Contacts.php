<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class COntacts extends Admin_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Contacts_model');
        $this->load->library('form_validation');
    }

    // List all blog posts
    public function index() {
        $data['contacts'] = $this->Contacts_model->get_all_contacts();
		$this->load->view('admin/components/header');
        $this->load->view('admin/contacts/list',$data);
		$this->load->view('admin/components/footer');
    }	

	// Update a contact message
	public function update($id) {
		$data['contact'] = $this->Contacts_model->get_contact($id);
		if (!$data['contact']) redirect('admin/contacts');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		$this->form_validation->set_rules('message', 'Message', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/contacts/edit/' . $id);
		}

		$update_data = [
			'name'    => $this->input->post('name'),
			'email'   => $this->input->post('email'),
			'phone'   => $this->input->post('phone'),
			'message' => $this->input->post('message'),
		];

		$this->Contacts_model->update_contact($id, $update_data);
		$this->session->set_flashdata('success', 'Contact details updated successfully!');
		redirect('admin/contacts');
	}

	// Delete a contact message
	public function delete($id) {
		$this->Contacts_model->delete_contact($id);
		$this->session->set_flashdata('success', 'Contact message deleted successfully!');
		redirect('admin/contacts');
	}

}
