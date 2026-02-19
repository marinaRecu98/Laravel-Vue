<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'unit', 'stock'];

    public static function fieldlabels()
    {
        return [
            'name' => 'Materia Prima',
            'description' => 'Descripción',
            'unit' => 'Unidad',
            'stock' => 'Stock Actual'
        ];
    }

    protected $appends = ['routes'];

    public function getRoutesAttribute()
    {
        return [
            'edit' => route('raw-materials.edit', $this->id),
            'update' => route('raw-materials.update', $this->id),
            'delete' => route('raw-materials.destroy', $this->id),
        ];
    }

    public static function getGlobalRoutes()
    {
        return [
            'index' => route('raw-materials.index'),
            'create' => route('raw-materials.create'),
            'store' => route('raw-materials.store'),
        ];
    }
}
