<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function showInvoice(Request $request)
    {
        session([
            'userName' => $request->input('userName'),
            'userEmail' => $request->input('userEmail'),
            'invoiceNumber' => $request->input('invoiceNumber'),
            'selectedDuration' => $request->input('selectedDuration'),
        ]);
        $userName = session('userName');
        $userEmail = session('userEmail');
        $invoiceNumber = session('invoiceNumber');
        $selectedDuration = session('selectedDuration');
        $total = $selectedDuration * 100000; 
        $items = [
            ['no' => 1, 'description' => 'Pendaftaran Domain', 'total' => $total],
        ];

        return view('invoice', compact('userName', 'userEmail', 'invoiceNumber', 'items', 'total'));
    }
}
