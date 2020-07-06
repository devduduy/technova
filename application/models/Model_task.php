<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_task extends CI_Model {
    public function getTask()
    {
        $query = "SELECT `task`.*, `employees`.`name`
                    FROM `task` JOIN `employees`
                      ON `task`.`emp_id` = `employees`.`emp_id`
        ";
        return $this->db->query($query)->result_array();
    }
    
    public function addTask()
    {
        $data = [
            "tugas" => $this->input->post('tugas', true),
            "tanggal_mulai" => $this->input->post('tanggal_mulai', true),
            "tanggal_deadline" => $this->input->post('tanggal_deadline', true),
            "emp_id" => $this->input->post('emp_id', true),
            "keterangan" => $this->input->post('keterangan', true),
            "status_pekerjaan" => $this->input->post('status_pekerjaan', true)
        ];
        
        $this->db->insert('task', $data);
    }
    
    public function editDataTask($id)
  {
     $data = [
            "tugas" => $this->input->post('tugas', true),
            "tanggal_mulai" => $this->input->post('tanggal_mulai', true),
            "tanggal_deadline" => $this->input->post('tanggal_deadline', true),
            "keterangan" => $this->input->post('keterangan', true),
            "status_pekerjaan" => $this->input->post('status_pekerjaan', true)
        ];
      $this->db->where('task_id', $id);
      $this->db->update('task', $data);
  }

     public function deleteDataTask($id)
    {
        $this->db->delete('task', ['task_id' => $id]);
    }

    public function countTaskByAssigned()
    {
        $this->db->select('*');
        $this->db->from('task');
        $this->db->where('status_pekerjaan', 'assigned');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countTaskByDone()
    {
        $this->db->select('*');
        $this->db->from('task');
        $this->db->where('status_pekerjaan', 'done');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countTaskAssignedByEmpId($empId)
    {
        $this->db->select('*');
        $this->db->from('task');
        $this->db->where('status_pekerjaan', 'assigned');        
        $this->db->where('emp_id', $empId);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countTaskDoneByEmpId($empId)
    {
        $this->db->select('*');
        $this->db->from('task');
        $this->db->where('status_pekerjaan', 'done');        
        $this->db->where('emp_id', $empId);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getTaskByEmpId($empId) {
        $where = array(
            'emp_id' => $empId
        );
        $query = $this->db->get_where("task", $where);
		return $query->result_array();
    }
}
