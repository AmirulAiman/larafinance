@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Invoice</h3>
                <button class="btn btn-secondary"><span class="fas fa-plus"></span></button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead style="font-weight: bold;">
                        <tr>
                            <td>#</td>
                            <td>Invoice No.</td>
                            <td>Due Date</td>
                            <td>Company Name</td>
                            <td>Amount(RM)</td>
                            <td colspan="3">Payment</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="alert alert-danger">
                            <td>1</td>
                            <td>Invoice #154</td>
                            <td>20-9-2020</td>
                            <td>Cempaka Sdn. Bhd.</td>
                            <td>250.00</td>
                            <td colspan="2">
                                <input
                                    type="number"
                                    class="form-control"
                                >
                            </td>
                            <td>
                                <button class="btn btn-primary"><span class="fas fa-money-bill"></span>&nbsp;Pay</button>
                            </td>
                            <td>Overdue</td>
                        </tr>
                        <tr class="alert alert-warning">
                            <td>2</td>
                            <td>Invoice #122</td>
                            <td>30-9-2020</td>
                            <td>Papermill Sdn. Bhd.</td>
                            <td>250.00</td>
                            <td colspan="2">
                                <input
                                    type="number"
                                    class="form-control"
                                >
                            </td>
                            <td>
                                <button class="btn btn-primary"><span class="fas fa-money-bill"></span>&nbsp;Pay</button>
                            </td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Invoice #122</td>
                            <td>20-09-2011</td>
                            <td>Ahmad & Co. Sdn. Bhd.</td>
                            <td>150.00</td>
                            <td colspan="2">
                                <input
                                    type="number"
                                    class="form-control"
                                >
                            </td>
                            <td>
                                <button class="btn btn-primary"><span class="fas fa-money-bill"></span>&nbsp;Pay
                                </button>
                            </td>
                            <td>Success</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Invoice #23</td>
                            <td>20-10-2010</td>
                            <td>Ahmad & Co. Sdn. Bhd.</td>
                            <td>150.00</td>
                            <td colspan="3">

                            </td>
                            <td>Success</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
