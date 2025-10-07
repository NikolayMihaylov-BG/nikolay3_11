<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Partner;
use App\Services\SupplierService;
use Illuminate\Http\JsonResponse;

class SupplierController extends Controller
{
    private SupplierService $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.suppliers.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request)
    {
        $this->supplierService->createUpdate($request->validated());

        return redirect()->route('suppliers.index')->with('success', 'Доставчикът е създаден.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $supplier)
    {
        return view('admin.pages.suppliers.create-edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request, Partner $supplier)
    {
        $this->supplierService->createUpdate($request->validated(), $supplier);

        return redirect()->route('suppliers.index')->with('success', 'Доставчикът е обновен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $supplier)
    {
        $this->supplierService->delete($supplier);

        return redirect()->route('suppliers.index')->with('success', 'Доставчикът е изтрит.');
    }

    public function datatable(): JsonResponse
    {
        return $this->supplierService->datatable();
    }
}
