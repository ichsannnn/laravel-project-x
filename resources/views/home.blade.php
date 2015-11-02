@extends('app')

@section('content')
<title>Projects | PMSystem</title>
<section class="content-header">
	<h1>
		Projects
		<small>Control panel</small>
	</h1>
</section>

<section class="content">
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="fa fa-file-code-o"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">All Project</span>
				<span class="info-box-number">13,648</span>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Completed Project</span>
				<span class="info-box-number">13,648</span>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-red"><i class="fa fa-close"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Deadlined Project</span>
				<span class="info-box-number">13,648</span>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-teal"><i class="fa fa-code"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Active Project</span>
				<span class="info-box-number">13,648</span>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
    <div class="box">
        <div class="box-header">
					<div class="box-title">
            <h5>IT-01 - Design Team</h5>
					</div>
        </div>
        <div class="box-body">
            <div class="team-members">
                <a href="#"><img alt="member" class="img-circle" src="{{url('images/'.Auth::user()->foto)}}" style="max-width: 42px;"></a>
                <a href="#"><img alt="member" class="img-circle" src="img/a2.jpg"></a>
                <a href="#"><img alt="member" class="img-circle" src="img/a3.jpg"></a>
                <a href="#"><img alt="member" class="img-circle" src="img/a5.jpg"></a>
                <a href="#"><img alt="member" class="img-circle" src="img/a6.jpg"></a>
            </div>
            <h4>Info about Design Team</h4>
            <p>
                It is a long established fact that a reader will be distracted by the readable content
                of a page when looking at its layout. The point of using Lorem Ipsum is that it has.
            </p>
            <div>
                <span>Status of current project:</span>
                <div class="stat-percent">48%</div>
                <div class="progress progress-mini">
                    <div style="width: 48%;" class="progress-bar"></div>
                </div>
            </div>
            <div class="row  m-t-sm">
                <div class="col-sm-4">
                    <div class="font-bold">PROJECTS</div>
                    12
                </div>
                <div class="col-sm-4">
                    <div class="font-bold">RANKING</div>
                    4th
                </div>
                <div class="col-sm-4 text-right">
                    <div class="font-bold">BUDGET</div>
                    $200,913 <i class="fa fa-level-up text-navy"></i>
                </div>
            </div>
        </div>
    </div>
  </div>
	<div class="col-lg-4">
    <div class="box">
        <div class="box-header">
					<div class="box-title">
            <h5>IT-01 - Design Team</h5>
					</div>
        </div>
        <div class="box-body">
            <div class="team-members">
                <a href="#"><img alt="member" class="img-circle" src="{{url('images/'.Auth::user()->foto)}}" style="max-width: 42px;"></a>
                <a href="#"><img alt="member" class="img-circle" src="img/a2.jpg"></a>
                <a href="#"><img alt="member" class="img-circle" src="img/a3.jpg"></a>
                <a href="#"><img alt="member" class="img-circle" src="img/a5.jpg"></a>
                <a href="#"><img alt="member" class="img-circle" src="img/a6.jpg"></a>
            </div>
            <h4>Info about Design Team</h4>
            <p>
                It is a long established fact that a reader will be distracted by the readable content
                of a page when looking at its layout. The point of using Lorem Ipsum is that it has.
            </p>
            <div>
                <span>Status of current project:</span>
                <div class="stat-percent">48%</div>
                <div class="progress progress-mini">
                    <div style="width: 48%;" class="progress-bar"></div>
                </div>
            </div>
            <div class="row  m-t-sm">
                <div class="col-sm-4">
                    <div class="font-bold">PROJECTS</div>
                    12
                </div>
                <div class="col-sm-4">
                    <div class="font-bold">RANKING</div>
                    4th
                </div>
                <div class="col-sm-4 text-right">
                    <div class="font-bold">BUDGET</div>
                    $200,913 <i class="fa fa-level-up text-navy"></i>
                </div>
            </div>
        </div>
    </div>
  </div>
	<div class="col-lg-4">
    <div class="box">
        <div class="box-header">
					<div class="box-title">
            <h5>IT-01 - Design Team</h5>
					</div>
        </div>
        <div class="box-body">
            <div class="team-members">
                <a href="#"><img alt="member" class="img-circle" src="{{url('images/'.Auth::user()->foto)}}" style="max-width: 42px;"></a>
                <a href="#"><img alt="member" class="img-circle" src="img/a2.jpg"></a>
                <a href="#"><img alt="member" class="img-circle" src="img/a3.jpg"></a>
                <a href="#"><img alt="member" class="img-circle" src="img/a5.jpg"></a>
                <a href="#"><img alt="member" class="img-circle" src="img/a6.jpg"></a>
            </div>
            <h4>Info about Design Team</h4>
            <p>
                It is a long established fact that a reader will be distracted by the readable content
                of a page when looking at its layout. The point of using Lorem Ipsum is that it has.
            </p>
            <div>
                <span>Status of current project:</span>
                <div class="stat-percent">48%</div>
                <div class="progress progress-mini">
                    <div style="width: 48%;" class="progress-bar"></div>
                </div>
            </div>
            <div class="row  m-t-sm">
                <div class="col-sm-4">
                    <div class="font-bold">PROJECTS</div>
                    12
                </div>
                <div class="col-sm-4">
                    <div class="font-bold">RANKING</div>
                    4th
                </div>
                <div class="col-sm-4 text-right">
                    <div class="font-bold">BUDGET</div>
                    $200,913 <i class="fa fa-level-up text-navy"></i>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Projects Data</h3>
        <div class="box-tools">
          <div class="input-group" style="width: 150px;">
            <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
            <div class="input-group-btn">
              <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>ID</th>
            <th>User</th>
            <th>Date</th>
            <th>Status</th>
            <th>Reason</th>
          </tr>
					{{-- @foreach($data as $user)
					<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $post->judul }}</td>
								<td>{{ $post->tag }}</td>
								<td><a href="{{ url('artikel/edit/'.$post->id) }}">Edit</a></td>
								<td><a href="{{ url('artikel/delete/'.$post->id) }}" onclick="return confirm('Yakin Hapus ?')">Delete</a></td>
					</tr>
					@endforeach --}}
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>
</section>

@endsection
