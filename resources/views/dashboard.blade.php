@extends('main')

@section('content')
<style>
	.table-responsive {
		overflow-x: auto;
	}
</style>
@if($message = Session::get('success'))

<div class="alert alert-info">
{{ $message }}
</div>

@endif
<!-- <div class="row">
		<div class="col-md-12 text-center mb-5 punch-wrapper">
			@if(Auth::user()->punchin)
				<p>Login Time: {{ Auth::user()->punchout }}</p>
				<a href="{{ route('punch-out') }}" class="btn btn-danger">Punch Out</a>
			@else
            <div class="d-flex" style="justify-content: space-evenly;">
				<div>
                    <a href="{{ route('punch-in') }}" class="btn btn-warning punchin">Punchin</a>
                </div>
                <div>
                    <p id="punchin">logout Time: {{ Auth::user()->punchin }}</p>
                </div>
            </div>
			@endif
		</div>
	</div> -->
<div class="card">
	
	<div class="card-body mt-5">
		<div class="row">
			
			<div class="col-md-12">
				<div class="col-md-6 group-button">
					<a href="{{ route('add_leads') }}" class="btn btn-primary" >Add RPF Details</a>
					<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add RPF Details</button> -->
					<!-- <a href="{{ route('leadexport',Auth::User()->id) }}" class="btn btn-secondary">Export CSV</a>
					<a href="{{ route('samplecsv') }}" class="btn btn-warning" >Sample CSV File</a> -->
					<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1">Import CSV</button> -->
				</div>     
				
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-12 table-responsive">
				<table class="table table-bordered data-table nowrap">
					<thead>
						<tr>
							<th>No</th>
							<th>Date</th>
							<th>First Name</th>
							<th>Campaign Name</th>
							<th>Last Name</th>
							<th>Phone No</th>
							<th>Direct No</th>
							<th>Email ID</th>
							<th>Campany Name</th>
							<th>City</th>
							<th>Country</th>
							<th>State</th>
							<th>Zipcode</th>
							<th>Agent Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
		<div id="myModal" class="modal fade p-2" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header text-left">
						<h4 class="modal-title">Add Lead Details</h4>
					</div>
					<div class="modal-body">
						<div class="card-body">
						<form id="modal-add-tracker-form" class="needs-validation" method="POST" action="{{ url('/leaddetails') }}" novalidate="novalidate">
							@csrf <!-- add csrf field on your form -->
							
							<div class="modal-body">
									
									<input type="hidden" id="user_id" name="user_id" value="{{  Auth::User()->id }}">
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<input type="date" class="form-control valid" id="track_date" name="track_date" placeholder="date" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="camp_name" name="camp_name" placeholder="Campaign Name" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="agent_name" name="agent_name" placeholder="Agent Name" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address" required="" aria-required="true" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="salution" name="salution" placeholder="Salution" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="first_name" name="first_name" placeholder="First Name" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="last_name" name="last_name" placeholder="Last Name" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="jobtitle" name="jobtitle" placeholder="Job title" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="prospects_link" name="prospects_link" placeholder="Prospects link" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="comp_name" name="comp_name" placeholder="Company Name" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="comp_name" name="comp_link" placeholder="Company link" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="phone_no" name="phone_no" placeholder="PhNo." required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="direct_no" name="direct_no" placeholder="Direct No." required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="address" name="address" placeholder="Address" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="state" name="state" placeholder="State" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="zipcode" name="zipcode" placeholder="Zip Code" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="country" name="country" placeholder="Country" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="emp_size" name="emp_size" placeholder="Employee Size" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="industry" name="industry" placeholder="Industry" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="website" name="website" placeholder="Website" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="asset_title" name="asset_title" placeholder="Asset Title" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="time" class="form-control valid" id="timestamp" name="timestamp" placeholder="Timestamp" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="text" class="form-control valid" id="agent_remark" name="agent_remark" placeholder="Agent Remark" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<input type="time" class="form-control valid" id="address_link" name="address_link" placeholder="Address Link" required="" aria-required="true" aria-invalid="false" required>
											</div>
										</div>
										
										<div class="col-md-12">
											
										</div>
										
										<div class="col-md-12">
											<div class="mb-3">
												<label class="form-label" for="track_campaign_name">Company Name</label>
												<input type="text" class="form-control" id="comp_name" name="comp_name" placeholder="Company Name" required="" aria-required="true">
											</div>
										</div>
										<div class="col-md-12">
											<div class="mb-3">
												<label class="form-label" for="track_campaign_name">Designation</label>
												<input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Designation" required="" aria-required="true">
											</div>
										</div>
										<div class="col-md-12">
											<div class="mb-3">
												<label class="form-label" for="track_campaign_name">Agent Name</label>
												<input type="text" class="form-control" id="agent_name" name="agent_name" placeholder="Agent Name" value="{{ Auth::User()->name }}" aria-required="true" readonly>
											</div>
										</div>
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" id="modal-add-tracker-form-btn" class="btn btn-primary waves-effect waves-light">Save changes</button>
							</div>
						</form>
					</div>
					</div>
				</div>

			</div>
		</div>
		<div id="myModal1" class="modal fade p-2" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header text-left">
						<h4 class="modal-title">Import CSV File</h4>
					</div>
					<div class="modal-body">
						<div class="card-body">
						<form id="modal-add-tracker-form" class="needs-validation" method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
							@csrf <!-- add csrf field on your form -->
							<div class="modal-body">
									
									<input type="hidden" id="user_id" name="user_id" value="{{  Auth::User()->id }}">
									<div class="row">
										<div class="col-md-12">
											<input type="file" name="file" class="form-control">
										</div>
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" id="modal-add-tracker-form-btn" class="btn btn-primary waves-effect waves-light">Import File</button>
							</div>
						</form>
					</div>
					</div>
				</div>

			</div>
		</div>
		
	</div>
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
            {data: 'camp_name', name: 'camp_name'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'phone_no', name: 'phone_no'},
            {data: 'direct_no', name: 'direct_no'},
            {data: 'email_address', name: 'email_address'},
            {data: 'comp_name', name: 'comp_name'},
            {data: 'city', name: 'city'},
            {data: 'country', name: 'country'},
            {data: 'state', name: 'state'},
            {data: 'zipcode', name: 'zipcode'},
            {data: 'agent_name', name: 'agent_name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            // Incrementing the index column by one digit
            var index = iDisplayIndexFull + 1;
            $('td:eq(0)', nRow).html(index);
            return nRow;
        }
    });
});

</script>

@endsection('content')