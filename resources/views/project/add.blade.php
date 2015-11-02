@extends('app')

@section('content')
<title>New Project | PMSystem</title>
<section class="content-header">
	<h1>
		New Project
		<small>Control panel</small>
	</h1>
</section>


<section class="content">
  <div class="box box-success">
      <form role="form" method="post" action="{{url('project/save')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">
            <label for="inputName">Project Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="Project Name" name="name" required>
          </div>
					<div class="form-group">
            <label for="inputAddress">Head Developer</label>
            <select class="form-control select2" style="width: 100%;" name="head">
              <option selected disabled>Select option..</option>
							@foreach ($head as $head)
							<option value="{{ $head->name }}">{{ $head->name }}</option>
							@endforeach
            </select>
          </div>
					<div class="form-group">
            <label for="inputAddress">Developer</label>
            <select class="form-control select2" multiple="multiple" data-placeholder="Select Developer" style="width: 100%;" name="developer[]">
							@foreach ($developer as $developer)
							<option value="{{ $developer->name }}">{{ $developer->name }}</option>
							@endforeach
            </select>
          </div>
					<div class="form-group">
            <label for="inputBornat">Client</label>
            <input type="text" id="inputBornat" class="form-control" placeholder="Client" name="client" required>
          </div>
          <div class="form-group">
            <label for="inputNotes">Description</label>
            <textarea class="form-control" id="inputNotes" placeholder="Description" name="description"></textarea>
          </div>
					<div class="form-group">
            <label for="inputEmail">Budget</label>
            <input type="text" class="form-control" id="inputEmail" placeholder="Budget" name="budget" required>
          </div>
					@if(Auth::user()->role == "Administrator")
					<div class="form-group">
            <label for="inputRole">Status</label>
            <select class="form-control select2" style="width: 100%;" name="status" required>
							<option selected="selected">Select Option..</option>
              <option>Complete</option>
              <option>Deadline</option>
							<option>Active</option>
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
