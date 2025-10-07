<?php

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;

class ItemRepository
{
    public function createUpdate(array $data, Item $item = null)
    {
        $model = $item ?: new Item();
        $model->code = $data['code'];
        $model->name = $data['name'];
        $model->qnt = $data['qnt'];
//        $model->price_qnt = $data['price_qnt'];
        $model->unit = $data['unit'];

        $model->save();
    }

    public function delete(Item $item)
    {
        $item->delete();
    }

    public function getDatatableRecords() : Builder
    {
        return Item::query();
    }
}
