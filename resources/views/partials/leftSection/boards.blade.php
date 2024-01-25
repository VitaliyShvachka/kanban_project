<h4>Список дошок користувача</h4>
<ul id="task-list">
        @foreach($boards as $board)
{{--            @if($team_id == $board->team_id)--}}
            <li>
                <a href="/board/1/show" title="">{{$board->title}} - {{$board->team_id}}</a>
                <a href="{{route('board.create', ['$board' => $board->id])}}" class="btn btn-default">Додати задачу</a>
            </li>
{{--            @endif--}}
        @endforeach
</ul>

