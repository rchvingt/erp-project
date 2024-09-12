<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RefSupplierRequest;
use App\Models\RefSupplier;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class RefSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        $this->checkAuthorization(auth()->user(), ['supplier.view']);

        return view('backend.pages.supplier.index', [
            'supplier' => RefSupplier::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkAuthorization(auth()->user(), ['supplier.create']);

        return view('backend.pages.supplier.create', [
            'supplier' => RefSupplier::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RefSupplierRequest $request): RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['supplier.create']);

        $supplier = new RefSupplier();
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
        $supplier->save();

        session()->flash('success', __('Supplier disimpan'));

        return redirect()->route('admin.supplier.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): Renderable
    {
        $this->checkAuthorization(auth()->user(), ['supplier.edit']);

        $supplier = RefSupplier::findOrFail($id);

        return view('backend.pages.supplier.edit', [
            'supplier' => $supplier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RefSupplierRequest $request, int $id): RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['supplier.edit']);
        $supplier = RefSupplier::findOrFail($id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;

        $supplier->save();

        session()->flash('success', 'Supplier berhasil diperbarui');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['supplier.delete']);

        $supplier = RefSupplier::findOrFail($id);
        $supplier->delete();
        session()->flash('success', 'Supplier berhasil dihapus');

        return back();
    }
}
