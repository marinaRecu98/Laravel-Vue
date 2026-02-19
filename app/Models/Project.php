<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = ["name", "description", "hours", "starting_date"];

    public static function fieldlabels(){
        return [
            "name" =>"Nombre",
            "description" =>"Descripcion",
            "hours" =>"Horas",
            "starting_date" =>"Fecha de inicio"
        ];
    }

    protected $appends = ['routes'];

    public function getRoutesAttribute()
    {
        return [
            'edit' => route('projects.edit', $this->id),
            'update' => route('projects.update', $this->id),
            'delete' => route('projects.destroy', $this->id),
        ];
    }

    public static function getGlobalRoutes()
    {
        return [
            'index' => route('projects.index'),
            'create' => route('projects.create'),
            'store' => route('projects.store'),
        ];
    }
}
