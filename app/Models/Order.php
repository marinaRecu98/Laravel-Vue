<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['order_number', 'status', 'total_amount'];

    public static function fieldlabels()
    {
        return [
            'order_number' => 'Nº Pedido',
            'status' => 'Estado',
            'total_amount' => 'Importe (€)'
        ];
    }

    protected $appends = ['routes'];

    public function getRoutesAttribute()
    {
        return [
            'edit' => route('orders.edit', $this->id),
            'update' => route('orders.update', $this->id),
            'delete' => route('orders.destroy', $this->id),
        ];
    }

    public static function getGlobalRoutes()
    {
        return [
            'index' => route('orders.index'),
            'create' => route('orders.create'),
            'store' => route('orders.store'),
        ];
    }
}
