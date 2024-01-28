@extends('layouts.app')
@section('content')
    @include('partials.header')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('partials.leftSection.teams')
                @include('partials.leftSection.boards')
            </div>
            <div class="col-md-9">
                @include('partials.right-section')
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection