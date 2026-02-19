<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact_person', 'email', 'phone', 'address'];

    public static function fieldlabels()
    {
        return [
            'name' => 'Empresa',
            'contact_person' => 'Contacto',
            'email' => 'Email',
            'phone' => 'Teléfono',
            'address' => 'Dirección'
        ];
    }

    protected $appends = ['routes'];

    public function getRoutesAttribute()
    {
        return [
            'edit' => route('suppliers.edit', $this->id),
            'update' => route('suppliers.update', $this->id),
            'delete' => route('suppliers.destroy', $this->id),
        ];
    }

    public static function getGlobalRoutes()
    {
        return [
            'index' => route('suppliers.index'),
            'create' => route('suppliers.create'),
            'store' => route('suppliers.store'),
        ];
    }
}
