@extends('layouts.app')
@section('content')
  @include('partials.header')


  <div class="container">
    <div class="row">
      <div class="col-md-8">
        @include('partials.form-add-board')
      </div>
    </div>
  </div>
  @include('partials.footer')
@endsection