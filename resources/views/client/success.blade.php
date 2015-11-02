@extends('client.index')
@section('client')
<section class="content-header">
  <h1>
    Success
    <small>Project Add</small>
  </h1>
</section>
<section class="conten">
  <div class="row">
    <div class="modal-dialog modal-info">
      <div class="modal-content">
        <div class="modal-body">
          <h4 class="modal-title"><span class="fa fa-check"></span> Submitted</h4>
        </div>
      </div>
    </div>
    <script>
      setTimeout("location.href = '{{url('/')}}';",1500);
    </script>
  </div>
</section>
@endsection
