<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RefMaterialRequest;
use App\Models\RefMaterial;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class RefMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        $this->checkAuthorization(auth()->user(), ['material.view']);

        return view('backend.pages.material.index', [
            'material' => RefMaterial::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkAuthorization(auth()->user(), ['material.create']);

        return view('backend.pages.material.create', [
            'material' => RefMaterial::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RefMaterialRequest $request): RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['material.create']);

        $material = new RefMaterial();
        $material->material = $request->material;
        $material->save();

        session()->flash('success', __('Material disimpan'));

        return redirect()->route('admin.material.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): Renderable
    {
        $this->checkAuthorization(auth()->user(), ['material.edit']);

        $material = RefMaterial::findOrFail($id);

        return view('backend.pages.material.edit', [
            'material' => $material,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RefMaterialRequest $request, int $id): RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['material.edit']);

        $material = RefMaterial::findOrFail($id);
        $material->material = $request->material;
        $material->save();

        session()->flash('success', 'Material diperbarui');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['material.delete']);

        $material = RefMaterial::findOrFail($id);
        $material->delete();
        session()->flash('success', 'Material dihapus');

        return back();
    }
}
