<section class="right-section">
    <div class="task_wrapper">
                    <ul class="category-list">
                        <li class="category-item">To do</li>
                        @foreach($tasks as $task)
                            @if($task->status_id == 1)
                                <li class="category-item">{{$task->name}}
                                    @foreach($members as $member)
                                        <p>{{$member}}</p>
                                    @endforeach
                                    <form id="status_update" action="{{ route('task.update', [$task]) }}" method="post">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <button type="submit" id="status_update" class="btn " data-bs-toggle="button">
                                        <span class="glyphicon glyphicon-forward"></span>
                                    </button>
                                    </form>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                <ul class="category-list">
                    <li class="category-item">In progress</li>
                    @foreach($tasks as $task)
                        @if($task->status_id == 2)
                            <li class="category-item">{{$task->name}}
                                @foreach($members as $member)
                                    <p>{{$member}}</p>
                                @endforeach
                                <form id="status_update" action="{{ route('task.update', [$task]) }}" method="post">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <button type="submit" id="status_update" class="btn " data-bs-toggle="button">
                                        <span class="glyphicon glyphicon-forward"></span>
                                    </button>
                                </form>
                            </li>
                        @endif
                    @endforeach
                </ul>

                <ul class="category-list">
                    <li class="category-item">Done</li>
                    @foreach($tasks as $task)
                        @if($task->status_id == 3)
                            <li class="category-item">{{$task->name}}
                                @foreach($members as $member)
                                    <p>{{$member}}</p>
                                @endforeach
                                <form id="delete" action="{{ route('task.destroy', ['$task'=>$task->id]) }}"--}}
                                      method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                <a href="{{ route('task.destroy', [$task]) }}">
                                    <span class="glyphicon glyphicon-forward"></span>
                                </a>
                                <button type="submit" id="delete" class="btn btn-default btn-sm">
                                        <i class="material-icons" style="font-size:10px; color:#f32411">close</i>
                                    </button>
                                </form>
                            </li>
                        @endif
                    @endforeach
                </ul>


    </div>

</section>

