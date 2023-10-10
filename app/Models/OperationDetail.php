<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'operation_id',
        'fee_id',
        'quantity',
        'price',
        'description',
    ];

    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }
    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }
}
