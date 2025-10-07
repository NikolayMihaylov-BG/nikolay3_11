<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Services\ItemService;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Models\Item;

class ItemController extends Controller
{
    private ItemService $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.items.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.items.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        $this->itemService->createUpdate($request->validated());

        return redirect()->route('items.index')->with('success', 'Материалът е създаден.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('admin.pages.items.create-edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, Item $item)
    {
        $this->itemService->createUpdate($request->validated(), $item);

        return redirect()->route('items.index')->with('success', 'Материалът е обновен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $this->itemService->delete($item);

        return redirect()->route('items.index')->with('success', 'Материалът е изтрит.');
    }

    /**
     * @return JsonResponse
     * @throws Exception
     */
    public function datatable(): JsonResponse
    {
        return $this->itemService->datatable();
    }
}
