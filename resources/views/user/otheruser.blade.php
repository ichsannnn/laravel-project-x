@extends('app')

@section('content')
<title>{{ $data->name }} | PMSystem</title>
<section class="content-header">
  <h1>
    {{$data->username}}'s Profile
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-4">

      <div class="box box-widget widget-user">
        <div class="widget-user-header bg-black" style="background: url('{{url('images/'.$data->header)}}') center center;">
          <h3 class="widget-user-username">{{$data->username}}</h3>
          <h5 class="widget-user-desc">{{$data->role}}</h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="{{url('images/'.$data->foto)}}" alt="User Avatar">
        </div>
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-12">
              <div class="description-block">
                @if ($data->notes == null)
                  <span class="description-text"><q> {{ Inspiring::quote() }} </q></span>
                @else
                  <span class="description-text"><q> {{ $data->notes }} </q></span>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="box box-success">
        <div class="box-header with-border">
          <i class="fa fa-info-circle margin-r-5"></i>
          <h3 class="box-title">Information</h3>
        </div>
        <div class="box-body">

          <strong><i class="fa fa-user margin-r-5"></i> Username</strong>
          <p class="text-muted">{{$data->username}}</p>
          <hr>
          <strong><i class="fa fa-envelope margin-r-5"></i> E-Mail</strong>
          <p class="text-muted">{{$data->email}}</p>
          <hr>
          @if($data->gender == "Male")
          <strong><i class="fa fa-male margin-r-5"></i> Gender</strong>
          @elseif($data->gender == "Female")
          <strong><i class="fa fa-female margin-r-5"></i> Gender</strong>
          @else
          <strong><i class="fa fa-genderless margin-r-5"></i> Gender</strong>
          @endif
          <p class="text-muted">{{$data->gender}}</p>
          <hr>
          <strong><i class="fa fa-heart margin-r-5"></i> Relationship</strong>
          <p class="text-muted">{{$data->relationship}}</p>
          <hr>
          <strong><i class="fa fa-file-text margin-r-5"></i> Notes</strong>
          <p>{{$data->notes}}</p>

        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          {{-- <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li> --}}
          <li class="active"><a href="#timeline" data-toggle="tab">About</a></li>
        </ul>
        <div class="tab-content">
          {{-- <div class="active danger tab-pane" id="activity">
            <div class="post">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                <span class='username'>
                  <a href="#">Jonathan Burke Jr.</a>
                  <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                </span>
                <span class='description'>Shared publicly - 7:30 PM today</span>
              </div>
              <p>
                Lorem ipsum represents a long-held tradition for designers,
                typographers and the like. Some people hate it and argue for
                its demise, but others ignore the hate as they create awesome
                tools to help create filler text for everyone from bacon lovers
                to Charlie Sheen fans.
              </p>
              <ul class="list-inline">
                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li>
              </ul>

              <input class="form-control input-sm" type="text" placeholder="Type a comment">
            </div>

            <div class="post clearfix">
              <div class='user-block'>
                <img class='img-circle img-bordered-sm' src='../../dist/img/user7-128x128.jpg' alt='user image'>
                <span class='username'>
                  <a href="#">Sarah Ross</a>
                  <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                </span>
                <span class='description'>Sent you a message - 3 days ago</span>
              </div>
              <p>
                Lorem ipsum represents a long-held tradition for designers,
                typographers and the like. Some people hate it and argue for
                its demise, but others ignore the hate as they create awesome
                tools to help create filler text for everyone from bacon lovers
                to Charlie Sheen fans.
              </p>

              <form class='form-horizontal'>
                <div class='form-group margin-bottom-none'>
                  <div class='col-sm-9'>
                    <input class="form-control input-sm" placeholder="Response">
                  </div>
                  <div class='col-sm-3'>
                    <button class='btn btn-danger pull-right btn-block btn-sm'>Send</button>
                  </div>
                </div>
              </form>
            </div>

            <div class="post">
              <div class='user-block'>
                <img class='img-circle img-bordered-sm' src='../../dist/img/user6-128x128.jpg' alt='user image'>
                <span class='username'>
                  <a href="#">Adam Jones</a>
                  <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                </span>
                <span class='description'>Posted 5 photos - 5 days ago</span>
              </div>
              <div class='row margin-bottom'>
                <div class='col-sm-6'>
                  <img class='img-responsive' src='../../dist/img/photo1.png' alt='Photo'>
                </div>
                <div class='col-sm-6'>
                  <div class='row'>
                    <div class='col-sm-6'>
                      <img class='img-responsive' src='../../dist/img/photo2.png' alt='Photo'>
                      <br>
                      <img class='img-responsive' src='../../dist/img/photo3.jpg' alt='Photo'>
                    </div>
                    <div class='col-sm-6'>
                      <img class='img-responsive' src='../../dist/img/photo4.jpg' alt='Photo'>
                      <br>
                      <img class='img-responsive' src='../../dist/img/photo1.png' alt='Photo'>
                    </div>
                  </div>
                </div>
              </div>

              <ul class="list-inline">
                <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
                <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li>
              </ul>

              <input class="form-control input-sm" type="text" placeholder="Type a comment">
            </div>
          </div> --}}
          <div class="tab-pane active" id="timeline">
              <div class="box-body">
                <div class="col-md-30">
                  <div class="box box-success  box-solid">
                    <div class="box-header with-border">
                      <i class="fa fa-user margin-r-5"></i>
                      <h3 class="box-title"><strong>Name</strong></h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"></button>
                      </div>
                    </div>
                    <div class="box-body">
                      @if($data->name == "")
                        -- Not Set --
                      @else
                        {{ $data->name }}
                      @endif
                    </div>
                  </div>
                </div>
                <hr>
                <div class="col-md-30">
                  <div class="box box-success  box-solid">
                    <div class="box-header with-border">
                      <i class="fa fa-user margin-r-5"></i>
                      <h3 class="box-title"><strong>Username</strong></h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"></button>
                      </div>
                    </div>
                    <div class="box-body">
                      @if($data->username == "")
                        -- Not Set --
                      @else
                        {{ $data->username }}
                      @endif
                    </div>
                  </div>
                </div>
                <hr>
                <div class="col-md-30">
                  <div class="box box-success  box-solid">
                    <div class="box-header with-border">
                      <i class="fa fa-envelope margin-r-5"></i>
                      <h3 class="box-title"><strong>E-Mail</strong></h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"></button>
                      </div>
                    </div>
                    <div class="box-body">
                      @if($data->email == "")
                        -- Not Set --
                      @else
                        {{ $data->email }}
                      @endif
                    </div>
                  </div>
                </div>
                <hr>
                <div class="col-md-30">
                  <div class="box box-success  box-solid">
                    <div class="box-header with-border">
                      <i class="fa fa-phone margin-r-5"></i>
                      <h3 class="box-title"><strong>Phone</strong></h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"></button>
                      </div>
                    </div>
                    <div class="box-body">
                      @if($data->phone == "0")
                        -- Not Set --
                      @else
                        {{ $data->phone }}
                      @endif
                    </div>
                  </div>
                </div>
                <hr>
                <div class="col-md-30">
                  <div class="box box-success  box-solid">
                    <div class="box-header with-border">
                      <i class="fa fa-birthday-cake margin-r-5"></i>
                      <h3 class="box-title"><strong>Birthday</strong></h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"></button>
                      </div>
                    </div>
                    <div class="box-body">
                      @if($data->borndate == "0000-00-00")
                        -- Not Set --
                      @else
                        {{ $data->borndate }}
                      @endif
                    </div>
                  </div>
                </div>
                <hr>
                <div class="col-md-30">
                  <div class="box box-success  box-solid">
                    <div class="box-header with-border">
                      <i class="fa fa-map-marker margin-r-5"></i>
                      <h3 class="box-title"><strong>Address</strong></h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"></button>
                      </div>
                    </div>
                    <div class="box-body">
                      @if($data->address == "")
                        -- Not Set --
                      @else
                        {{ $data->address }}
                      @endif
                    </div>
                  </div>
                </div>
                <hr>
                <div class="col-md-30">
                  <div class="box box-success  box-solid">
                    <div class="box-header with-border">
                      <i class="fa fa-heart margin-r-5"></i>
                      <h3 class="box-title"><strong>Relationship</strong></h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"></button>
                      </div>
                    </div>
                    <div class="box-body">
                      @if($data->relationship == "")
                        -- Not Set --
                      @else
                        {{ $data->relationship }}
                      @endif
                    </div>
                  </div>
                </div>
                <hr>
                <div class="col-md-30">
                  <div class="box box-success  box-solid">
                    <div class="box-header with-border">
                      <i class="fa fa-user-secret margin-r-5"></i>
                      <h3 class="box-title"><strong>Job</strong></h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"></button>
                      </div>
                    </div>
                    <div class="box-body">
                      @if($data->role == "")
                        -- Not Set --
                      @else
                        {{ $data->role }}
                      @endif
                    </div>
                  </div>
                </div>
                <hr>
                <div class="col-md-30">
                  <div class="box box-success  box-solid">
                    <div class="box-header with-border">
                      <i class="fa fa-building margin-r-5"></i>
                      <h3 class="box-title"><strong>Workplace</strong></h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"></button>
                      </div>
                    </div>
                    <div class="box-body">
                      @if($data->workplace == "")
                        -- Not Set --
                      @else
                        {{ $data->workplace }}
                      @endif
                    </div>
                  </div>
                </div>
                <hr>
                <div class="col-md-30">
                  <div class="box box-success  box-solid">
                    <div class="box-header with-border">
                      <i class="fa fa-file-text margin-r-5"></i>
                      <h3 class="box-title"><strong>Notes</strong></h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"></button>
                      </div>
                    </div>
                    <div class="box-body">
                      @if($data->notes == "")
                        -- Not Set --
                      @else
                        {{ $data->notes }}
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>


        </div>
      </div>
    </div>
  </div>
</section>
@endsection
