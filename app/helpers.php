<?php

function calculateEuroPrice($price): float
{
    return (float)$price / 1.95583;
}

function display_price($price) : string
{
    return number_format((float)$price, 5, '.', '');
}
