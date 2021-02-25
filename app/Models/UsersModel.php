<?php

namespace App\Models;

use CodeIgniter\Model;

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
                'password' => password_hash('password1',  PASSWORD_DEFAULT), 
                'role' => 'admin',
                'status' => 'enabled'
            ]
        ];
   }

    public function authenticateUser($username, $password)
    {
        if ( ! $username || ! $password)
            return FALSE;

        if ( ! isset ($this->users[$username]))
            return FALSE;

        if ($this->users[$username]['role'] !== 'admin' || 
            $this->users[$username]['status'] !== 'enabled' ||
            $this->users[$username]['password'] != password_hash($password,  PASSWORD_DEFAULT))
            return FALSE;
        
        /* clean the user before we return it */

        $current_user = [
            'name' => $this->users[$username]['name'],
            'role' => $this->users[$username]['role']
        ];

        return $current_user;
    }
}