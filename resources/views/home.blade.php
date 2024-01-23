@extends('layouts.app')
@section('content')
  @include('partials.header')


  <div class="container">
    <div class="row">
      <div class="col-md-4">
        @include('partials.left-section')
      </div>
      <div class="col-md-8">
        @include('partials.right-section')
      </div>
    </div>
  </div>
  @include('partials.footer')
@endsection




