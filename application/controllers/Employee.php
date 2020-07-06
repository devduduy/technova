<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
        redirect('auth');
        }

    }
    
    public function index()
    {
        $empId = $this->session->userdata('emp_id');

        $data['countTaskAssignedByEmpId'] = $this->model_task->countTaskAssignedByEmpId($empId);
        $data['countTaskDoneByEmpId'] = $this->model_task->countTaskDoneByEmpId($empId);

        $data['task'] = $this->model_task->getTaskByEmpId($empId);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function task()
    {
        $empId = $this->session->userdata('emp_id');

        $data['task'] = $this->model_task->getTaskByEmpId($empId);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/task', $data);
        $this->load->view('templates/footer');
    }
}
