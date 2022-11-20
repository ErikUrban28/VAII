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

    public function register()
    {
        return $this->html(new User(),viewName: 'register');
    }
    public function store(): Response
    {
        //TODO: id ak je neplatne

        $id = $this->request()->getValue('id');
        $user = $id ? User::getOne($id) : new User();
        $user->setLogin($this->request()->getValue('login'));
        $user->setEmail($this->request()->getValue('email'));
        //if ($this->request()->getValue('registerPassword') === $this->request()->getValue('registerRepeatPassword')) {
        $user->setPassword($this->request()->getValue('password'));
        $user->save();
        return $this->redirect("?c=home");
    }

    public
    function users()
    {
        $users = User::getAll();
        return $this->html($users);
    }

    public
    function edit()
    {
        //todo: kontrolovat id
        $userToEdit = User::getOne($this->request()->getValue('id'));
        return $this->html($userToEdit, viewName: 'editUser');
    }

    public
    function delete()
    {
        //todo: kontrolovat id
        $userToDelete = User::getOne($this->request()->getValue('id'));
        $userToDelete?->delete();
        return $this->redirect("?c=auth&a=users");
    }
}