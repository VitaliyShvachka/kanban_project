<a href="{{ route('team.create') }}" class="btn btn-primary">{{ trans('team.head-home-sidbar') }}</a>
<ul id="task-list">
    @foreach($teams as $team)
        <li>{{$team->name}}
            <a href="{{ route('board.create', ['$team' => $team->id]) }}" title=""><i class="fa fa-plus"></i> {{ trans('team.add-board-btn-sidbar') }}</a>
        </li>
    @endforeach
</ul>