@extends('client.index')

@section('client')
<section class="content-header">
	<h1>
		Projects |
		<small>Latest Projects</small>
    <a href="{{url('client/project')}}" class="pull-right btn btn-primary btn-flat"><span class="fa fa-arrow-circle-right"></span> More Projects</a>
	</h1>
</section>
<section class="content">
<div class="row">
  @foreach ($project as $project)
  <div class="col-lg-4">
    <div class="box box-info">
        <div class="box-header">
					<div class="box-title">
            <span style="font-size: 25px;"><i class="fa fa-folder-open"></i> {{$project->name}}</span>
					</div>
        </div>
        <div class="box-body">
            <span style="font-size: 18px;">Developed by :</span>
            <div class="team-members">
                <a href="{{url('user/'.$project->userid)}}">{{ $project->head }}</a>
            </div>
            <span style="font-size: 18px;">Info about {{$project->name}} :</span>
            <p>
                {{ substr($project->description, 0, 255) }}...
            </p>
            <div>
                <span style="font-size: 18px;">Status of this project : </span>
                <span class="stat-percent" style="font-size: 18px;"> {{$project->complete}}%</span>
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
</div>
</section>

<section class="content-header">
	<h1>
		Users |
		<small>Latest Users</small>
    <a href="{{url('client/user')}}" class="pull-right btn btn-primary btn-flat"><span class="fa fa-arrow-circle-right"></span> More Users</a>
	</h1>
</section>
<section class="content">
<div class="row">
  @foreach ($user as $user)
  <div class="col-md-4">
    <div class="box box-widget widget-user">
      <div class="widget-user-header bg-black" style="background: url({{url('images/'.$user->header)}}) center center;">
        <h3 class="widget-user-username">{{$user->name}}</h3>
        <h5 class="widget-user-desc">{{$user->role}}</h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="{{url('images/'.$user->foto)}}" alt="User Avatar" style="max-width: 90px; max-height: 90px;">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-12">
            <div class="description-block">
              @if ($user->notes == null)
                <span class="description-text"><q> {{ Inspiring::quote() }} </q></span>
              @else
                <span class="description-text"><q> {{ $user->notes }} </q></span>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</section>
@endsection
