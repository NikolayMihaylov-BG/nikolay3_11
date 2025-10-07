<?php

namespace App\Services;

use App\Models\Item;
use App\Repositories\ItemRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class ItemService
{
    private ItemRepository $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function createUpdate(array $data, Item $item = null)
    {
        $this->itemRepository->createUpdate($data, $item);
    }

    public function delete(Item $item)
    {
        $this->itemRepository->delete($item);
    }

    /**
     * Get all data for the datatable
     * @return JsonResponse
     * @throws Exception
     */
    public function datatable(): JsonResponse
    {
        return Datatables::of($this->itemRepository->getDatatableRecords())
            ->addColumn('actions', function(Item $item) {
                $actions = [
                    'edit' => route('items.edit', ['item' => $item->id]),
                    'delete' => route('items.destroy', ['item' => $item->id])
                ];

                return view('admin.partials.datatable.render-actions', compact('actions'))->render();
            })
            ->addColumn('unit_trans', function(Item $item) {
                return __("enum.$item->unit");
            })
            ->escapeColumns([])
            ->make();
    }
}
