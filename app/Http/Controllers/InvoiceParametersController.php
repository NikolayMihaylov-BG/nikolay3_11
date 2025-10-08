<?php

namespace App\Http\Controllers;

use App\Models\InvoiceParameter;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use NumberToWords\NumberToWords;

class InvoiceParametersController extends Controller
{
    public function index()
    {
        return view('admin.pages.invoice_parameters.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.invoice_parameters.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $model = new InvoiceParameter();
        $model->name = $data['name'];
        $model->address = $data['address'];
        $model->manager = $data['manager'];
        $model->vat = $data['vat'];
        $model->tin = $data['tin'];
        $model->bank = $data['bank'];
        $model->bic = $data['bic'];
        $model->iban = $data['iban'];
        $model->save();

        return redirect()->route('invoice_parameters.index')->with('success', 'Клиентът е създаден.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoiceParameter $invoiceParameter)
    {
        return view('admin.pages.invoice_parameters.create-edit', compact('invoiceParameter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InvoiceParameter $invoiceParameter)
    {
        $data = $request->all();
        $model = $invoiceParameter;
        $model->name = $data['name'];
        $model->address = $data['address'];
        $model->manager = $data['manager'];
        $model->vat = $data['vat'];
        $model->tin = $data['tin'];
        $model->bank = $data['bank'];
        $model->bic = $data['bic'];
        $model->iban = $data['iban'];
        $model->save();

        return redirect()->route('invoice_parameters.index')->with('success', 'Клиентът е обновен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoiceParameter $invoiceParameter)
    {
        $invoiceParameter->delete();

        return redirect()->route('invoice_parameters.index')->with('success', 'Клиентът е изтрит.');
    }

    public function show(InvoiceParameter $invoiceParameter)
    {
        return view('admin.pages.invoice_parameters.create-invoice', compact('invoiceParameter'));
    }

    /**
     * @return JsonResponse
     */
    public function datatable(): JsonResponse
    {
        $records = InvoiceParameter::query();

        return Datatables::of($records)
            ->addColumn('actions', function(InvoiceParameter $client) {
                $actions = [
                    'edit' => route('invoice_parameters.edit', ['invoice_parameter' => $client->id]),
                    'delete' => route('invoice_parameters.destroy', ['invoice_parameter' => $client->id]),
                    'show' => route('invoice_parameters.show', ['invoice_parameter' => $client->id])
                ];

                return view('admin.partials.datatable.render-actions', compact('actions'))->render();
            })
            ->escapeColumns([])
            ->make();
    }

    public function generatepdf(Request $request, InvoiceParameter $invoiceParameter)
    {
        $requestData = $request->all();
        $items = $request->input('items', []);
        $price = 0;
        $rawPrice = 0;
        $vatPrice = 0;
        $totalPrice = 0;
        $discountAmount = 0;

        foreach ($items as $index => &$item) {
            $item['number'] = $index + 1;
            $item['price'] = number_format($item['qnt'] * $item['price_qnt'], 2);
        }
        unset($item);

        foreach ($items as $item) {
            $price = $price + $item['price'];
        }

        $rawPrice = $price;

        if ($requestData['discount'])
        {
            $discountAmount = $requestData['discount'] / 100 * $price;
            $price = $price - $discountAmount;
        }

        $vatPrice = $price * (20 / 100);
        $totalPrice = $price + $vatPrice;

        $numberToWords = new NumberToWords();
        $currencyTransformer = $numberToWords->getCurrencyTransformer('bg');
//        $totalInWordsBGN = $currencyTransformer->toWords(number_format($totalPrice, 2, ''), 'BGN');
//        $totalInWordsEUR = $currencyTransformer->toWords(number_format(display_price(calculateEuroPrice($vatPrice)) + display_price(calculateEuroPrice($price)), 2, ''), 'EUR');
        $totalInWordsBGN = $currencyTransformer->toWords(615180, 'BGN');
        $totalInWordsEUR = $currencyTransformer->toWords(314537, 'EUR');

        $data = [
            'invoiceParameter' => $invoiceParameter,
            'invoiceNumber' => $requestData['invoice_number'],
            'creator' => $requestData['creator'],
            'totalInWordsBGN' => $totalInWordsBGN,
            'totalInWordsEUR' => $totalInWordsEUR,
            'totalPrice' => display_price($totalPrice),
            'vatPrice' => display_price($vatPrice),
            'price' => display_price($price),
            'rawPrice' => display_price($rawPrice),
            'items' => $items,
            'discount' => $requestData['discount'],
            'discountAmount' => display_price($discountAmount),
        ];

        $pdf = Pdf::loadView('admin.pages.invoice_parameters.invoice-pdf', $data);

        return $pdf->download('invoice.pdf');
    }
}
