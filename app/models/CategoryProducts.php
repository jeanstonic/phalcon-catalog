<?php

use Phalcon\Mvc\Model;

class CategoryProducts extends Model
{

	public $category_id;
	public $product_id;

	public static function getCategoryProducts($category_id){
		//это не очень красивый метод, нужно покурить Phalcon глубже
		$products_IDs = Self::find( [ "conditions" => "category_id = $category_id" ] )->toArray();
		$products_IDs = array_column($products_IDs, 'product_id');
		$query = 'id in (' . implode(", ", $products_IDs) . ')';
		$products = Products::find( [ "conditions" => $query ] );

		return ($products);
	}
}
