<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h5 class="text-center">TO DO</h5>
                </div>
                <div class="card-body task-list" data-column="todo">
                    @foreach($tasks as $task)
                        @if($task->status_id == 1)
                            <div class="card border-light mb-3" style="max-width: 18rem;">
                                <div class="card-header">
                                    <h6 class="card-title">Назва: {{ $task->name }}</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Опис: {{ $task->description }}</p>
                                </div>
                                <div class="card-body">Виконавці:
                                    @foreach($members as $key=> $name)
                                        <ul>
                                            <li>{{ $name }}</li>
                                        </ul>
                                    @endforeach
                                </div>
                                <div class="bg-light clearfix">
                                    <p class="card-text float-left">
                                        Створено: {{ $task->created_at->format('d/m/Y') }}</p>
                                    <form id="status_update" action="{{ route('task.update', [$task]) }}" method="post">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <button type="submit" id="status_update" class="float-right"
                                                data-bs-toggle="button">
                                            <i class="fa fa-arrow-circle-right"
                                               style="font-size:22px;color:#7be309"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="text-center">In progress</h5>
                </div>
                <div class="card-body task-list" data-column="todo">
                    @foreach($tasks as $task)
                        @if($task->status_id == 2)
                            <div class="card border-light mb-3" style="max-width: 18rem;">
                                <div class="card-header">
                                    <h6 class="card-title">Назва: {{ $task->name }}</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Опис: {{ $task->description }}</p>
                                </div>
                                <div class="card-body">
                                    <div class="card-body">Виконавці:
                                        @foreach($members as $key=> $name)
                                            <ul>
                                                <li>{{ $name }}</li>
                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="bg-light clearfix">
                                    <p class="card-text float-left">
                                        Розпочато: {{ $task->updated_at->format('d/m/Y H:i') }}</p>
                                    <form id="status_update" action="{{ route('task.update', [$task]) }}" method="post">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <button type="submit" id="status_update" class="float-right"
                                                data-bs-toggle="button">
                                            <i class="fa fa-arrow-circle-right"
                                               style="font-size:22px;color:#7be309"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="text-center">Done</h5>
                </div>
                <div class="card-body task-list" data-column="todo">
                    @foreach($tasks as $task)
                        @if($task->status_id == 3)
                            <div class="card border-light mb-3" style="max-width: 18rem;">
                                <div class="card-header">
                                    <h6 class="card-title">Назва: {{ $task->name }}</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Опис: {{ $task->description }}</p>
                                </div>
                                <div class="card-body">

                                    <div class="card-body">Виконавці:
                                        @foreach($members as $key=> $name)
                                            <ul>
                                                <li>{{ $name }}</li>
                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="bg-light clearfix">
                                    <p class="card-text float-left">
                                        Завершено: {{ $task->updated_at->format('d/m/Y H:i') }}</p>
                                    <form id="delete" action="{{ route('task.destroy', ['$task'=>$task->id]) }}"
                                          method="post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" id="delete" class="close" aria-label="Close"
                                                style='font-size:24px;color:red'>
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>







