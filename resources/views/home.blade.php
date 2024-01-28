@extends('layouts.app')
@include('form')
@section('content')
  @include('partials.header')


  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        @include('partials.leftSection.teams')
        @include('partials.leftSection.boards')
{{--        @include('partials.leftSection.tasks')--}}
      </div>
      <div class="col-md-10">
        @include('partials.right-section')
      </div>
    </div>
  </div>
  @include('partials.footer')
@endsection




