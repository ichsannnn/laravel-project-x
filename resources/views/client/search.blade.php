@extends('client.index')

@section('client')
<section class="content-header">
	<h1>
		Projects
		<small>Control panel</small>
    <div class="input-group input-group-sm pull-right col-xs-3">
      @if (count($project)===0)

      @else
      <form action="{{url('client/searchProject')}}" method="get" role="search" class="search-form">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Search Project.." name="search">
          <span class="input-group-btn">
            <button class="btn btn-info btn-flat" type="submit"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
      @endif
    </div>
	</h1>
</section>
<section class="content">
<div class="row">
  @if (count($project)===0)
  <div class="error-page">
    <h2 class="headline text-yellow"> 404</h2>
    <div class="error-content">
      <h3><i class="fa fa-warning text-yellow"></i> Oops! Project not found.</h3>
      <p>
        We could not find the project you were looking for.
        Meanwhile, you may <a href="{{url('client/project')}}">return to dashboard</a> or try using the search form.
      </p>
      <form action="{{url('client/searchProject')}}" method="get" role="search" class="search-form">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Search Project.." name="search">
          <span class="input-group-btn">
            <button class="btn btn-info btn-flat" type="submit"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
    </div><!-- /.error-content -->
  </div><!-- /.error-page -->
  @else
  <div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="fa fa-file-code-o"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">All Project</span>
				<span class="info-box-number">{{ \App\Project::count() }}</span>
			</div>
		</div>
	</div>
  <div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-teal"><i class="fa fa-code"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Active Project</span>
				<span class="info-box-number">{{ \App\Project::where('status','=','active')->count() }}</span>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Completed PJ</span>
				<span class="info-box-number">{{ \App\Project::where('status','=','complete')->count() }}</span>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-red"><i class="fa fa-close"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Deadlined PJ</span>
				<span class="info-box-number">{{ \App\Project::where('status','=','deadline')->count() }}</span>
			</div>
		</div>
	</div>
  	@foreach ($project as $project)
  	<div class="col-lg-4">
      <div class="box box-info">
          <div class="box-header">
  					<div class="box-title">
              {{$project->name}}
  					</div>
          </div>
          <div class="box-body">
              <div class="team-members">
                  <a href="{{url('user/'.$project->userid)}}">{{ $project->head }}</a>
              </div>
              <h4>Info about {{$project->name}}</h4>
              <p>
                  {{ substr($project->description, 0, 255) }}...
              </p>
              <div>
                  <h4>Status of this project:</h4>
                  <div class="stat-percent"><h5>{{$project->complete}}%</h5></div>
                  @if ($project->status == "Active")
                    <div class="progress progress-sm active">
    									<div class="progress-bar progress-bar-active progress-bar-striped" role="progressbar" aria-valuenow="{{$project->complete}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project->complete}}%"></div>
                    </div>
                  @elseif($project->status == "Complete")
                    <div class="progress progress-sm">
                      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{$project->complete}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project->complete}}%"></div>
                    </div>
                  @elseif($project->status == "Deadline")
                    <div class="progress progress-sm active">
                      <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="{{$project->complete}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project->complete}}%"></div>
                    </div>
                  @endif
              </div>
              <div class="row m-t-sm">
                  <div class="col-sm-12 text-center">
                      <div class="font-bold">BUDGET</div>
                      Rp. {{$project->budget}} <i class="fa fa-level-up text-navy"></i>
                  </div>
              </div>
          </div>
      </div>
    </div>
  	@endforeach
  @endif
</div>
</section>

@endsection
