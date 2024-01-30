<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 bg-warning">
            <h3 class="text-center">TO DO</h3>
            @foreach($tasks as $task)
                @if($task->status_id == 1)
                    <div class="well well-sm">
                        <div class="border">
                            <h4 class="card-title">{{ $task->name }}</h4>
                        </div>
                        <div class="border">
                            <p class="card-text">{{ $task->description }}</p>
                        </div>
                        <div class="border">
                            <p>Виконавці:
                                @foreach($members as $key=> $name)
                                    <small>{{ $name }}, </small>
                                @endforeach
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">Початок: {{ $task->created_at->format('d.m.Y') }}</div>
                            <div class="col-sm-4 text-right">
                                <form id="status_update" action="{{ route('task.update', [$task]) }}" method="post">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <button type="submit" id="status_update" class="btn btn-success">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="col-md-4 bg-info">
            <h3 class="text-center">In progress</h3>
            @foreach($tasks as $task)
                @if($task->status_id == 2)
                    <div class="well well-sm">
                        <div class="border">
                            <h4 class="card-title">{{ $task->name }}</h4>
                        </div>
                        <div class="border">
                            <p class="card-text">{{ $task->description }}</p>
                        </div>
                        <div class="border">
                            <p>Виконавці:
                                @foreach($members as $key=> $name)
                                    <small>{{ $name }}, </small>
                                @endforeach
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">Початок: {{ $task->created_at->format('d.m.Y') }}</div>
                            <div class="col-sm-4 text-right">
                                <form id="status_update" action="{{ route('task.update', [$task]) }}" method="post">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <button type="submit" id="status_update" class="btn btn-success">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="col-md-4 bg-success">
            <h3 class="text-center">Done</h3>
            @foreach($tasks as $task)
                @if($task->status_id == 3)
                    <div class="well well-sm">
                        <div class="border">
                            <h4 class="card-title">{{ $task->name }}</h4>
                        </div>
                        <div class="border">
                            <p class="card-text">{{ $task->description }}</p>
                        </div>
                        <div class="border">
                            <p>Виконавці:
                                @foreach($members as $key=> $name)
                                    <small>{{ $name }}, </small>
                                @endforeach
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">Початок: {{ $task->created_at->format('d.m.Y') }}</div>
                            <div class="col-sm-4 text-right">
                                <form id="delete" action="{{ route('task.destroy', ['$task'=>$task->id]) }}"
                                      method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" id="delete" class="btn btn-danger">
                                        <i class="fa fa-close"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>







