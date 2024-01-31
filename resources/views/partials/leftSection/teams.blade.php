<div class="well well-sm">
    <h3>Команди</h3>
    <div class="list-group">
        @foreach($teams as $team)
            <div class="list-group-item">
                <div class="row">
                    <div class="col-sm-6">{{$team->name}}</div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('board.create', ['$team' => $team->id]) }}"
                           title="{{ trans('team.add-board-btn-sidbar') }}" class="btn btn-warning"><i
                                    class="fa fa-plus"></i> {{ trans('team.add-board-btn-sidbar') }}</a>
                    </div>
                </div>
            </div>
        @endforeach
        <a href="{{ route('team.create') }}" class="btn btn-success">{{ trans('team.head-home-sidbar') }}</a>
    </div>
</div>