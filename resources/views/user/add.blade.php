@extends('app')

@section('content')
<title>Add User | PMSystem</title>
<section class="content-header">
	<h1>
		Add User
		<small>Control panel</small>
	</h1>
</section>


<section class="content">
  <div class="box box-success">
      <form role="form" method="post" action="{{url('user/save')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" required>
          </div>
          <div class="form-group">
            <label for="inputUsername">Username</label>
            <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" required>
          </div>
          <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
          </div>
          <div class="form-group">
            <script language="javascript" type="text/javascript">
            function randomString() {
            	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            	var string_length = 10;
            	var randomstring = '';
            	for (var i=0; i<string_length; i++) {
            		var rnum = Math.floor(Math.random() * chars.length);
            		randomstring += chars.substring(rnum,rnum+1);
            	}
            	document.getElementById('inputPassword').value = randomstring;
							document.getElementById('inputPasswordSend').value = randomstring;
            }
            </script>
            <label for="inputPassword">Password</label>
            <p><input type="text" class="form-control" disabled id="inputPassword" placeholder="Password" name="password" required></p>
						<p><input type="hidden" class="form-control" id="inputPasswordSend"name="passwordsend" required></p>
            <p><input type="button" class="btn btn-flat btn-warning" value="Generate Password" onClick="randomString();"></p>
          </div>
          <div class="form-group">
            <label for="inputPhone">Phone</label>
            <input type="text" id="inputPhone" class="form-control" data-inputmask='"mask": "9999-9999-9999"' data-mask placeholder="Phone Number" name="phone" required>
          </div>
          <div class="form-group">
            <label for="inputBornat">Born At</label>
            <input type="text" id="inputBornat" class="form-control" placeholder="Born At" name="bornplace" required>
          </div>
          <div class="form-group">
            <label for="inputBirthday">Birthday</label>
            <input type="text" id="inputBirthday" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="Birthday" name="borndate" required>
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <textarea class="form-control" id="inputAddress" placeholder="Address" name="address" required></textarea>
          </div>
          <div class="form-group">
            <label for="inputGender">Gender</label><br>
            <label>
              <input type="radio" name="gender" class="flat-red" value="Male" checked> Male
            </label>
            &nbsp;
            &nbsp;
            &nbsp;
            <label>
              <input type="radio" name="gender" class="flat-red" value="Female"> Female
            </label>
          </div>
          <div class="form-group">
            <label for="inputAddress">Relationship</label>
            <select class="form-control select2" style="width: 100%;" name="relationship">
              <option selected="selected">Single</option>
              <option>In a Relationship</option>
              <option>Married</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputWork">Workplace</label>
            <textarea class="form-control" id="inputWork" placeholder="Workplace" name="workplace" required></textarea>
          </div>
          <div class="form-group">
            <label for="inputNotes">Notes</label>
            <textarea class="form-control" id="inputNotes" placeholder="Notes" name="notes"></textarea>
          </div>
					@if(Auth::user()->role == "Administrator")
          <div class="form-group">
            <label for="inputRole">Role</label>
            <select class="form-control select2" style="width: 100%;" name="role" required>
              <option selected="selected">Administrator</option>
              <option>Project Manager</option>
              <option>Head Developer</option>
              <option>Developer</option>
              <option>Quality Control</option>
            </select>
          </div>
					<div class="form-group">
            <label for="inputRole">Status</label>
            <select class="form-control select2" style="width: 100%;" name="status" required>
              <option value="Y" selected="selected">Activated</option>
              <option value="N">Not Activated</option>
            </select>
          </div>
					@endif
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
      </form>
  </div>
</section>
@endsection
