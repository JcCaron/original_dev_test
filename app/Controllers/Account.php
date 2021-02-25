<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Account extends BaseController
{
	public function login()
	{
        if ($this->request->getMethod(TRUE) == 'POST')
        {
            $postData = $this->request->getPost();
           
            $usersModel = new UsersModel();
            $authenticatedUser = $usersModel->authenticateUser( $postData['username'],  $postData['password']);

            if ($authenticatedUser)
            {
                $this->session->set('logged_user', $authenticatedUser);
                return redirect()->to('/');
            }
        }

        $header_params = $this->get_params_for_header();
		$footer_params = $this->get_params_for_footer();

		echo view('partials/header', $header_params);
		echo view('login/index');
		echo view('partials/footer', $footer_params);
	}

    public function logout()
    {
        $this->session->set('logged_user', null);
        return redirect()->to('/');
    }

}
