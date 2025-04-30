<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets'; //
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'created_by',
        'owner_id'
    ];

    /**
     * Relacionamento: um ticket pertence a uma categoria.
     */
    public function category()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    /**
     * Relacionamento: pertence a um usuario que foi responsavel por criar o chamado.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

     /**
     * Relacionamento: pertence a um usuario que responsavel por dar suporte ao chamado.
     */
    public function ownerBy()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
