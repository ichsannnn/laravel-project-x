@extends('client.index')

@section('client')
<section class="content-header">
	<h1>
		Users
		<small>Control panel</small>
    <div class="input-group input-group-sm pull-right col-xs-3">
      @if (count($user)===0)

      @else
      <form action="{{url('client/searchUser')}}" method="get" role="search" class="search-form">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Search User.." name="search">
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
  @if (count($user)===0)
  <div class="error-page">
    <h2 class="headline text-yellow"> 404</h2>
    <div class="error-content">
      <h3><i class="fa fa-warning text-yellow"></i> Oops! User not found.</h3>
      <p>
        We could not find the user you were looking for.
        Meanwhile, you may <a href="{{url('client/user')}}">return to dashboard</a> or try using the search form.
      </p>
      <form action="{{url('client/searchUser')}}" method="get" role="search" class="search-form">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Search Project.." name="search">
          <span class="input-group-btn">
            <button class="btn btn-info btn-flat" type="submit"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
    </div>
  </div>
  @else
  <div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">All Users</span>
				<span class="info-box-number">{{ \App\User::count() }}</span>
			</div>
		</div>
	</div>
  <div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Active Users</span>
				<span class="info-box-number">{{ \App\User::where('activated','=','Y')->count() }}</span>
			</div>
		</div>
	</div>
  <div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-red"><i class="fa fa-close"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Not Active User</span>
				<span class="info-box-number">{{ \App\User::where('activated','=','N')->count() }}</span>
			</div>
		</div>
	</div>
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
  @endif

  <div class="pull-right clearfix box-footer">
    {{-- {!! $data->render() !!} --}}
  </div>
</div>
</section>
@endsection
