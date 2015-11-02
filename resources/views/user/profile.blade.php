@extends('app')

@section('content')
<title>{{ Auth::user()->name }} | PMSystem</title>
<section class="content-header">
  <h1>
    User Profile
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-4">

      <div class="box box-widget widget-user">
        <div class="widget-user-header bg-black" style="background: url('{{url('images/'.Auth::user()->header)}}') center center;">
          <h3 class="widget-user-username">{{Auth::user()->name}}</h3>
          <h5 class="widget-user-desc">{{Auth::user()->role}}</h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="{{url('images/'.Auth::user()->foto)}}" alt="User Avatar" style="max-width: 90px; max-height: 90px;">
        </div>
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-12">
              <div class="description-block">
                @if (Auth::user()->notes == null)
                  <span class="description-text"><q> {{ Inspiring::quote() }} </q></span>
                @else
                  <span class="description-text"><q> {{ Auth::user()->notes }} </q></span>
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
          <p class="text-muted">{{Auth::user()->username}}</p>
          <hr>
          <strong><i class="fa fa-envelope margin-r-5"></i> E-Mail</strong>
          <p class="text-muted">{{Auth::user()->email}}</p>
          <hr>
          @if(Auth::user()->gender == "Male")
          <strong><i class="fa fa-male margin-r-5"></i> Gender</strong>
          @elseif(Auth::user()->gender == "Female")
          <strong><i class="fa fa-female margin-r-5"></i> Gender</strong>
          @else
          <strong><i class="fa fa-genderless margin-r-5"></i> Gender</strong>
          @endif
          <p class="text-muted">{{Auth::user()->gender}}</p>
          <hr>
          <strong><i class="fa fa-heart margin-r-5"></i> Relationship</strong>
          <p class="text-muted">{{Auth::user()->relationship}}</p>
          <hr>
          <strong><i class="fa fa-file-text margin-r-5"></i> Notes</strong>
          <p>{{Auth::user()->notes}}</p>

        </div>
      </div>
    </div>
    <div class="col-md-8 pull-right">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          {{-- <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li> --}}
          <li class="active"><a href="#timeline" data-toggle="tab">About</a></li>
          <li><a href="#settings" data-toggle="tab">Settings</a></li>
          <li><a href="#password" data-toggle="tab">Password</a></li>
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
                      @if(Auth::user()->name == "")
                        -- Not Set --
                      @else
                        {{ Auth::user()->name }}
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
                      @if(Auth::user()->username == "")
                        -- Not Set --
                      @else
                        {{ Auth::user()->username }}
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
                      @if(Auth::user()->email == "")
                        -- Not Set --
                      @else
                        {{ Auth::user()->email }}
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
                      @if(Auth::user()->phone == "0")
                        -- Not Set --
                      @else
                        {{ Auth::user()->phone }}
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
                      @if(Auth::user()->borndate == "0000-00-00")
                        -- Not Set --
                      @else
                        {{ Auth::user()->borndate }}
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
                      @if(Auth::user()->address == "")
                        -- Not Set --
                      @else
                        {{ Auth::user()->address }}
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
                      @if(Auth::user()->relationship == "")
                        -- Not Set --
                      @else
                        {{ Auth::user()->relationship }}
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
                      @if(Auth::user()->role == "")
                        -- Not Set --
                      @else
                        {{ Auth::user()->role }}
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
                      @if(Auth::user()->workplace == "")
                        -- Not Set --
                      @else
                        {{ Auth::user()->workplace }}
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
                      @if(Auth::user()->notes == "")
                        -- Not Set --
                      @else
                        {{ Auth::user()->notes }}
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <div class="tab-pane" id="settings">
            <form role="form" action="{{url('user/update/'.Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="status" value="{{ Auth::user()->activated }}">
              <input type="hidden" name="role" value="{{ Auth::user()->role }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputName">Name</label>
                  <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                  <label for="inputUsername">Username</label>
                  <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" value="{{ Auth::user()->username }}">
                </div>
                <div class="form-group">
                  <label for="inputEmail">Email</label>
                  <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                  <label for="inputPhone">Phone</label>
                  <input type="text" id="inputPhone" class="form-control" data-inputmask='"mask": "9999-9999-9999"' data-mask placeholder="Phone Number" name="phone" value="{{ Auth::user()->phone }}">
                </div>
                <div class="form-group">
                  <label for="inputBornat">Born At</label>
                  <input type="text" id="inputBornat" class="form-control" placeholder="Born At" name="bornplace" value="{{ Auth::user()->bornplace }}">
                </div>
                <div class="form-group">
                  <label for="inputBirthday">Birthday</label>
                  <input type="text" id="inputBirthday" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" value="{{ Auth::user()->borndate }}" data-mask placeholder="Birthday" name="borndate">
                </div>
                <div class="form-group">
                  <label for="inputAddress">Address</label>
                  <textarea class="form-control" id="inputAddress" placeholder="Address" name="address">{{ Auth::user()->address }}</textarea>
                </div>
                <div class="form-group">
                  <label for="inputGender">Gender</label><br>
                  @if(Auth::user()->gender == "Male")
      							<label>
      								<input type="radio" name="gender" class="flat-red" value="Male" checked> Male
      							</label>
      							&nbsp;
      							&nbsp;
      							&nbsp;
      							<label>
      								<input type="radio" name="gender" class="flat-red" value="Female"> Female
      							</label>
      						@elseif(Auth::user()->gender == "Female")
      							<label>
      								<input type="radio" name="gender" class="flat-red" value="Male"> Male
      							</label>
      							&nbsp;
      							&nbsp;
      							&nbsp;
      							<label>
      								<input type="radio" name="gender" class="flat-red" value="Female" checked> Female
      							</label>
                  @endif
                </div>
                <div class="form-group">
                  <label for="inputAddress">Relationship</label>
                  <select class="form-control select2" style="width: 100%;" name="relationship">
      							@foreach($relationship as $relationship)
      								<option value="{{ $relationship->relationship }}" @if(Auth::user()->relationship === $relationship->relationship) selected @endif>{{ $relationship->relationship }}</option>
      							@endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputWork">Workplace</label>
                  <textarea class="form-control" id="inputWork" placeholder="Workplace" name="workplace">{{ Auth::user()->workplace }}</textarea>
                </div>
                <div class="form-group">
                  <label for="inputNotes">Notes</label>
                  <textarea class="form-control" id="inputNotes" placeholder="Notes" name="notes">{{ Auth::user()->notes }}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Profile Picture</label><br>
                  <img class="margin" src="{{url('images/'.Auth::user()->foto)}}" alt="Profile Picture" style="max-width: 200px;"><br>
                  <input type="file" name="foto" value="{{Auth::user()->foto}}" accept="image/*">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Header Picture</label><br>
                  <img class="margin" src="{{url('images/'.Auth::user()->header)}}" alt="Header Image" style="max-width: 200px;"><br>
                  <input type="file" name="header" value="{{Auth::user()->header}}" accept="image/*">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
              </div>
            </form>
          </div>
          <div class="tab-pane" id="password">
            <form role="form" action="{{url('user/password/'.Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="inputOld">Old Password</label>
                <input type="password" id="inputOld" class="form-control" placeholder="Old Password" name="old">
              </div>
              <div class="form-group">
                <label for="inputNew">New Password</label>
                <input type="password" id="inputNew" class="form-control" placeholder="New Password" name="password">
              </div>
              <div class="form-group">
                <label for="inputConfirm">Confirm Password</label>
                <input type="password" id="inputConfirm" class="form-control" placeholder="Confirmation Password" name="confirm">
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
