@extends('client.index')
@section('client')
<section class="content-header">
	<h1>
		Project |
		<small>Create Project</small>
	</h1>
</section>
<section class="content">
  <div class="row">
    <div class="box box-info">
      <div class="box-header with-border">
        <div class="box-title">
          <span style="font-size: 25px;" class="fa fa-plus-circle"></span>
          <span style="font-size: 25px;"> Create New Project</span>
        </div>
      </div>
      <div class="box-content">
        <form role="form" method="post" action="{{url('client/saveproject')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="box-body">
            <div class="form-group">
              <label for="inputName">Project Name</label>
              <input type="text" class="form-control" id="inputName" placeholder="Project Name" name="name" required>
            </div>
						<div class="form-group">
              <label for="inputBornat">Company</label>
							<select class="form-control select2" id="company" style="width: 100%;" name="company">
				      	<option selected disabled>Select Option..</option>
				      	<option value="new">New Company</option>
				      	<option value="old">Exist Company</option>
				      </select>
            </div>
  					<div class="form-group" id="new" style="display: none;">
              <label for="inputBornat">Company Name</label>
              <input type="text" class="form-control" placeholder="Company Name" name="client">
            </div>
						<div class="form-group" id="old" style="display: none;">
							<label for="inputBornat">Existing Company</label>
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
						</div>

            <div class="form-group">
              <label for="inputNotes">Description</label>
              <textarea class="form-control" id="inputNotes" placeholder="Description" name="description"></textarea>
            </div>
  					<div class="form-group">
              <label for="inputEmail">Budget</label>
              <div class="input-group">
                <span class="input-group-addon">Rp.</span>
                <input class="form-control" type="text" name="budget">
                <span class="input-group-addon">,00</span>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
          </div>
        </form>
      </div>
    </div>
		<script>
			$(document).ready(function(){
				$('#company').change(function(){
					if ($('#company option:selected').attr('value') == "new") {
						$('#new').css('display', 'block');
						$('#old').css('display', 'none');
					} else if ($('#company option:selected').attr('value') == "old") {
						$('#old').css('display', 'block');
						$('#new').css('display', 'none');
					}
				});
			});
		</script>
  </div>
</section>
@endsection
