@extends('layouts.app')
@include('form')
@section('content')
  @include('partials.header')


  <div class="container">
    <div class="row">
      <div class="col-md-4">
        @include('partials.leftSection.teams')
        @include('partials.leftSection.boards')
      </div>
      <div class="col-md-8">
        @include('partials.right-section')
      </div>
    </div>
  </div>
  @include('partials.footer')
@endsection




