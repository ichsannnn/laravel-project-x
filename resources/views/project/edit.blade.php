@extends('app')

@section('content')
<section class="content-header">
	<h1>
		Edit Project
		<small>Control panel</small>
	</h1>
</section>
@foreach($data as $data)@endforeach
<section class="content">
  <div class="box box-success">
      <form role="form" method="post" action="{{url('project/update/'.$data->id)}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

				@if (Auth::user()->role == "Head Developer")
				<input type="hidden" name="name" value="{{$data->name}}">
				<input type="hidden" name="head" value="{{$data->head}}">
				<input type="hidden" name="client" value="{{$data->client}}">
				<input type="hidden" name="description" value="{{$data->description}}">
				<input type="hidden" name="budget" value="{{$data->budget}}">
				<input type="hidden" name="status" value="{{$data->status}}">
				@endif

        <div class="box-body">
          <div class="form-group">
            <label for="inputName">Project Name</label>
						@if (Auth::user()->role == "Head Developer")
            <input type="text" class="form-control" id="inputName" placeholder="Project Name" value="{{$data->name}}" required disabled>
						@else
						<input type="text" class="form-control" id="inputName" placeholder="Project Name" name="name" value="{{$data->name}}" required>
						@endif
          </div>
					<div class="form-group">
            <label for="inputAddress">Head Developer</label>
						@if (Auth::user()->role == "Head Developer")
            <select class="form-control select2" style="width: 100%;" disabled>
              <option selected disabled>Select option..</option>
							@foreach ($head as $head)
              <option value="{{ $head->name }}" @if($data->head === $head->name) selected @endif>{{ $head->name }}</option>
							@endforeach
            </select>
						@else
						<select class="form-control select2" style="width: 100%;" name="head">
              <option selected disabled>Select option..</option>
							@foreach ($head as $head)
              <option value="{{ $head->name }}" @if($data->head === $head->name) selected @endif>{{ $head->name }}</option>
							@endforeach
            </select>
						@endif
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
						@if (Auth::user()->role == "Head Developer")
						<select class="form-control select2" style="width: 100%;" disabled>
              <option selected disabled>Select option..</option>
							@foreach ($client as $client)
              <option value="{{ $client->client }}" @if($data->client === $client->client) selected @endif>{{ $client->client }}</option>
							@endforeach
            </select>
						@else
						<select class="form-control select2" style="width: 100%;" name="client">
							<option selected disabled>Select option..</option>
							@for ($i = 0; $i < sizeof($client); $i++)
								@if ($i > 0)
									@if($client[$i]->client == $client[$i-1]->client)

									@else
										<option value="{{ $client[$i]->client }}">{{ $client[$i]->client }}</option>
									@endif
								@else
									<option value="{{ $client[$i]->client }}">{{ $client[$i]->client }}</option>
								@endif
							@endfor
            </select>
						@endif
          </div>
          <div class="form-group">
            <label for="inputNotes">Description</label>
						@if (Auth::user()->role == "Head Developer")
            <textarea class="form-control" id="inputNotes" placeholder="Description" disabled>{{$data->description}}</textarea>
						@else
						<textarea class="form-control" id="inputNotes" placeholder="Description" name="description">{{$data->description}}</textarea>
						@endif
          </div>
					<div class="form-group">
            <label for="inputEmail">Budget</label>
						@if (Auth::user()->role == "Head Developer")
            <input type="text" class="form-control" id="inputEmail" placeholder="Budget" value="{{$data->budget}}" disabled required>
						@else
						<input type="text" class="form-control" id="inputEmail" placeholder="Budget" name="budget" value="{{$data->budget}}" required>
						@endif
          </div>
					@if(Auth::user()->role == "Administrator" || Auth::user()->role == "Project Manager")

					<script>
					$(document).ready(function(){
						$('#status').change(function(){
							if ($('#status option:selected').attr('value') == "complete") {
								$('#complete').css('display', 'block');
								$('#other').css('display', 'none');
							} else {
								$('#other').css('display', 'block');
								$('#complete').css('display', 'none');
							}
						});
					});
					</script>
					<div class="form-group">
            <label for="inputRole">Status</label>
            <select class="form-control select2" id="status" style="width: 100%;" name="status">
							<option selected="selected" disabled>Select Option..</option>
							@foreach ($status as $status)
								<option value="{{ $status }}" @if($data->status === $status) selected @endif>{{ $status }}</option>
							@endforeach
            </select>
          </div>
					@endif
					<div class="form-group" id="complete" style="display: none;">
						<label for="inputBornat">Completly</label>
						<input type="text" class="form-control" placeholder="Company Name" value="100" disabled>
						<input type="hidden" class="form-control" placeholder="Company Name" name="client" value="100">
					</div>
					<div class="form-group" id="other" style="display: none;">
						<label for="inputBornat">Completly</label>
						<select class="form-control select2" style="width: 100%;" name="client">
							<option selected disabled>Select option..</option>

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
