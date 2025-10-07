{{--<!doctype html>--}}
{{--<html lang="bg">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>Фактура</title>--}}

{{--    <style>--}}
{{--        body {--}}
{{--            font-family: "DejaVu Sans", sans-serif;--}}
{{--            font-size: 12px;--}}
{{--        }--}}

{{--        .table-bordered td, .table-bordered th {--}}
{{--            border: 1px solid #000000;--}}
{{--            padding: 4px;--}}
{{--            text-align: center;--}}
{{--        }--}}

{{--        .table-bordered .last-child {--}}
{{--            border: none;--}}
{{--        }--}}

{{--        .bold {--}}
{{--            font-weight: bold;--}}
{{--        }--}}

{{--        .empty-checkbox {--}}
{{--            width: 1px;--}}
{{--            border: 1px solid #000000;--}}
{{--            padding: 6px;--}}
{{--            display: inline-flex;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--    <h1 style="background-color: #cccccc; padding: 10px; text-align: center;">ФАКТУРА</h1>--}}

{{--    <table style="width: 100%;">--}}
{{--        <tr style="font-size: 15px;">--}}
{{--            <td style="text-align: center;"><span>№</span> <span style="text-decoration: underline;" class="bold">{{ $invoiceNumber }}</span></td>--}}
{{--            <td style="text-align: center;"><span>Дата на издаване:</span> <span class="bold">{{ now()->format('d.m.Y') }}</span></td>--}}
{{--            <td style="text-align: center;" class="bold">ОРИГИНАЛ</td>--}}
{{--        </tr>--}}
{{--    </table>--}}

{{--    <table style="margin-top: 20px; width: 100%;">--}}
{{--        <tr>--}}
{{--            <td style="border: 1px solid #000000; width: 100%; padding: 10px;">--}}
{{--                <div>Получател: {{ $invoiceParameter->name }}</div>--}}
{{--                <div>Адрес: {{ $invoiceParameter->address }}</div>--}}
{{--                <div>МОЛ: {{ $invoiceParameter->manager }}</div>--}}
{{--                <div>ИД по ДДС: {{ $invoiceParameter->vat }}</div>--}}
{{--                <div>ИН: {{ $invoiceParameter->tin }}</div>--}}
{{--            </td>--}}
{{--            <td style="width: 20px;"></td>--}}
{{--            <td style="border: 1px solid #000000; width: 100%; padding: 10px;">--}}
{{--                <div>Получател: "Апекс Капитал" ЕООД</div>--}}
{{--                <div>Адрес: гр.Дупница, жк.Бистрица бл.73 ап.15</div>--}}
{{--                <div>МОЛ: Георги Е. Георгиев</div>--}}
{{--                <div>ИД по ДДС: BG200054103</div>--}}
{{--                <div>ИН: 200054103</div>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    </table>--}}

{{--    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;" class="table-bordered">--}}
{{--        <thead>--}}
{{--            <tr>--}}
{{--                <th>No</th>--}}
{{--                <th>Арт. номер</th>--}}
{{--                <th>Наименование на стоката</th>--}}
{{--                <th>Мярка</th>--}}
{{--                <th>Количество</th>--}}
{{--                <th>Ед. цена</th>--}}
{{--                <th>Стойност</th>--}}
{{--            </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--            @foreach($items as $item)--}}
{{--                <tr>--}}
{{--                    <td>{{ $item['number'] }}</td>--}}
{{--                    <td>{{ $item['item_number'] }}</td>--}}
{{--                    <td>{{ $item['name'] }}</td>--}}
{{--                    <td>{{ $item['unit'] }}</td>--}}
{{--                    <td>{{ $item['qnt'] }}</td>--}}
{{--                    <td><div>{{ display_price($item['price_qnt']) }} лв.</div><div>{{ display_price(calculateEuroPrice($item['price_qnt'])) }} евро</div></td>--}}
{{--                    <td><div>{{ display_price($item['price']) }} лв.</div><div>{{ display_price(calculateEuroPrice($item['price'])) }} евро</div></td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}

{{--            <tr>--}}
{{--                <td class="last-child"></td>--}}
{{--                <td class="last-child"></td>--}}
{{--                <td class="last-child"></td>--}}
{{--                <td class="last-child"></td>--}}
{{--                <td class="last-child"></td>--}}
{{--                <td class="last-child">Обща Сума: </td>--}}
{{--                <td class="last-child"><div>{{ $rawPrice }} лв.</div><div>{{ display_price(calculateEuroPrice($rawPrice)) }} евро</div></td>--}}
{{--            </tr>--}}
{{--        </tbody>--}}
{{--    </table>--}}

{{--    <table style="margin-top: 20px; width: 100%;">--}}
{{--        <tr>--}}
{{--            <td style="">--}}
{{--                <div>Основание за <div class="empty-checkbox"></div> нулева ставка <div class="empty-checkbox"></div> неначисляване на ДДС:</div>--}}
{{--            </td>--}}
{{--            <td style="width: 20px;"></td>--}}
{{--            <td style="">--}}
{{--                @if($discount)--}}
{{--                    <div>Т.О. (намаление) {{ $discount }}%: {{ $discountAmount }} лв. / {{ display_price(calculateEuroPrice($discountAmount)) }} евро</div>--}}
{{--                @endif--}}
{{--                <div><span class="bold">Данъчна основа:</span> {{ $price }} лв. / {{ display_price(calculateEuroPrice($price)) }} евро</div>--}}
{{--                <div>Ставка 20% ДДС: {{ $vatPrice }} лв. / {{ display_price(calculateEuroPrice($vatPrice)) }} евро</div>--}}
{{--                <div style="text-decoration: underline;"><span class="bold">Сума за плащане:</span> {{ $totalPrice }} лв. / {{ display_price(display_price(calculateEuroPrice($vatPrice)) + display_price(calculateEuroPrice($price))) }} евро</div>--}}
{{--                <div>Сума за плащане, различна от данъчката основа и данъка: </div>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    </table>--}}

{{--    <div style="margin-top: 20px; width: 100%; background-color: #cccccc; font-size: 15px;">--}}
{{--        <div><span class="bold">Словом в лева: </span> {{ $totalInWordsBGN }}</div>--}}
{{--        <div><span class="bold">Словом в евро: </span> {{ $totalInWordsEUR }}</div>--}}
{{--    </div>--}}

{{--    <table style="margin-top: 20px; width: 100%;">--}}
{{--        <tr>--}}
{{--            <td style="width: 100%;">--}}
{{--                <div>Място на сделката: <span class="bold">Дупница</span></div>--}}
{{--                <div>Дата на данъчното събитие / дата на плащането: <span class="bold">{{ now()->format('d.m.Y') }}</span> </div>--}}
{{--                <div>Получил: </div>--}}
{{--            </td>--}}
{{--            <td style="width: 20px;"></td>--}}
{{--            <td style="width: 100%;">--}}
{{--                <div>Банка: {{ $invoiceParameter->bank }}</div>--}}
{{--                <div>BIC код на банката: {{ $invoiceParameter->bic }}</div>--}}
{{--                <div>IBAN разпл. сметка: {{ $invoiceParameter->iban }}</div>--}}
{{--                <div>Срок на плащане: </div>--}}
{{--                <div>Начин на плащане: <span class="bold">в брой</span></div>--}}
{{--                <div>Съставил: <span class="bold">{{ $creator }}</span></div>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    </table>--}}

{{--    <table style="margin-top: 60px; width: 100%;">--}}
{{--        <tr>--}}
{{--            <td style="width: 100%;">--}}
{{--                <div>Подпис: ............................</div>--}}
{{--            </td>--}}
{{--            <td style="width: 20px;"></td>--}}
{{--            <td style="width: 100%;">--}}
{{--                <div>Подпис: ............................</div>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    </table>--}}
{{--</body>--}}
{{--</html>--}}

<!doctype html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Фактура</title>

    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 12px;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #000000;
            padding: 4px;
            text-align: center;
        }

        .table-bordered .last-child {
            border: none;
        }

        .bold {
            font-weight: bold;
        }

        .empty-checkbox {
            width: 1px;
            border: 1px solid #000000;
            padding: 6px;
            display: inline-flex;
        }
    </style>
</head>
<body>
<h1 style="background-color: #cccccc; padding: 10px; text-align: center;">ФАКТУРА</h1>

<table style="width: 100%;">
    <tr style="font-size: 15px;">
        <td style="text-align: center;"><span>№</span> <span style="text-decoration: underline;" class="bold">1000018584</span></td>
        <td style="text-align: center;"><span>Дата на издаване:</span> <span class="bold">{{ now()->format('d.m.Y') }}</span></td>
        <td style="text-align: center;" class="bold">ОРИГИНАЛ</td>
    </tr>
</table>

<table style="margin-top: 20px; width: 100%;">
    <tr>
        <td style="border: 1px solid #000000; width: 100%; padding: 10px;">
            <div>Получател: ВЕРОС 2011 ООД</div>
            <div>Адрес: Благоевград, ул.Даме Груев 32 В</div>
            <div>МОЛ: Валентин Кирилов</div>
            <div>ИД по ДДС: BG201614416</div>
            <div>ИН: 201614416</div>
        </td>
        <td style="width: 20px;"></td>
        <td style="border: 1px solid #000000; width: 100%; padding: 10px;">
            <div>Доставчик: "Апекс Капитал" ЕООД</div>
            <div>Адрес: гр.Дупница, жк.Бистрица бл.73 ап.15</div>
            <div>МОЛ: Георги Е. Георгиев</div>
            <div>ИД по ДДС: BG200054103</div>
            <div>ИН: 200054103</div>
        </td>
    </tr>
</table>

<table style="width: 100%; border-collapse: collapse; margin-top: 20px;" class="table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Арт. номер</th>
        <th>Наименование на стоката</th>
        <th>Мярка</th>
        <th>Количество</th>
        <th>Ед. цена</th>
        <th>Стойност</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>37</td>
            <td>СИРЕНЕ ДЯДОВАТА ФЕРМА</td>
            <td>КГ</td>
            <td>8.000</td>
            <td><div>6.25 лв.</div><div>3.20 евро</div></td>
            <td><div>50.00 лв.</div><div>25.56 евро</div></td>
        </tr>
        <tr>
            <td>2</td>
            <td>238</td>
            <td>Кисело мляко 3.2% 0,500</td>
            <td>БР</td>
            <td>20.000</td>
            <td><div>0.96 лв.</div><div>0.49 евро</div></td>
            <td><div>19.17 лв.</div><div>9.80 евро</div></td>
        </tr>

    <tr>
        <td class="last-child"></td>
        <td class="last-child"></td>
        <td class="last-child"></td>
        <td class="last-child"></td>
        <td class="last-child"></td>
        <td class="last-child">Обща Сума: </td>
        <td class="last-child"><div>69.17 лв.</div><div>35.37 евро</div></td>
    </tr>
    </tbody>
</table>

<table style="margin-top: 20px; width: 100%;">
    <tr>
        <td style="">
            <div>Основание за <div class="empty-checkbox"></div> нулева ставка <div class="empty-checkbox"></div> неначисляване на ДДС:</div>
        </td>
        <td style="width: 20px;"></td>
        <td style="">
{{--            @if($discount)--}}
{{--                <div>Т.О. (намаление) {{ $discount }}%: {{ $discountAmount }} лв. / {{ display_price(calculateEuroPrice($discountAmount)) }} евро</div>--}}
{{--            @endif--}}
            <div><span class="bold">Данъчна основа:</span> 69.17 лв. / 35.37 евро</div>
            <div>Ставка 20% ДДС: 13.83 лв. / 7.07 евро</div>
            <div style="text-decoration: underline;"><span class="bold">Сума за плащане:</span> 83.00 лв. / 42.44 евро</div>
            <div>Сума за плащане, различна от данъчката основа и данъка: </div>
        </td>
    </tr>
</table>

<div style="margin-top: 20px; width: 100%; background-color: #cccccc; font-size: 15px;">
    <div><span class="bold">Словом в лева: </span> {{ $totalInWordsBGN }}</div>
    <div><span class="bold">Словом в евро: </span> {{ $totalInWordsEUR }}</div>
</div>

<table style="margin-top: 20px; width: 100%;">
    <tr>
        <td style="width: 100%;">
            <div>Място на сделката: <span class="bold">Дупница</span></div>
            <div>Дата на данъчното събитие / дата на плащането: <span class="bold">{{ now()->format('d.m.Y') }}</span> </div>
            <div>Получил: </div>
        </td>
        <td style="width: 20px;"></td>
        <td style="width: 100%;">
            <div>Банка: Уникредит Булбанк АД</div>
            <div>BIC код на банката: UNCRBGSF</div>
            <div>IBAN разпл. сметка: BG53UNCR70001522271526</div>
            <div>Срок на плащане: </div>
            <div>Начин на плащане: <span class="bold">в брой</span></div>
            <div>Съставил: <span class="bold">Емилия Величкова</span></div>
        </td>
    </tr>
</table>

<table style="margin-top: 60px; width: 100%;">
    <tr>
        <td style="width: 100%;">
            <div>Подпис: ............................</div>
        </td>
        <td style="width: 20px;"></td>
        <td style="width: 100%;">
            <div>Подпис: ............................</div>
        </td>
    </tr>
</table>
</body>
</html>

