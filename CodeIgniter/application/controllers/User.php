<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function login()
    {
        $this->load->view('user/login');
    }

    public function register()
    {
        $this->load->view('user/register');
    }

    public function save()
    {
		// get the params
        $username = $this->input->post('username');
      
        $password = $this->input->post('password');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $user = array(
            'username' => $username,
            'password' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name
        );

		// call the model to save
		$r = $this->User_model->save($user);
		
		// redirect
        if ($r) {
            // $this->session->set_flashdata('message', 'User saved');
            redirect('');
        } else {
            // $this->session->set_flashdata('message', 'There was an error saving the user');
            redirect('register');
        }
    }
}



