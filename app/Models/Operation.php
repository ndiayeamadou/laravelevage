<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'number',
        'status',
        'registration_date',
        'observations',
        'closed_at'
    ];

    public function operationDetails()
    {
        return $this->hasMany(OperationDetail::class, 'operation_id', 'id');
    }
}
