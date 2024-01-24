<h3>Перелік дошок</h3>
<ul id="task-list">
        @foreach($boards as $board)
            @if($team_id == $board->team_id)
            <li><a href="/board/1/show" title="">{{$board->title}} - {{$board->team_id}}</a></li>
            @endif
        @endforeach
</ul>

