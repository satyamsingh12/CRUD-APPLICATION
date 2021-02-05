<?php
class User_model extends CI_model{
    function create($formArray){
        $this->db->insert('users',$formArray); //INSERT INTO users (name,email) values(?,?);
    }

    function all(){
       return $users = $this->db->get('users')->result_array(); //SELECT * from users
    }

    function getUser($userID){
        $this->db->where('users_id', $userID);
        return $user = $this->db->get('users')->row_array(); //select * where user_id = ?
    }

    function updateUser($userID,$formArray){
        $this->db->where('users_id', $userID);
        $this->db->update('users', $formArray); // update user SET name = ? , email = ? where user_id = ?
    }

    function deleteUser($userID){
        $this->db->where('users_id', $userID);
        $this->db->delete('users'); //DELETE FROM user_id = ?
    }

}

?>