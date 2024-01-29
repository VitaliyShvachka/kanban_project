@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('team.heading') }}<b>{{$team->name}}</b></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{route('team.teamUserStore')}}">
                            {{ csrf_field() }}
                            <input name="team_id" type="hidden" value="{{$team->id}}">
                            <div class="form-group{{ $errors->has('login') || $errors->has('user_login') || $errors->has('user_id') ? ' has-error' : '' }}">
                                <label for="user-login" class="col-md-4 control-label">{{ trans('team.login') }}</label>
                                <div class="col-md-6">
                                    <input name="login" type="text" class="form-control" id="user-login"
                                           value="{{ old('login') }}">
                                    @if ($errors->has('login'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                    @endif
                                    @if ($errors->has('user_login'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_login') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div id="user-results"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> {{ trans('team.btn-submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('team.users-team') }}<b>{{$team->name}}</b></div>
                    <div class="panel-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <td>
                                    <div>{{ trans('team.id') }}</div>
                                </td>
                                <td>
                                    <div>{{ trans('team.login') }}</div>
                                </td>
                                <td>
                                    <div>{{ trans('team.name') }}</div>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($team->users as $user)
                                <tr>
                                    <td>
                                        <div>{{$user->id}}</div>
                                    </td>
                                    <td>
                                        <div>{{$user->login}}</div>
                                    </td>
                                    <td>
                                        <div>{{$user->name}}</div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a href="/" title="Finish" class="btn btn-primary">{{ trans('team.finish-bn') }}</a>
    </div>
    <script>
        $(function () {
            $("#user-login").autocomplete({
                source: "/team/users",
                minLength: 2
            });
        });
    </script>
@endsection