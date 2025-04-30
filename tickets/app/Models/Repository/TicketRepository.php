<?php

namespace App\Models\Repository;

use App\Models\Tickets;
use Exception;

Class TicketRepository extends Tickets
{
    public function addTIcket(array $ticket): array
    {
        try {
            $ticketNew = $this->create($ticket);
            return [
                'message' => 'Sucesso',
                'ticket' => [
                    'id' => $ticketNew->id,
                    'name' => $ticketNew->title
                ],
                'status'  => '200'
            ];
        } catch (\Exception $e) {
           Throw new \Exception("Não foi possivel cadastrar o Chamado", 500);
        }
    }

    public function getTicketsData($id = null) {
        try{
            if (!empty($id) && $id != null) 
            {
                return Tickets::with([
                    'createdBy:id,name',
                    'ownerBy:id,name',
                    'category:id,name'
                ])->find($id);
            }
            return  Tickets::with([
                'createdBy:id,name',
                'ownerBy:id,name',
                'category:id,name'
            ])->get();

        }catch (\Exception $e){
           Throw new \Exception("Não foi possivel realizar a consulta dos Chamados", 500);
        }
    }

    public function ticketUpdate(array $attributes, int $id)
    {
        $ticket = $this->find($id);
        if (!$ticket) {
            throw new \Exception("Ticket não encontrado.");
        }

        $status = $attributes['status'];
        if ($attributes['status'] == 'ABERTO') {
            $status = 'in_progress';
        }

        $ticket->status = $status;
        $ticket->owner_id = $attributes['owner_id'];
        $ticket->title  = $attributes['title'];
        $ticket->description = $attributes['description'];
        if (isset($attributes['category_id']))
            $ticket->category_id = $attributes['category_id'];
        $ticket->resolution = $attributes['resolution'];

        $ticket->save();
        return $ticket;
    }
}