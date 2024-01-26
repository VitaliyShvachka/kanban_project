<a href="{{ route('team.create') }}" class="btn btn-primary">Додати команду</a>
<ul id="task-list">
@foreach($teams as $team)
        <li>{{$team->name}}
                <a href="{{ route('board.create', ['$team' => $team->id]) }}" title="">[+ Дошка]</a>
        </li>
@endforeach
</ul>