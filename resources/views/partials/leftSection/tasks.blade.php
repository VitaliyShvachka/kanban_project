<h4>Виконавці</h4>
<ul id="task-list">
    @foreach($members as $member)
        <li>{{$member->name}} </li>
    @endforeach
</ul>