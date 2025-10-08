<?php

use App\Enums\MeasurementUnit;
use App\Enums\Warehouse;

return [
    MeasurementUnit::Liter->value => "Литър",
    MeasurementUnit::KG->value => "Килограм",
    MeasurementUnit::Piece->value => "Брой",
    Warehouse::RawMaterial->value => "Сурово Мляко",
    Warehouse::Production->value => "Производство",
    Warehouse::FinishedProduct->value => "Готова Продукция"
];
