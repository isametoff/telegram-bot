<?php

namespace App\Models;

use App\Enums\Order\Status;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'name',
        'email',
        'product',
        'public',
        'secret_key',
        'updated_at',
        'deleted_at'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', Status::TRUE);
    }
}