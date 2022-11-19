<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class NewsController extends AControllerBase
{

    public function index(): Response
    {
        return $this->redirect('?c=news&a=news');
    }
    public function news(): Response
    {
        return $this->html();
    }
}