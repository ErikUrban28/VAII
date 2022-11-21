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

            $this->validate($formData);

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

    public function authorize($action): bool
    {
        return match ($action) {
            "edit", "delete" => $this->app->getAuth()->isLogged(),
            default => true,
        };
    }

    public function validate($formData)
    {
        if ($formData['login'] == "") {
            $formData += ['message' => 'Zadaj login'];
        }
        if (strlen($formData['login']) < 3) {
            $formData += ['message' => 'Zadaj login s viac ako 3 charaktermi'];
        }
        if (strlen($formData['login']) > 30) {
            $formData += ['message' => 'Zadaj heslo s menej ako 30 charaktermi'];
        }

        if ($formData['password'] == "") {
            $formData += ['message' => 'Zadaj heslo '];
        }
        if (strlen($formData['password']) < 6) {
            $formData += ['message' => 'Zadaj heslo s viac ako 6 charaktermi'];

        }
        if (strlen($formData['password']) > 35) {
            $formData += ['message' => 'Zadaj heslo s menej ako 6 charaktermi'];
        }
    }


    public function register()
    {
        $formData = $this->app->getRequest()->getPost();
        $isSubmit = isset($formData['submit']);
        $isEdit = isset($formData['edit']);
        $login = $this->request()->getValue('login');
        $unregistered = $this->app->getAuth()->register($login);
        if ($unregistered && ($isSubmit || $isEdit)) {
            $id = $this->request()->getValue('id');
            $user = $id ? User::getOne($id) : new User();

            $this->validate($formData);
            if ($formData['email'] == "") {
                $formData += ['message' => 'Zadaj email'];
            }
            if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $formData['email'])) {
                $formData += ['message' => 'Zadaj email v spravnom formate'];
            }

            $user->setLogin($login);
            $user->setEmail($this->request()->getValue('email'));
            $user->setHash($this->app->getAuth()->createHash($this->request()->getValue('password')));
            $user->save();
            if ($isEdit) {
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
        return $this->redirect("?c=auth&a=users");
    }
}