<h4>Список дошок користувача</h4>
<ul id="task-list">
    @foreach($teams as $team)
            @foreach($team->boards as $board)
                <li>
                    <a href="{{route('board.show', ['$board' => $board->id])}}" title="">{{$board->title}}</a>
                    <a href="{{route('task.create', ['board' => $board->id])}}" class="btn btn-default">Додати задачу</a>
                </li>
            @endforeach
    @endforeach
</ul>

