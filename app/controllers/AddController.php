<?php

use Phalcon\Mvc\Controller;

class AddController extends Controller
{
    public function indexAction()
    {

    }

    public function ProductAction()
    {
      $newProduct = $this->request->getPost();

      if(isset($newProduct['name'])){
        $product = new Products;
        $success = $product->save(
          ['name' => $newProduct['name']]
        );

        if ($success) {
          echo "PRODUCT ADDEDDDDDDDD<br />";
          echo "ID " . $product->id;
          echo "<br />";
        } else {
          echo "Sorry, the following problems were generated: ";
          foreach ($product->getMessages() as $message) {
            echo $message->getMessage(), "<br/>";
          }
        }

        if(isset($newProduct['categories'])){
          $category = new CategoryProducts;
          foreach($newProduct['categories'] as $category_id){
            $success = $category->save(
              ['category_id'  => $category_id,
               'product_id'   => $product->id ]);
             if ($success) {
               echo ".";
             } else {
               echo "Sorry, the following problems were generated: ";
               foreach ($product->getMessages() as $message) {
                 echo $message->getMessage(), "<br/>";
               }
             }
          }
        }
      }
    }

    public function CategoryAction()
    {
      $newCategory = $this->request->getPost();

      if(isset($newCategory['name'])){

        $category = new Categories;
        $success = $category->save(['name' => $newCategory['name']]);

        if($success) {
          echo "new category added!<br />";
        } else {
          echo "Sorry, the following problems were generated: ";
          foreach ($product->getMessages() as $message) {
            echo $message->getMessage(), "<br/>";
          }
        }
      }

    }
}
