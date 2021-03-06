<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InvoicesController extends Controller
{
  public function index(Request $request)
  {
    $query = DB::table('invoices')
      ->join('customers', 'invoices.CustomerId', '=', 'customers.CustomerId');

        IF ($request->query('search')){
            $query->where('FirstName', '=', $request->query('search'));
            $query->orWhere('LastName', '=', $request->query('search'));
        }

      $invoices = $query->get();

    return view('invoices', [
      'invoices' => $invoices,
      'search' => $request->query('search')
           ]);
  }
}