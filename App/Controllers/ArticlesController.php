<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Article;

class ArticlesController extends AControllerBase
{

    public function authorize($action): bool
    {
        return match ($action) {
            "create", "store", "edit", "delete" => $this->app->getAuth()->isLogged(),
            default => true,
        };
    }



    public function index(): Response
    {
        return $this->redirect('?c=articles&a=articles');
    }
    public function articles(): Response
    {
        $articles = Article::getAll();
        return $this->html($articles);
    }

    public function delete()
    {
        $postToDelete = Article::getOne($this->request()->getValue('id'));
        $postToDelete?->delete();
        return $this->redirect("?c=articles");
    }

    public function create()
    {
        return $this->html(new Article(),viewName: 'articleForm');
    }

    public function store()
    {
        $id = $this->request()->getValue('id');
        $article = $id ? Article::getOne($id) : new Article();
        $article->setText($this->request()->getValue('text'));
        $article->setTitle($this->request()->getValue('title'));
        if (isset($_FILES['img']) && $_FILES["img"]["error"] == UPLOAD_ERR_OK) {
            $name = "public".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR. date('Y-m-d-H-i-s_') . $_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], $name);
            $article->setImg($name);
        }
        $article->save();
        return $this->redirect("?c=articles");
    }

    public function edit()
    {
        $postToEdit= Article::getOne($this->request()->getValue('id'));
        return $this->html($postToEdit, viewName: 'articleForm');
    }
}