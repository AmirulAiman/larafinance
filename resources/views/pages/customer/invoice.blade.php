@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Invoices</h3>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="form-group">
                        <label for="search">Search: </label>
                        <input
                            class="form-control"
                            type="text"
                            name="search"
                            id="search"
                            placeholder="Filter invoice list..."
                        >
                    </div>
                </div>
                <div>
                    <livewire:invoice-list/>
                </div>
{{--                <div class="d-flex justify-content-center">--}}
{{--                    <ul class="pagination">--}}
{{--                        <li class="page-item"><a class="page-link" href="#">Prev</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
