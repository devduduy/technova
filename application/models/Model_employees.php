<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_employees extends CI_Model {


	public function getAllData()
	{
            return $this->db->get('employees')->result_array();
    }
    
    public function addEmployee()
    {
        $dataEmployee = [
            "nip" => $this->input->post('nip', true),
            "name" => $this->input->post('name', true),
            "tanggal_lahir" => $this->input->post('tanggalLahir', true),
            "status" => $this->input->post('status', true),
            "email" => $this->input->post('email', true)
        ];
        $this->db->insert('employees', $dataEmployee);
        
        $dataUser = [
            'username' => $this->input->post('username', true),
            'password' => $this->input->post('password', true),
            'role_id' => 2,
            'emp_id' => $this->db->insert_id()
        ];
        $this->db->insert('users', $dataUser);
    }

    public function getEmployeeById($id)
    {
        return $this->db->get_where('employees', ['emp_id' => $id])->row_array();
    }

      public function editDataEmployee($id)
    {
       $data = [
            "nip" => $this->input->post('nip', true),
            "name" => $this->input->post('name', true),
            "tanggal_lahir" => $this->input->post('tanggalLahir', true),
            "status" => $this->input->post('status', true),
            "email" => $this->input->post('email', true)
        ];
        $this->db->where('emp_id', $id);
        $this->db->update('employees', $data);
    }

     public function deleteDataEmployee($id)
    {
        $this->db->delete('employees', ['emp_id' => $id]);
    }

    public function countEmployee()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        return $query->num_rows();
    }
}
