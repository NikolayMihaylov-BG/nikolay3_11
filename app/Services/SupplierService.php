<?php

namespace App\Services;

use App\Models\Partner;
use App\Repositories\PartnerRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class SupplierService
{
    private PartnerRepository $partnerRepository;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    public function createUpdate(array $data, Partner $partner = null)
    {
        $data['type'] = \App\Enums\Partner::Supplier;
        $this->partnerRepository->createUpdate($data, $partner);
    }

    public function delete(Partner $item)
    {
        $this->partnerRepository->delete($item);
    }

    /**
     * Get all data for the datatable
     * @return JsonResponse
     * @throws Exception
     */
    public function datatable(): JsonResponse
    {
        return Datatables::of($this->partnerRepository->getDatatableRecordsByType(\App\Enums\Partner::Supplier))
            ->addColumn('actions', function(Partner $partner) {
                $actions = [
                    'edit' => route('suppliers.edit', ['supplier' => $partner->id]),
                    'delete' => route('suppliers.destroy', ['supplier' => $partner->id])
                ];

                return view('admin.partials.datatable.render-actions', compact('actions'))->render();
            })
            ->escapeColumns([])
            ->make();
    }
}
