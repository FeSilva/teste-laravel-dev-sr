<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategorieServices;
class TicketsController extends Controller
{
    protected $categoriesServices; 
    public function __construct(
        CategorieServices $categorieServices
    ) {
        $this->categoriesServices = $categorieServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = [];
        return view ("tickets.index", compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

       
        return view("tickets.create", compact("categorias"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function addCategory(Request $request) 
    {
        try {
            $categoryName = $request->post("nome"); 
            $this->categoriesServices->addCategory($categoryName);
            return ["message" => "Categoria registrada com sucesso", 'status' => 200];
        } catch (\Exception $e) {
            return ['message'=> $e->getMessage(), 'status' => '401'];
        }
    }

    public function searchCategorie(Request $request) 
    {
        try {
       
            $categoryName = $request->query("nome"); 
            return $this->categoriesServices->searchCategory($categoryName);
        } catch (\Exception $e) {
            return ['message'=> $e->getMessage(), 'status' => '401'];
        }
    }
}
