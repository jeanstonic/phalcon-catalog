<?php

use Phalcon\Mvc\Controller;

class CatalogController extends Controller
{
    public function indexAction()
    {

    }

    public function categoryAction($category_id = 1)
    {
      //передаем имя и ИД категории в шаблон
      $category = Categories::findFirst("id = $category_id");
      $this->view->setVar("category_name",  $category->name);
      $this->view->setVar("category_id",  $category_id);
    }
}
