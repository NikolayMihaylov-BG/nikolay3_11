<?php

use App\Enums\MeasurementUnit;
use App\Enums\Warehouse;
use \App\Enums\PaymentType;

return [
    MeasurementUnit::Liter->value => "Литър",
    MeasurementUnit::KG->value => "Килограм",
    MeasurementUnit::Piece->value => "Брой",
    Warehouse::RawMaterial->value => "Сурово Мляко",
    Warehouse::Production->value => "Производство",
    Warehouse::FinishedProduct->value => "Готова Продукция",
    "payment_type_" . PaymentType::Cash->value => "В брой",
    "payment_type_" . PaymentType::Bank->value => "Банка"
];
