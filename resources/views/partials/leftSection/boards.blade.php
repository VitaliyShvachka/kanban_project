<h4>Список дошок користувача</h4>
<ul id="task-list">
    @foreach($teams as $team)
            @foreach($boards as $board)
                @if($board->team_id == $team->id )
                <li>
                    <a href="/board/1/show" title="">{{$board->title}}</a>
                    <a href="{{route('task.create', ['$board' => $board->id])}}" class="btn btn-default">Додати задачу</a>
                </li>
                @endif
            @endforeach
    @endforeach
</ul>

