<?php 

namespace App\Models\Repository;

use App\Models\Categorie;

Class CategoriesRepository extends Categorie 
{
    public function createCategory($category) {
        return $this->create(['name' =>$category]);
    }

    public function getList() {
        return Categorie::get();
    }   

    public function findName($name)
    {
        return Categorie::where('name', 'LIKE', "%{$name}%")->get();
    }
}