<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth/header');
			$this->load->view('auth/login');
			$this->load->view('templates/auth/footer');
		} else {
			$this->_login();
		}
	}

	public function _alert($ket)
	{
		if ($ket == 'wrong') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert" data-aos="zoom-out" data-aos-delay="300">
			<button aria-label="Close" class="close" data-dismiss="alert" type="button">
			<span aria-hidden="true"> ×</span>
			</button>Username or password  is incorrect!</div>');
			redirect('auth');
		} else if ($ket == 'created') {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="zoom-out" data-aos-delay="300">
			<button aria-label="Close" class="close" data-dismiss="alert" type="button">
			<span aria-hidden="true"> ×</span>
			</button>
			<strong>Congratulations! </strong>Your account has been created. Please Login</div>');
			redirect('auth');
		} else if ($ket == 'logout') {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="zoom-out" data-aos-delay="300">
			<button aria-label="Close" class="close" data-dismiss="alert" type="button">
			<span aria-hidden="true"> ×</span>
			</button>You have been logged out!</div>');
			redirect('auth');
		}
	}

	private function _login()
	{
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		$user = $this->db->get_where('users', [
			'username' => $username
		])->row_array();

		//Jika user ada
		if ($user) {
			//Cek password
			if ($password == $user['password']) {
				$data = [
					'username' => $user['username'],
					'role_id' => $user['role_id'],
					'emp_id' => $user['emp_id']
				];
				$this->session->set_userdata($data);
				if ($user['role_id'] == 1) {
					redirect('admin');
				} else {
					redirect('employee');
				}
				} else {
					$this->_alert('wrong');
				}
			
		} else {
			$this->_alert('wrong');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('emp_id');

		$this->_alert('logout');
	}
}
