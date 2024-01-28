@extends('layouts.app')
@section('content')
    <form action="{{route('board.store', ['$team' => $team->id])}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="name" class="col-md-4 control-label">Board</label>
        <input id="name" type="text" name="title" class="form control" value="{{ old('title') }}">
        <input type="hidden" name="id_team" value="{{$team->id}}"/>
        <input type="hidden" name="id_team" value="1"/>
        <input type="submit" value="Зберегти"/>
    </form>
    @if($errors->title->first() != null)
        <div class="alert alert-danger">{{ $errors->title->first() }}</div>
    @endif
@endsection