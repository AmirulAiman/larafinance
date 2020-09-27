@extends('layouts.app')

@section('content')
    <div class="container">
        <livewire:company-new-invoice :invoice="$invoice"/>
    </div>
@endsection
