<form action="{{route('task.store',[$board])}}" method="post">
    {{ csrf_field() }}
    <label for="name" class="col-md-4 control-label">Назва</label>
    <input id="name" type="text" class="form control" name="name"/>
    {{--    <input type="hidden" name="board_id" value="{{ $board}}">--}}
    <label for="description" class="col-md-4 control-label">Задача</label>
    <input id="description" type="text" class="form control" name="description"/>
    <input type="submit" value="Створити"/>
</form>
