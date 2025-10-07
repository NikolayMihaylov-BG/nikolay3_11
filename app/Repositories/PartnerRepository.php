<?php

namespace App\Repositories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Builder;

class PartnerRepository
{
    public function createUpdate(array $data, Partner $partner = null)
    {
        $model = $partner ?: new Partner();
        $model->name = $data['name'];
        $model->type = $data['type'];
        $model->address = $data['address'];
        $model->manager = $data['manager'];
        $model->vat_number = $data['vat_number'];
        $model->tin_number = $data['tin_number'];
        $model->phone = $data['phone'];

        $model->save();
    }

    public function delete(Partner $partner)
    {
        $partner->delete();
    }

    public function getDatatableRecordsByType(\App\Enums\Partner $type) : Builder
    {
        return Partner::type($type);
    }
}
