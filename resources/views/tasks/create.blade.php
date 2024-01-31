@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Створення задачі</div>
                    <div class="panel-body">
                        <form action="{{route('task.store')}}" method="post" >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="control-label">Назва</label>
                                <input id="name" type="text" class="form-control" name="name"/>
                            </div>
                            <div class="form-group">
                                <label for="members" class="control-label">Учасники</label>
                                <select id="members" multiple name="members[]" class="form-control">
                                    @foreach($members as $item)
                                        <option>{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="board_id" value="{{$board->id}}">
                                <label for="description" class="control-label">Задача</label>
                                <input id="description" type="text" class="form-control" name="description"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Створити" class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection