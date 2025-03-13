<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Admin_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->library('form_validation');
    }

    // List all blog posts
    public function index() {
        $data['blogs'] = $this->Blog_model->get_all_blogs();
		$this->load->view('admin/components/header');
        $this->load->view('admin/blog/list', $data);
		$this->load->view('admin/components/footer');
    }

    // Add a new blog post
    public function create() {
		$this->load->view('admin/components/header');
		$this->load->view('admin/blog/create');
		$this->load->view('admin/components/footer');
    }

	// Store a new blog post
	public function store() {
		// echo "<pre>"; print_r($this->input->post()); die;
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if ($this->form_validation->run() == FALSE) {
			// print_r("validation failed");die;
			$this->create(); // Load create form again with validation errors
		} else {
			// print_r("false");die;
			$image = $this->_upload_image();
			// print_r($image);die;
			if ($image === false) {
				// print_r("image upload error");die;
				$this->session->set_flashdata('error', 'Invalid image format or size exceeds 3MB.');
				redirect('admin/blog/create');
			}

			$data = [
				'slug' => $this->input->post('slug'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'content' => $this->input->post('content'),
				'image' => $image
			];

			$this->Blog_model->insert_blog($data);
			$this->session->set_flashdata('success', 'Blog created successfully!');
			redirect('admin/blog');
		}
	}


    // Edit a blog post (show the edit form)
	public function edit($id) {
		$data['blog'] = $this->Blog_model->get_blog($id);
		if (!$data['blog']) redirect('blog');

		$this->load->view('admin/components/header');
		$this->load->view('admin/blog/edit', $data);
		$this->load->view('admin/components/footer');
	}

	// Update the blog post (handle form submission)
	public function update($id) {
		$data['blog'] = $this->Blog_model->get_blog($id);
		if (!$data['blog']) redirect('admin/blog');

		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/blog/edit/' . $id);
		}

		$image = $this->_upload_image();
		if ($image === false) {
			$this->session->set_flashdata('error', 'Invalid image format or size exceeds 3MB.');
			redirect('admin/blog/edit/' . $id);
		}

		$update_data = [
			'slug' => $this->input->post('slug'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'content' => $this->input->post('content'),
		];
		
		if ($image) {
			$update_data['image'] = $image;
		}

		$this->Blog_model->update_blog($id, $update_data);
		$this->session->set_flashdata('success', 'Blog updated successfully!');
		redirect('admin/blog');
	}

    // Delete a blog post
    public function delete($id) {
        $this->Blog_model->delete_blog($id);
        $this->session->set_flashdata('success', 'Blog deleted successfully!');
        redirect('admin/blog');
    }

    // Upload image with validation
    private function _upload_image() {
		if (!empty($_FILES['image']['name'])) {
			$upload_path = './uploads/blogs/';
			$allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
			$max_size = 5 * 1024 * 1024; // 5MB
	
			$file_tmp = $_FILES['image']['tmp_name'];
			$file_name = time() . '_' . basename($_FILES['image']['name']);
			$file_type = $_FILES['image']['type'];
			$file_size = $_FILES['image']['size'];
			$target_file = $upload_path . $file_name;
	
			// Validate file type and size
			if (!in_array($file_type, $allowed_types)) {
				return false; // Invalid file type
			}
			if ($file_size > $max_size) {
				return false; // File size exceeds 5MB
			}
	
			// Ensure upload directory exists
			if (!is_dir($upload_path)) {
				mkdir($upload_path, 0777, true);
			}
	
			// Move file to the upload directory
			if (move_uploaded_file($file_tmp, $target_file)) {
				return $file_name; // Return the uploaded file name
			} else {
				return false; // Upload failed
			}
		}
		return null; // No file uploaded
	}
	
}
