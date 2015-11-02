@extends('app')

@section('content')
<title>Add User | PMSystem</title>
<section class="content-header">
	<h1>
		Add User
		<small>Control panel</small>
	</h1>
</section>
@foreach($data as $data)@endforeach
<section class="content">
  <div class="box box-success">
      <form role="form" action="{{url('user/updateother/'.$data->id)}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="header" value="{{ $data->header }}">
				<input type="hidden" name="foto" value="{{ $data->foto }}">
        <div class="box-body">
          <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{ $data->name }}" required>
          </div>
          <div class="form-group">
            <label for="inputUsername">Username</label>
            <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" value="{{ $data->username }}" required>
          </div>
          <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{ $data->email }}" required>
          </div>
          <div class="form-group">
            <label for="inputPhone">Phone</label>
            <input type="text" id="inputPhone" class="form-control" data-inputmask='"mask": "9999-9999-9999"' data-mask placeholder="Phone Number" name="phone" value="{{ $data->phone }}" required>
          </div>
          <div class="form-group">
            <label for="inputBornat">Born At</label>
            <input type="text" id="inputBornat" class="form-control" placeholder="Born At" name="bornplace" value="{{ $data->bornplace }}" required>
          </div>
          <div class="form-group">
            <label for="inputBirthday">Birthday</label>
            <input type="text" id="inputBirthday" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" value="{{ $data->borndate }}" data-mask placeholder="Birthday" name="borndate" required>
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <textarea class="form-control" id="inputAddress" placeholder="Address" name="address" required>{{ $data->address }}</textarea>
          </div>
          <div class="form-group">
            <label for="inputGender">Gender</label><br>
            @if($data->gender == "Male")
							<label>
								<input type="radio" name="gender" class="flat-red" value="Male" checked> Male
							</label>
							&nbsp;
							&nbsp;
							&nbsp;
							<label>
								<input type="radio" name="gender" class="flat-red" value="Female"> Female
							</label>
						@elseif($data->gender == "Female")
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
            <select class="form-control select2" style="width: 100%;" name="relationship" required>
							@foreach($relationship as $relationship)
								<option value="{{ $relationship->relationship }}" @if($data->relationship === $relationship->relationship) selected @endif>{{ $relationship->relationship }}</option>
							@endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="inputWork">Workplace</label>
            <textarea class="form-control" id="inputWork" placeholder="Workplace" name="workplace" required>{{ $data->workplace }}</textarea>
          </div>
          <div class="form-group">
            <label for="inputNotes">Notes</label>
            <textarea class="form-control" id="inputNotes" placeholder="Notes" name="notes"> {{ $data->notes }} </textarea>
          </div>
          <div class="form-group">
            <label for="inputRole">Role</label>
            <select class="form-control select2" style="width: 100%;" name="role" required>
							@foreach($role as $role)
								<option value="{{ $role->role }}" @if($data->role === $role->role) selected @endif>{{ $role->role }}</option>
							@endforeach
            </select>
          </div>
					<div class="form-group">
            <label for="inputRole">Status</label>
            <select class="form-control select2" style="width: 100%;" name="status" required>
              @if($data->activated == "Y")
							<option value="Y" selected>Activated</option>
							<option value="N">Not Activated</option>
							@elseif($data->activated == "N")
							<option value="Y">Activated</option>
              <option value="N" selected>Not Activated</option>
              @endif
            </select>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
      </form>
  </div>
</section>
@endsection
