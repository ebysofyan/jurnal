<?php

/**
 * Created by PhpStorm.
 * User: eby
 * Date: 10/07/17
 * Time: 10:35
 */
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper('utils');
        $this->load->library('session');
    }

    function index()
    {
        $this->load->view('template/login');
    }

    public function doLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->UserModel->authenticate($username, $password)) {
            $user = $this->UserModel->authenticate($username, $password)[0];
            $this->session->set_userdata(
                array(
                    'USER_ID' => $user->id,
                    'USERNAME' => $user->username,
                    'ISLOGGEDIN' => true
                )
            );

            redirect('main');
        } else {
            $this->session->set_flashdata('msg', 'Username dan atau Password salah');
            redirect('user');
        }
    }

    public function doLogout()
    {
        if ($this->session->userdata('ISLOGGEDIN')) {
            $this->session->sess_destroy();
            redirect('user');
        }
    }

    public function profile(){

        if (!$this->session->userdata('ISLOGGEDIN')) {
            redirect('user');
        }

        $data['user'] = $this->UserModel->getUser();
        $data['menu'] = null;

        $this->load->view('template/base/header', $data);
        $this->load->view('template/user_profile', $data);
        $this->load->view('template/base/footer');
    }

    public function store()
    {
        $user = $this->UserModel->getUser();

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $name = $this->input->post('name');

        if ($_FILES['picture']['name']) {
            $temp = explode(".", $_FILES["picture"]["name"]);
            $picture = round(microtime(true)) . '.' . end($temp);
        } else {
            $picture = $this->input->post('old_picture');
            $this->session->set_flashdata('msg', "Profil Info berhasil di updated !");
        }

        $data = array(
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'picture' => $picture,
        );

        if ($this->UserModel->update($user->id, $data)) {
            $this->uploadFile("picture", $picture, "Profil Info berhasil di updated !", "user/profile");
        } else {
            echo "Error";
        }

    }

    function uploadFile($input_name, $filename, $msg, $url_redirect)
    {
        $config = array(
            'upload_path' => getcwd() . '/assets/upload/',
            'allowed_types' => "gif|jpg|png|jpeg|bmp",
            'overwrite' => TRUE,
            'file_name' => $filename,
        );

        $this->load->library('upload', $config);
        if ($_FILES[$input_name]['name']) {
            if ($this->upload->do_upload($input_name)) {
                $this->session->set_flashdata('msg', $msg);
            } else {
                echo $this->upload->display_errors();
            }
        }

        redirect($url_redirect);
    }
}