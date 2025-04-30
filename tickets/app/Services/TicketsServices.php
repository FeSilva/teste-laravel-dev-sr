<?php

namespace App\Services;
use App\Models\Repository\TicketRepository;
use App\DTO\TicketDTO;
use App\Models\User;

Class TicketsServices extends TicketRepository
{
    public function newTicket($ticketData): array
    {
        $ticket = new TicketDTO($ticketData);

        return $this->addTicket($ticket->toArray());
    }

    public function getTicket($id = null)
    {
        return $this->getTicketsData($id);
    }

    public function suporteOwner()
    {
        return User::where('setor', 'suporte')->orderBy("name", 'desc')->get();
    }

    public function updateTicket($attributes, $id)
    {
        $attributes['status'] = match ($attributes['status']) {
            'in_progress'=> 'resolvido',
            'aberto' => 'in_progress',
        };
   
        $attr = [
            'owner_id' => $attributes['owner_id'],
            'title' => $attributes['title'],
            'description' => $attributes['description'],
            'owner_id' => $attributes['owner_id'],  
            'status'   => $attributes['status'],
            'resolution' => $attributes['resolution'] ?? null,
        ];
  
        return $this->ticketUpdate($attr, $id);
    }

    public function deleteTicket($id) 
    {
        $ticket = $this->findOrFail($id); // carrega o ticket
        $ticket->delete(); // deleta o ticket
        return true;
    }
}