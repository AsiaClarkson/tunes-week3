@extends('layout')
@section('title', 'Invoices')
@section('main')
  <form action="index.php" method="get">
    <input type="text" name="search" value="{{$search}}">
    <button type="submit">Search</button>
    <a href='/' class='btn btn-link'>Clear</a>
  </form>
  <table class="table">
    <tr>
      <th>Date</th>
      <th>Total</th>
      <th>Customer</th>
      <th>Email</th>
    </tr>
    @forelse ($invoices as $invoice)
      <tr>
        <td>
          {{$invoice->InvoiceDate}}
        </td>
        <td>
          {{$invoice->Total}}
        </td>
        <td>
          {{$invoice->FirstName}} {{$invoice->LastName}}
        </td>
        <td>

        </td>
      </tr>
      @empty
      <tr>
        <td colspan="4">No invoices found</td>
      </tr>
    @endforelse
  </table>
@endsection