<?php

use Phalcon\Mvc\Model;

class Categories extends Model
{

	public $id;
	public $name;

	public static function getAllCategories(){
		return Self::query()->execute();
	}
}
