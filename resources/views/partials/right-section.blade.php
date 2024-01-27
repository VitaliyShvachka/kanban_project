<style>
    .right-section {
        float: left;
        width: 80%;
        margin-left: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .column {
        width: 30%;
        padding: 10px;
        background-color: #f2f2f2;
        margin-bottom: 10px;
    }
</style>

<section class="right-section">

    @foreach($statuses as $status)
        <div class="column">{{$status->name}}</div>
        @foreach($tasks as $task)
            {{ $task }}
            @if($task->status_id === $status->id)
                <div class="col-md-3">
                    <div><span>Задача: {{ $task->name }}
                            @if($task->status_id !== 3)
                                <form id="status_update" action="{{ route('task.update', [$task]) }}" method="post">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <button type="submit" id="status_update" class="btn " data-bs-toggle="button"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="16"
                                                fill="#59FF47FF" class="bi bi-arrow-right-square-fill"
                                                viewBox="0 0 16 16">
                                            <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1"/>
                                            </svg>
                                    </button>
                                </form>
                            @else
                                <form id="delete" action="{{ route('task.destroy', ['$task'=>$task->id]) }}"
                                      method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}

{{--                                <a href="{{ route('task.destroy', [$task]) }}">--}}
{{--                                    <span class="glyphicon glyphicon-forward"></span>--}}
{{--                                </a>--}}
                                <button type="submit" id="delete" class="btn btn-default btn-sm">
                                        <i class="material-icons" style="font-size:10px; color:#f32411">close</i>
                                    </button>
                                </form>
                            @endif
                            </span>
                    </div>
                    <div>Опис: {{ $task->description }}</div>

                </div>
            @endif
        @endforeach
    @endforeach
</section>

