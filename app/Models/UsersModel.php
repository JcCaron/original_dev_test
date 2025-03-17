<?php

namespace App\Models;

use CodeIgniter\Model;
//TODO fix le hash
class UsersModel extends Model
{
   // protected $table = 'users';

   private $users;
   
   function __construct() 
   {
       parent::__construct();

       $this->users = [
        'admin' => [
                'name' => 'Administrateur 1', 
                'password' => "password1", 
                'role' => 'admin',
                'status' => 'enabled'
            ]
        ];
   }
   //'password' => password_hash("password1",  PASSWORD_DEFAULT), 

    public function authenticateUser($username, $password){

        if ( ! $username || ! $password){
            return FALSE;
        }
        if ( !isset($this->users[$username])){
            return FALSE;
        }
        $found_user = $this->users[$username];
        
        if ($found_user['role'] !== 'admin' || 
            $found_user['status'] !== 'enabled' ||
            $found_user['password'] != $password){
            return FALSE;
        }
        //$found_user['password'] != password_hash($password,  PASSWORD_DEFAULT)

        
        /* clean the user before we return it */

        $current_user = [
            'name' => $this->users[$username]['name'],
            'role' => $this->users[$username]['role']
        ];

        return $current_user;
    }
}