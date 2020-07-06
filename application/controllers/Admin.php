<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['countEmployee'] = $this->model_employees->countEmployee();
        $data['countTaskByAssigned'] = $this->model_task->countTaskByAssigned();
        $data['countTaskByDone'] = $this->model_task->countTaskByDone();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }

    //Controller Employees 
    public function masterEmployees()
    {
        $data['employees'] = $this->model_employees->getAllData();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/master-employees', $data);
        $this->load->view('templates/footer');
    }

    public function addEmployee()
    {
        // field employees 
        $data['employees'] = $this->model_employees->getAllData();
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        // field user
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/master-employees', $data);
            $this->load->view('templates/footer');
        } else {
            $this->model_employees->addEmployee();
            $this->session->set_flashdata('flash', 'Ditambahkan!');
            redirect('admin/masterEmployees');
        }
    }

    public function editEmployee($id)
    {
        $data['employees'] = $this->model_employees->getEmployeeByid($id);

        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/master-employees', $data);
            $this->load->view('templates/footer');
        } else {
            $this->model_employees->editDataEmployee($id);
            $this->session->set_flashdata('flash', 'Diubah!');
            redirect('admin/masterEmployees');
        }
    }

    public function deleteEmployee($id)
    {
        $this->model_employees->deleteDataEmployee($id);
        $this->session->set_flashdata('flash', 'Dihapus!');
        redirect('admin/masterEmployees');
    }

    // Controller Task
    public function task()
    {

        $data['employees'] = $this->model_employees->getAllData();
        $data['task'] = $this->model_task->getTask();

        $this->form_validation->set_rules('tugas', 'Tugas', 'required');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_deadline', 'Tanggal Deadline', 'required');
        $this->form_validation->set_rules('emp_id', 'PIC Karyawan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('status_pekerjaan', 'Status Pekerjaan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/task', $data);
            $this->load->view('templates/footer');
        } else {
            $this->model_task->addTask();
            $this->session->set_flashdata('flash', 'Ditambahkan!');
            redirect('admin/task');
        }
    }

    public function editTask($id)
    {
        $data['employees'] = $this->model_employees->getEmployeeByid($id);
        $data['task'] = $this->model_task->getTask();

        $this->form_validation->set_rules('tugas', 'Tugas', 'required');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_deadline', 'Tanggal Deadline', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('status_pekerjaan', 'Status Pekerjaan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/task', $data);
            $this->load->view('templates/footer');
        } else {
            $this->model_task->editDataTask($id);
            $this->session->set_flashdata('flash', 'Diubah!');
            redirect('admin/task');
        }
    }

    public function deleteTask($id)
    {
        $this->model_task->deleteDataTask($id);
        $this->session->set_flashdata('flash', 'Dihapus!');
        redirect('admin/task');
    }
}
