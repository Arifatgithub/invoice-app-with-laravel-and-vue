@extends('frontend.layouts.app') @push('styles')
<style>
    a {
        text-decoration: none;
        color: black;
        font-weight: bold;
    }

    a.active {
        color: #0974a2;
        border-bottom: 2px solid #0974a2;
    }
    #random{
        margin-top: 30px;
    }
</style>
@endpush
<div>
    @section('content')

    <div id="random">
        <invoice-index-component>

        </invoice-index-component>
        </div>

    @endsection
@vite(['resources/js/app.js'])
