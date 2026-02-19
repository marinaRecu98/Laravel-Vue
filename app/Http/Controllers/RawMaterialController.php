<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RawMaterialController extends Controller
{
    public function index()
    {
        $materials = RawMaterial::all();
        $fields = RawMaterial::fieldlabels();
        $modelMetadata = [
            'name' => 'Materia Prima',
            'routes' => RawMaterial::getGlobalRoutes()
        ];
        return Inertia::render('RawMaterials/Index', [
            'rows' => $materials,
            'fields' => $fields,
            'model' => $modelMetadata
        ]);
    }

    public function create()
    {
        return Inertia::render('RawMaterials/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'unit' => 'required|string|max:50',
            'stock' => 'required|numeric|min:0',
        ]);
        RawMaterial::create($validated);
        return redirect()->route('raw-materials.index');
    }

    public function edit(RawMaterial $rawMaterial)
    {
        return Inertia::render('RawMaterials/Edit', ['material' => $rawMaterial]);
    }

    public function update(Request $request, RawMaterial $rawMaterial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'unit' => 'required|string|max:50',
            'stock' => 'required|numeric|min:0',
        ]);
        $rawMaterial->update($validated);
        return redirect()->route('raw-materials.index');
    }

    public function destroy(RawMaterial $rawMaterial)
    {
        $rawMaterial->delete();
        return redirect()->route('raw-materials.index');
    }
}
