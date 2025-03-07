<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('Blog_model'); // Load the blog model
    }

	// Render a specific page
    public function view($page = 'home',$data = []) {
        if (!file_exists(APPPATH . 'views/frontend/pages/' . $page . '.php')) {
            show_404(); // Show 404 error if the page does not exist
        }

        $data['title'] = ucfirst($page); // Capitalize first letter

        $this->load->view('frontend/components/header', $data);
        $this->load->view('frontend/pages/' . $page, $data);
        $this->load->view('frontend/components/footer');
	}

	public function index() {
		$this->view('home');
	}

	public function about() {
		$data['title'] = "About Us";
		$this->view('about');
	}

	public function blog() {
		$data['title'] = "Blogs";
		$data['blogs'] = $this->Blog_model->get_all_blogs(); // Fetch all blogs
		$this->view('blogs',$data);
	}

	public function blog_detail($slug) {
		$data['blog'] = $this->Blog_model->get_blog_by_slug($slug); // Fetch blog by slug
		if (empty($data['blog'])) {
			show_404(); // Show 404 error if the blog does not exist
		}
		$data['title'] = $data['blog']['title']; // Set the title to the blog title
		$this->view('blog_detail', $data);
	}

	public function services() {
		$this->view('services');
	}

	public function ourTeam() {
		$this->view('ourTeam');
	}

	public function contact() {
		$this->view('contactUs');
	}
}
