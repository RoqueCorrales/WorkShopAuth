<?php
class User_model extends CI_Model {

  function authenticate($user, $pass) {
    $query = $this->db->get_where('users',
      array('username' => $user, 'password' => $pass));

	  return $query->result_object();
  }

  function save($user)
  {
    $r = $this->db->insert('empleados', $user);
    return $r;
  }

  function all()
  {
    $query = $this->db->get('empleados');

    return $query->result_object();
  }

}
