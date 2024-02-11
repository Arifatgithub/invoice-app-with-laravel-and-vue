<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('customer')
            ->get();
        return response()->json(
            $invoices,
            200
        );
    }
    /**
     * invoice search condition
     */

    public function searchInvoice(Request $request)
    {
        $searches = $request->get('s');
        // dd("adfsa");
        // dd($searches);
        if ($searches != null) {
            $outputs = Invoice::with('customer')
                ->where('id', 'LIKE', '%' . $searches . '%')
                // ->where('number', 'LIKE' , '%'.$searches.'%')
                ->get();
            return response()->json(
                $outputs,
                200
            );
        } else {
            return response()->json([
                'message' => 'No search results found'
            ], 404);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function createInvoice(Request $request)
    {
        $counters = Counter::where('key', 'DESC')->first();
        $q = Counter::where('key', 'DESC')->first();
        $invoices = Invoice::orderyBy('id', 'DESC')->first();
        if ($invoices) {
            $invoices = $invoices->id + 1;
            $outputs = $counters->value + $invoices;
        } else {
            $outputs = $counters->value;
        }
        $formData = [
            'number' => $counters->prefix . $outputs,
            'customer_id' => null,
            'customer' => null,
            'date' => date('y-m-d'),
            'due_date' => null,
            'reference' => null,
            'discount' => 0,
            'terms_and_conditions' => 'Defalut Terms and Conditions',
            'items' => [
                'product_id' => null,
                'product' => null,
                'unit_price' => 0,
                'quantity' => 1
            ]
        ];
        dd($formData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function invoice_show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
