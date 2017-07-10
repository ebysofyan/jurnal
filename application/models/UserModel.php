<?php

/**
 * Created by PhpStorm.
 * User: eby
 * Date: 07/07/17
 * Time: 23:43
 */
class UserModel extends CI_Model
{
    private $table = "user";

    public function getUser()
    {
        return $this->db->get($this->table)->result()[0];
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->result()[0];
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    public function authenticate($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get($this->table)->result();
    }
}