<?php

namespace App\Controllers;

use App\Auth\Authenticator;
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
        $formData = $this->app->getRequest()->getPost();
        $logged = null;

        if (isset($formData['submit'])) {

            if ($formData['login'] == "" && $formData['password'] == "") {
                $data = ['message' => "Nevyplnene udaje"];
                return $this->html($data);
            }
            if ($formData['login'] == "") {
                $data = ['message' => 'Zadaj login'];
                return $this->html($data);
            }
            elseif (strlen($formData['login']) < 3) {
                $data = ['message' => 'Zadaj login s viac ako 3 charaktermi'];
                return $this->html($data);
            }
            if (strlen($formData['login']) > 30) {
                $data = ['message' => 'Zadaj heslo s menej ako 30 charaktermi'];
                return $this->html($data);
            }

            if ($formData['password'] == "") {
                $data = ['message' => 'Zadaj heslo '];
                return $this->html($data);
            }
            if (strlen($formData['password']) < 6) {
                $data = ['message' => 'Zadaj heslo s viac ako 6 charaktermi'];
                return $this->html($data);

            }
            if (strlen($formData['password']) > 35) {
                $data = ['message' => 'Zadaj heslo s menej ako 6 charaktermi'];
                return $this->html($data);
            }

            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect('?c=admin');
            }
        }

        $data= ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
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

    public function authorize($action): bool
    {
        return match ($action) {
            "edit", "delete" => $this->app->getAuth()->isLogged(),
            default => true,
        };
    }




    public function register()
    {
        //TODO: oprav routing pri edite
        $formData = $this->app->getRequest()->getPost();
        $isSubmit = isset($formData['submit']);
        $isEdit = isset($formData['edit']);
        $login = $this->request()->getValue('login');
        $unregistered = $this->app->getAuth()->register($login);
        if ($unregistered && ($isSubmit || $isEdit)) {
            $id = $this->request()->getValue('id');
            $user = $id ? User::getOne($id) : new User();

            if ($formData['login'] == "") {
                $formData+= ['message' => 'Zadaj login'];
                return $this->html($formData);
            }
            elseif (strlen($formData['login']) < 3) {
                $formData+= ['message' => 'Zadaj login s viac ako 3 charaktermi'];
                return $this->html($formData);
            }
            if (strlen($formData['login']) > 30) {
                $formData += ['message' => 'Zadaj heslo s menej ako 30 charaktermi'];
                return $this->html($formData);
            }

            if ($formData['password'] == "") {
                $formData+= ['message' => 'Zadaj heslo '];
                return $this->html($formData);
            }
            if (strlen($formData['password']) < 6) {
                $formData+= ['message' => 'Zadaj heslo s viac ako 6 charaktermi'];
                return $this->html($formData);

            }
            if (strlen($formData['password']) > 35) {
                $formData+= ['message' => 'Zadaj heslo s menej ako 6 charaktermi'];
                return $this->html($formData);
            }
            if ($formData['email'] == "") {
                $formData += ['message' => 'Zadaj email'];
                return $this->html($formData);
            }
            if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $formData['email'])) {
                $formData+= ['message' => 'Zadaj email v spravnom formate'];
                return $this->html($formData);
            }

            $user->setLogin($login);
            $user->setEmail($this->request()->getValue('email'));
            $user->setHash($this->app->getAuth()->createHash($this->request()->getValue('password')));
            $user->save();
            if ($isEdit) {
                $_SESSION['user'] = $user->getLogin();
                return $this->redirect("?c=auth&a=users");
            }
            $_SESSION['user'] = $user->getLogin();
            return $this->redirect("?c=admin");
        }
        $formData += ($unregistered === false ? ['message' => 'Login je uz obsadeny'] : []);
        if ($isEdit) {
            return $this->html($formData, viewName: 'editUser');
        }
        return $this->html($formData);
    }

    public function users()
    {
        $users = User::getAll();
        return $this->html($users);
    }

    public function edit()
    {
        $data = ['message' => '', 'id' => $this->request()->getValue('id')];
        return $this->html($data, viewName: 'editUser');
    }

    public function delete()
    {
        $userToDelete = User::getOne($this->request()->getValue('id'));
        $userToDelete?->delete();
        return $userToDelete->getLogin() === $this->app->getAuth()->getLoggedUserName() ? $this->logout() : $this->redirect("?c=auth&a=users");
    }
}