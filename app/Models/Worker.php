<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'role'];

    public static function fieldlabels()
    {
        return [
            'name' => 'Nombre',
            'email' => 'Email',
            'phone' => 'Teléfono',
            'role' => 'Cargo'
        ];
    }

    protected $appends = ['routes'];

    public function getRoutesAttribute()
    {
        return [
            'edit' => route('workers.edit', $this->id),
            'update' => route('workers.update', $this->id),
            'delete' => route('workers.destroy', $this->id),
        ];
    }

    public static function getGlobalRoutes()
    {
        return [
            'index' => route('workers.index'),
            'create' => route('workers.create'),
            'store' => route('workers.store'),
        ];
    }
}
