<div class="well well-sm">
    <h3>Дошки</h3>
    <div class="list-group">
        @foreach($teams as $team)
            @foreach($team->boards as $board)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{route('board.show', ['$board' => $board->id])}}" title="">{{$board->title}}</a>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{route('task.create', ['board' => $board->id])}}" class="btn btn-warning"><i
                                        class="fa fa-plus"></i> Додати задачу</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>

