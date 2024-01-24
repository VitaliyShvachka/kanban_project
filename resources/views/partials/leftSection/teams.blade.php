<a href="/team/create" class="btn btn-primary">Добавить Команду</a>
<ul id="task-list">
@foreach($teams as $team)
        <li>{{$team->name}} - {{$team->pivot->team_id}}<a href="{{ route('board.create', ['$team' => $team->id]) }}" title="">[+ Доска]</a> </li>
@endforeach
</ul>