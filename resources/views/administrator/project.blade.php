@extends('app')

@section('content')
<title>Users | PMSystem</title>
<section class="content-header">
	<h1>
		Users
		<small>Control panel</small>
	</h1>
</section>
<section class="content">
<div class="row">
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>{{ \App\User::count() }}</h3>
				<p>Users</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios-people-outline"></i>
			</div>
			@if(Auth::user()->role == "Administrator" || Auth::user()->role == "Project Manager")
				<a href="{{url('user/add')}}" class="small-box-footer">
					<i class="fa fa-user-plus"></i> Add More User
				</a>
			@else
				<a class="small-box-footer">
					<span style="color: transparent; -webkit-touch-callout: none;
											-webkit-user-select: none;
											-khtml-user-select: none;
											-moz-user-select: none;
											-ms-user-select: none;
											user-select: none;
											cursor: default;">-</span>
				</a>
			@endif
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-green">
			<div class="inner">
				<h3>{{ \App\User::where('activated','=','Y')->count() }}</h3>
				<p>Users Activated</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios-checkmark-outline"></i>
			</div>
				<a class="small-box-footer">
					<span style="color: transparent; -webkit-touch-callout: none;
									    -webkit-user-select: none;
									    -khtml-user-select: none;
									    -moz-user-select: none;
									    -ms-user-select: none;
									    user-select: none;
											cursor: default;">-</span>
				</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-red">
			<div class="inner">
				<h3>{{ \App\User::where('activated','=','N')->count() }}</h3>
				<p>Users Deactivated</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios-close-outline"></i>
			</div>
				<a  class="small-box-footer">
					<span style="color: transparent; -webkit-touch-callout: none;
									    -webkit-user-select: none;
									    -khtml-user-select: none;
									    -moz-user-select: none;
									    -ms-user-select: none;
									    user-select: none;
											cursor: default;">-</span>
				</a>
		</div>
	</div>
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
					<h3 class="box-title">User Data</h3>
      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-bordered">
          <tr>
            <th style="width: 10px; text-align: center;">No</th>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Username</th>
            <th style="text-align: center;">Gender</th>
            <th style="width: 300px; text-align: center;">Email</th>
						<th style="text-align: center;">Role</th>
						<th style="text-align: center;">Status</th>
						@if(Auth::user()->role == "Administrator")
						<th style="text-align: center;">Action</th>
						@endif
          </tr>
					<?php $no = 1; ?>
					@foreach($data as $user)
					<tr>
						<td>{{ $no++ }}</td>
						<td><a href="{{url('user/'.$user->id)}}">{{ $user->name }}</a></td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->gender }}</td>
						<td>{{ $user->email }}</td>
						@if($user->role == "Administrator")
						<td style="text-align: center;"><span class="label bg-green">{{ $user->role }}</span></td>
						@elseif($user->role == "Project Manager")
						<td style="text-align: center;"><span class="label bg-orange">{{ $user->role }}</span></td>
						@elseif($user->role == "Head Developer")
						<td style="text-align: center;"><span class="label bg-purple">{{ $user->role }}</span></td>
						@elseif($user->role == "Developer")
						<td style="text-align: center;"><span class="label bg-red">{{ $user->role }}</span></td>
						@elseif($user->role == "Quality Control")
						<td style="text-align: center;"><span class="label bg-teal">{{ $user->role }}</span></td>
						@endif
						@if($user->activated == "Y")
						<td style="text-align: center;"><span class="badge bg-green">{{ $user->activated }}</span></td>
						@elseif($user->activated == "N")
						<td style="text-align: center;"><span class="badge bg-red">{{ $user->activated }}</span></td>
						@endif
						@if(Auth::user()->role == "Administrator")
						<td style="text-align: center;"><a href="{{ url('user/edit/'.$user->id) }}" class="btn btn-flat btn-success"><i class="fa fa-pencil-square-o"></i> Edit</a>
							<a href="{{ url('user/deleteuser/'.$user->id) }}" class="btn btn-flat btn-danger"><i class="fa fa-close"></i> Delete</a></td>
						@endif
					</tr>
					@endforeach
        </table>
					<div class="pull-right clearfix box-footer">
						{!! $data->render() !!}
					</div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
