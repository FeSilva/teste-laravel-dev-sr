<?php 

namespace App\Services;

use App\Models\Repository\CategoriesRepository;

Class CategorieServices extends CategoriesRepository
{
    public function addCategory($category) 
    {
        return $this->createCategory($category);
    }

    public function searchCategory($name)
    {
   
        return $this->findName($name);
    }

    public function deleteCategoria($id) 
    {
        $categoria = $this->findOrFail($id); // carrega o ticket
        $categoria->delete(); // deleta o ticket
        return true;
    } 
}