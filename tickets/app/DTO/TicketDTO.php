<?php

namespace App\DTO;
use Illuminate\Support\Facades\Auth;
class TicketDTO
{
    public string $title;
    public string $description;
    public int $category_id;
    public int $created_by;
    public ?int $owner_id;

    public function __construct(array $data)
    {
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->category_id = $data['category_id'];
        $this->created_by = Auth::user()->id;
        $this->owner_id = null;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'created_by' => $this->created_by,
            'owner_id' => $this->owner_id,
            'created_at' => now()
        ];
    }
}
