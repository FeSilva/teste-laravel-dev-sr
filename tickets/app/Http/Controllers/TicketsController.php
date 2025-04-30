<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategorieServices;
use App\Services\TicketsServices;

class TicketsController extends Controller
{
    protected $categoriesServices; 
    protected $ticketServices;

    public function __construct(
        CategorieServices $categorieServices,
        TicketsServices $ticketServices
    ) {
        $this->categoriesServices = $categorieServices;
        $this->ticketServices = $ticketServices;
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
        try {
            return Response()->json(
                $this->ticketServices->newTicket($request->except('_token'))
            );
        } catch (\Exception $e) {
            return ['message' => $e->getMessage(), 'status' => 401];
        }
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
        try{
            $ticket = $this->ticketServices->updateTicket($request->except("_token"), $id);
            return [
                'message' => 'chamado atualizado com sucesso, responsável inserido.',
                'ticket' => [
                    'id' => $ticket->id,
                    'name' => $ticket->title,
                ]
            ];
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
           $this->ticketServices->deleteTicket($id);
           return [
                'chamado deletado com sucesso'
           ];
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroyCategory(string $id) 
    {
        try {
            $this->categoriesServices->deleteCategoria($id);
            return [
                 'Categoria deletada com sucesso'
            ];
         } catch(\Exception $e) {
             return $e->getMessage();
         }
    }

    public function getTicketsTable()
    {
        $tickets = $this->ticketServices->getTicket();
        return datatables()->of($tickets)
            ->addColumn('ações', function ($row) {
                return '<a href="#" class="btn btn-sm btn-primary">Ver</a>';
            })
            ->rawColumns(['ações'])
            ->toJson();
    }


    public function getTicketsFind($id)
    {
        $tickets =  $this->ticketServices->getTicket($id);
        $suporteOwner = $this->ticketServices->suporteOwner();

        return [
            'tickets' => $tickets,
            'suporteOwner' => $suporteOwner
        ];
    }

    public function addCategory(Request $request) 
    {
        try {
            $categoryName = $request->post("name"); 
            $categoria = $this->categoriesServices->addCategory($categoryName);
            return [
                'id' => $categoria->id,
                'name' => $categoria->name,
            ];
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
