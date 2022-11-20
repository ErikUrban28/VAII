<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function login(): Response
    {
        //$a = password_hash("gfsgsgds",algo: PASSWORD_BCRYPT);
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect('?c=admin');
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return \App\Core\Responses\ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect('?c=home');
    }

    public function register(): Response
    {
        //TODO: id ak je neplatne

        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $id = $this->request()->getValue('id');
            $user = $id ? User::getOne($id) : new User();
            $user->setLogin($this->request()->getValue('login'));
            $user->setEmail($this->request()->getValue('registerEmail'));
            //if ($this->request()->getValue('registerPassword') === $this->request()->getValue('registerRepeatPassword')) {
            $user->setPassword($this->request()->getValue('registerPassword'));
            // }
            $user->save();
//            $logged = true;
//            $logged = $this->app->getAuth()->login($user->getLogin(), $user->getPassword());
//            if ($logged) {
//                return $this->redirect('?c=admin');//           }
        }
        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }
}