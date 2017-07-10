<?php

/**
 * Created by PhpStorm.
 * User: eby
 * Date: 10/07/17
 * Time: 8:31
 */
class TransaksiModel extends CI_Model
{
    private $table = 'transaksi';

    public function getAllTransaksi($jurnal_id)
    {
        $this->db->where('jurnal_id', $jurnal_id);
        return $this->db->get($this->table)->result();
    }

    public function insert($data)
    {
        print_r($data);
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

    public function getBalance($jurnal_id)
    {
        $balance = 0;
        foreach ($this->getAllTransaksi($jurnal_id) as $key => $trx) {
            $balance = $balance + ($trx->debet - $trx->kredit);
        }
        return $balance;
    }
}