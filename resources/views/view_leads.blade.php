
@extends('main')

@section('content')

<div class="container">
    
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tracker Date</th>
                <th>Company Name</th>
                <th>Work Done By</th>
                <th>Campaign Name</th>
                <th>POC Links</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
   
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('view_leads') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'date', name: 'date'},
            {data: 'first_name', name: 'last_name'},
            {data: 'contact_no', name: 'contact_no'},
            {data: 'email_id', name: 'email_id'},
            {data: 'comp_name', name: 'comp_name'},
            {data: 'designation', name: 'designation'},
            {data: 'agent_name', name: 'agent_name'},
        ]
    });
    
  });
</script>

@endsection