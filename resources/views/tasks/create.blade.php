<form action="{{route('task.store')}}" method="post">
    {{ csrf_field() }}
    <label for="name" class="col-md-4 control-label">Назва</label>
    <input id="name" type="text" class="form control" name="name"/>
    <select multiple name="members[]">
        @foreach($members as $item)
            <option>{{$item}}</option>
        @endforeach
    </select>
    <input type="hidden" name="board_id" value="{{$board->id}}">
    <label for="description" class="col-md-4 control-label">Задача</label>
    <input id="description" type="text" class="form control" name="description"/>
    <input type="submit" value="Створити"/>
</form>
