<?php

/**
 * Created by PhpStorm.
 * User: eby
 * Date: 10/07/17
 * Time: 1:56
 */
class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('JurnalModel');
        $this->load->model('TransaksiModel');
        $this->load->helper('utils');
        $this->load->library('session');

        if (!$this->session->userdata('ISLOGGEDIN')) {
            redirect('user');
        }
    }

    function index()
    {
        $data['list_jurnal'] = $this->JurnalModel->getAllJurnal();
        $data['jurnal'] = null;
        $data['menu'] = 'jurnal';

        $this->load->view('template/base/header', $data);
        $this->load->view('template/jurnal', $data);
        $this->load->view('template/base/footer');
    }

    function store()
    {
        $id = $this->input->post('jurnal_id');
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'nama' => $nama,
            'keterangan' => $keterangan,
            'user_id' => $this->session->userdata('USER_ID')
        );

        if ($id == null) {
            if ($this->JurnalModel->insert($data)) {
                $this->session->set_flashdata('pesan', 'Data Berhasil ditambahkan');
                redirect('main');
            } else {
                $this->db->display_errors();
            }
        } else {
            if ($this->JurnalModel->update($id, $data)) {
                $this->session->set_flashdata('pesan', 'Data Berhasil diupdate');
                redirect('main');
            } else {
                $this->db->display_errors();
            }
        }
    }

    function edit($id)
    {
        $data['list_jurnal'] = $this->JurnalModel->getAllJurnal();
        $data['jurnal'] = $this->JurnalModel->get($id);
        $data['menu'] = 'jurnal';

        $this->load->view('template/base/header', $data);
        $this->load->view('template/jurnal', $data);
        $this->load->view('template/base/footer');
    }

    function delete($id)
    {
        if ($this->JurnalModel->delete($id)) {
            $this->session->set_flashdata('pesan', 'Data Berhasil dihapus');
            redirect('main');
        } else {
            $this->db->display_errors();
        }
    }

    function transaksi($jurnal_id)
    {
        $data['list_transaksi'] = $this->TransaksiModel->getAllTransaksi($jurnal_id);
        $data['balance'] = 0;
        $data['jurnal'] = $this->JurnalModel->get($jurnal_id);
        $data['trx'] = null;
        $data['menu'] = 'jurnal';

        $this->load->view('template/base/header', $data);
        $this->load->view('template/transaksi', $data);
        $this->load->view('template/base/footer');
    }

    function transaksiedit($jurnal_id, $trx_id)
    {
        $data['list_transaksi'] = $this->TransaksiModel->getAllTransaksi($jurnal_id);
        $data['balance'] = 0;
        $data['jurnal'] = $this->JurnalModel->get($jurnal_id);
        $data['trx'] = $this->TransaksiModel->get($trx_id);
        $data['menu'] = 'jurnal';

        $this->load->view('template/base/header', $data);
        $this->load->view('template/transaksi', $data);
        $this->load->view('template/base/footer');
    }

    function transaksidelete($jurnal_id, $trx_id){
        if ($this->TransaksiModel->delete($trx_id)){
            $this->session->set_flashdata('pesan', 'Transaksi Berhasil dihapus');
            redirect('main/transaksi/' . $jurnal_id);
        }
    }

    function transaksistore($jurnal_id)
    {
        $id = $this->input->post('trx_id');
        $tanggal = $this->input->post('tanggal');
        $uraian = $this->input->post('uraian');
        $debet = $this->input->post('debet');
        $kredit = $this->input->post('kredit');

        if ($debet != null) {
            $kredit = 0;
        } else if ($kredit != null) {
            $debet = 0;
        } else {
            $debet = 0;
            $kredit = 0;
        }

        $data = array(
            'tanggal' => $tanggal,
            'uraian' => $uraian,
            'debet' => $debet,
            'kredit' => $kredit,
            'jurnal_id' => $jurnal_id
        );

        if ($id == null) {
            if ($this->TransaksiModel->insert($data)) {
                $this->session->set_flashdata('pesan', 'Transaksi Berhasil ditambah');
                redirect('main/transaksi/' . $jurnal_id);
            } else {
                $this->db->display_errors();
            }
        } else {
            if ($this->TransaksiModel->update($id, $data)) {
                $this->session->set_flashdata('pesan', 'Transaksi Berhasil diupdate');
                redirect('main/transaksi/' . $jurnal_id);
            } else {
                $this->db->display_errors();
            }
        }
    }
}