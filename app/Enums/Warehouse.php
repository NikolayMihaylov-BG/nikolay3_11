<?php

namespace App\Enums;

enum Warehouse: string
{
    case RawMaterial = '1';
    case Production = '2';
    case FinishedProduct = '3';
}
