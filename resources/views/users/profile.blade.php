@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="nav-tabs-custom">
                <!-- TAB NAVIGATION -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Profile</a></li>
                    <li><a href="#tab2" role="tab" data-toggle="tab">Settings</a></li>
                </ul>
                <!-- TAB CONTENT -->
                <div class="tab-content">
                    <div class="active tab-pane fade in" id="tab1">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="../../assets/dist/img/user4-128x128.jpg" alt="User profile picture">

                            <h3 class="profile-username text-center">{{ $d->user->first_name }} {{ $d->user->last_name }}</h3>

                            {{--<p class="text-muted text-center">Software Engineer</p>--}}

                            <ul class="list-group list-group-unbordered">

                                @if($d->user->subsidiary)
                                    <li class="list-group-item">
                                        <b>Birthday</b> <a class="pull-right">{{ $d->user->subsidiary->name }}</a>
                                    </li>
                                @endif
                                @if($d->user->birthday)
                                    <li class="list-group-item">
                                        <b>Birthday</b> <a class="pull-right">{{ $d->user->birthday }}</a>
                                    </li>
                                @endif
                                @if($d->user->phone)
                                    <li class="list-group-item">
                                        <b>Birthday</b> <a class="pull-right">{{ $d->user->phone }}</a>
                                    </li>
                                @endif
                                @if($d->user->email)
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="pull-right">{{ $d->user->email }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">About</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                {{--<strong><i class="fa fa-book margin-r-5"></i> Education</strong>--}}

                                {{--<p class="text-muted">--}}
                                {{--B.S. in Computer Science from the University of Tennessee at Knoxville--}}
                                {{--</p>--}}

                                {{--<hr>--}}
                                @if($d->user->country || $d->user->conty || $d->user->city)
                                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                                    <p class="text-muted">
                                    {{ $d->user->location }}
                                    <hr>
                                @endif
                                @if($d->user->skills)
                                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                                    <p>
                                        @php $skills = explode(',',$d->user->skills);
                                        @endphp

                                        @foreach($skills as $skill)
                                            <span class="label label-danger">{{ $skill }}</span>
                                        @endforeach
                                    </p>

                                    <hr>
                                @endif

                                @if($d->user->about)
                                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                                    <p>{{ $d->user->about }}</p>
                                @endif
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2">
                            {!! Form::open(['url' => route('users.profile.update',$d->user->id),'method' => 'PUT','class' => 'form-horizontal']) !!}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">First Name</label>
                                <div class="col-sm-10">
                                    {!! Form::text('first_name',$d->user->first_name,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-10">
                                    {!! Form::text('last_name',$d->user->last_name,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    {!! Form::email('email',$d->user->email,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Change Pass</label>
                                <div class="col-sm-10">
                                    {!! Form::email('password',null,['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pass Confirm</label>
                                <div class="col-sm-10">
                                    {!! Form::email('password_confirmation',null,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Birthday</label>
                                <div class="col-sm-10">
                                    {!! Form::text('birthday',$d->user->birthday,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Country</label>
                                <div class="col-sm-10">
                                    {!! Form::text('country',$d->user->country,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">County</label>
                                <div class="col-sm-10">
                                    {!! Form::text('county',$d->user->county,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">City</label>
                                <div class="col-sm-10">
                                    {!! Form::text('city',$d->user->city,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Sex</label>
                                <div class="col-sm-10">
                                    {!! Form::select('sex',['male' => 'Male','female' => 'Female'],$d->user->sex,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Skills</label>
                                <div class="col-sm-10">
                                    {!! Form::select('skills',explode(',',$d->user->skills),explode(',',$d->user->skills),['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">About</label>
                                <div class="col-sm-10">
                                    {!! Form::textarea('about',$d->user->about,['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                       {{ Form::close() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop