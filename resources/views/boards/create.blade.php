@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Створення дошки</div>
                    <div class="panel-body">
                        <form action="{{route('board.store', ['$team' => $team->id])}}" method="post" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label for="name" class="col-md-4 control-label">Назва</label>
                            <input id="name" type="text" class="form control" name="title"/>
                            {{--    <input type="hidden" name="id_team" value="{{$idTeam}}"/>--}}
                            <input type="hidden" name="id_team" value="1"/>
                            <input type="submit" value="Зберегти" class="btn btn-primary"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection