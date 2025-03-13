<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Form_model');
    }

    public function submit_form() {
		$this->load->helper('security');
	
		$name = $this->input->post('name', TRUE);
		$email = $this->input->post('email', TRUE);
		$phone = $this->input->post('phone', TRUE);
		$message = $this->input->post('message', TRUE);
	
		// Validation
		if (empty($name) || empty($email) || empty($message) || empty($phone)) {
			echo json_encode(["status" => "error", "message" => "All fields are required"]);
			return;
		}
	
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo json_encode(["status" => "error", "message" => "Invalid email format"]);
			return;
		}
	
		if (!preg_match('/^[0-9]{10}$/', $phone)) {
			echo json_encode(["status" => "error", "message" => "Invalid phone number"]);
			return;
		}
	
		// Save to database
		$data = [
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'message' => $message,
			'created_at' => date('Y-m-d H:i:s')
		];
	
		$insert = $this->Form_model->insert_data($data);
	
		if ($insert) {
			// 📩 **Email to Admin**
			$admin_email = "info@navaantrix.com";
			$admin_subject = "New Contact Form Submission";
			$admin_message = "
				<html>
				<head><title>New Contact Form Submission</title></head>
				<body>
					<h3>New Contact Received</h3>
					<p><strong>Name:</strong> $name</p>
					<p><strong>Email:</strong> $email</p>
					<p><strong>Phone:</strong> $phone</p>
					<p><strong>Message:</strong><br>$message</p>
					<p><em>Submitted on " . date('Y-m-d H:i:s') . "</em></p>
				</body>
				</html>
			";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: no-reply@navaantrix.com" . "\r\n";
	
			mail($admin_email, $admin_subject, $admin_message, $headers);
	
			// 📩 **Thank You Email to Sender**
			$user_subject = "Thank You for Contacting Us";
			$user_message = "
				<html>
				<head><title>Thank You</title></head>
				<body>
					<p>Dear $name,</p>
					<p>Thank you for reaching out to us! We have received your message and will get back to you as soon as possible.</p>
					<p><strong>Your Message:</strong><br>$message</p>
					<p>If you have any urgent concerns, feel free to contact us at <a href='mailto:info@navaantrix.com'>info@navaantrix.com</a>.</p>
					<p>Best Regards,<br><strong>Navaantrix Team</strong></p>
				</body>
				</html>
			";
	
			mail($email, $user_subject, $user_message, $headers);
	
			echo json_encode(["status" => "success", "message" => "Form submitted successfully. A confirmation email has been sent to you."]);
		} else {
			echo json_encode(["status" => "error", "message" => "Failed to submit form"]);
		}
	}			
}
