@extends('app')

@section('content')
<title>Project Tables | PMSystem</title>
<section class="content-header">
	<h1>
		Project Tables
		<small>Control panel</small>
	</h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
  		<div class="small-box bg-yellow">
  			<div class="inner">
					<h3>{{ \App\Project::where('status','!=','N')->count() }}</h3>
  				<p>All Projects</p>
  			</div>
  			<div class="icon">
  				<i class="fa fa-file-code-o"></i>
  			</div>
  			@if(Auth::user()->role == "Administrator" || Auth::user()->role == "Project Manager")
  				<a href="{{url('project/add')}}" class="small-box-footer">
  					<i class="fa fa-plus"></i> Add More Project
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
  				<h3>{{ \App\Project::where('status','=','complete')->count() }}</h3>
  				<p>Competed Project</p>
  			</div>
  			<div class="icon">
  				<i class="fa fa-check"></i>
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
  				<h3>{{ \App\Project::where('status','=','deadline')->count() }}</h3>
  				<p>Deadlined Project</p>
  			</div>
  			<div class="icon">
  				<i class="fa fa-close"></i>
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
  		<div class="small-box bg-aqua">
  			<div class="inner">
  				<h3>{{ \App\Project::where('status','=','active')->count() }}</h3>
  				<p>Active Project</p>
  			</div>
  			<div class="icon">
  				<i class="fa fa-code"></i>
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
		<div class="col-xs-12">
	    <div class="box">
	      <div class="box-header">
						<h3 class="box-title"><span class="fa fa-files-o"></span> Projects Table</h3>
	      </div>
	      <div class="box-body table-responsive no-padding">
	        <table class="table table-hover table-bordered">
	          <tr>
	            <th style="width: 10px; text-align: center;">No</th>
	            <th style="text-align: center;">Name</th>
	            <th style="text-align: center;">Head Developer</th>
	            <th style="text-align: center;">Client</th>
	            <th style="width: 300px; text-align: center;">Status</th>
							@if(Auth::user()->role == "Administrator" || Auth::user()->role == "Project Manager")
							<th style="text-align: center;">Action</th>
							@endif
	          </tr>
						<?php $no = 1; ?>
						@foreach ($data as $project)
						<tr>
						  <td>{{ $no++ }}</td>
						  <td>{{ $project->name  }}</td>
						  <td style="text-align: center;"><a href="{{url('user/'.$project->id)}}">{{ $project->head }}</a></td>
						  <td>{{ $project->client }}</td>
						  @if($project->status == "Active")
						  <td style="text-align: center;"><span class="badge bg-aqua">{{ $project->status }}</span></td>
						  @elseif($project->status == "Deadline")
						  <td style="text-align: center;"><span class="badge bg-red">{{ $project->status }}</span></td>
						  @elseif($project->status == "Complete")
						  <td style="text-align: center;"><span class="badge bg-green">{{ $project->status }}</span></td>
						  @elseif($project->status == "N")
						  <td style="text-align: center;"><span class="badge bg-yellow">Not Active</span></td>
						  @endif
						  @if (Auth::user()->role == "Administrator")
						  <td style="text-align: center;">
						    <a href="{{ url('project/edit/'.$project->id) }}" class="btn btn-flat btn-success"><i class="fa fa-pencil-square-o"></i> Edit</a>
						    <a href="{{ url('project/delete/'.$project->id) }}" class="btn btn-flat btn-danger"><i class="fa fa-close"></i> Delete</a>
						  </td>
						  @elseif (Auth::user()->role == "Project Manager")
						  <td style="text-align: center;">
						    <a href="{{ url('project/edit/'.$project->id) }}" class="btn btn-flat btn-success"><i class="fa fa-pencil-square-o"></i> Edit</a>
						    <a href="{{ url('project/delete/'.$project->id) }}" class="btn btn-flat btn-danger"><i class="fa fa-close"></i> Delete</a>
						  </td>
						  @elseif(Auth::user()->role == "Head Developer")
						  <td style="text-align: center;">
						    <a href="{{ url('project/edit/'.$project->id) }}" class="btn btn-flat btn-success"><i class="fa fa-pencil-square-o"></i> Edit</a>
						  </td>
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
