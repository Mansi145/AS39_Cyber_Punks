@extends('layouts.dashboard')
@section('css')
<link href="{{ url('css/addons/datatables.min.css') }}" rel="stylesheet">
<style type="text/css">
  #table_wrapper {
    overflow: auto!important;
  }
</style>
@endsection
@section('content')
<div class="card">
    <div class="card-header text-center">
          <a href="/tncs/all" class="btn btn-success">All<br>{{ $tnc_ua }}</a>
          <a href="/tncs/archived" class="btn btn-warning">Archived<br>{{ $tnc_a }}</a>
    </div>
    <div class="card-body">
        <p class="h1 text-center">{{ ucfirst($type) }} T&Cs @if($type == 'all')<a href="{{ url('tnc/create') }}" class="btn blue-gradient btn-rounded waves-effect waves-light"><i class="fas fa-plus"></i>Create T&C</a>@endif</p>
        <table class="table table-bordered" id="table">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Title</th>
                 <th>Created</th>
                 <th>Last Edit</th>
                 <th>Owner</th>
                 <th>Action</th>
             </tr>
         </thead>
     </table>
 </div>
</div>
@endsection
@section('script')
<script src="{{ url('js/addons/datatables.min.js') }}"></script>
<script>
 $(function() {
   $('#table').DataTable({
       processing: true,
       serverSide: true,
       ajax: '{{ url('list_'.$type.'_tnc_data') }}',
       columns: [
       { data: 'id', name: 'id' },
       { data: 'title', name: 'title' },
       { data: 'created_at', name: 'created_at' },
       { data: 'last_edit', name: 'last_edit' },
       { data: 'owner', name: 'owner' },
       { data: 'action', name: 'action' }
       ]
   });
});
</script>

@endsection