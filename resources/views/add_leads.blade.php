@extends('main') @section('content')
<style>
    .card-body{
        padding: 4rem 3rem;
    }
    .form-heading{
        text-decoration: underline;
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('dashboard') }}" class="btn btn-primary mb-4">Go to back</a>
                <h4 class="form-heading mb-5">
                    Add Details
                </h4>
                <form id="modal-add-tracker-form" class="needs-validation" method="POST" action="{{ url('/leaddetails') }}">
                    @csrf
                    <input type="hidden" id="user_id" name="user_id" value="{{  Auth::User()->id }}" />
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="date" class="form-control" id="track_date" name="track_date" placeholder="date" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="camp_name" name="camp_name" placeholder="Campaign Name" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="agent_name" name="agent_name" value="{{ Auth::User()->name }}" required="" aria-required="true" aria-invalid="false" required readonly/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address" required="" aria-required="true" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="salution" name="salution" placeholder="Salution" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="jobtitle" name="jobtitle" placeholder="Job title" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="prospects_link" name="prospects_link" placeholder="Prospects link" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="comp_name" name="comp_name" placeholder="Company Name" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="comp_link" name="comp_link" placeholder="Company link" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="tel" class="form-control" id="phone_no" name="phone_no" pattern="[0-9]{10}" title="Please enter correct format of phone number" placeholder="Phone Number" required="" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="direct_no" name="direct_no" placeholder="Direct No." required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="city" name="city" placeholder="City" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="state" name="state" placeholder="State" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip Code" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="country" name="country" placeholder="Country" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="emp_size" name="emp_size" placeholder="Employee Size" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="industry" name="industry" placeholder="Industry" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="website" name="website" placeholder="Website" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="asset_title" name="asset_title" placeholder="Asset Title" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="time" class="form-control" id="timestamp" name="timestamp" placeholder="Timestamp" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="agent_remark" name="agent_remark" placeholder="Agent Remark" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="address_link" name="address_link" placeholder="Address Link" required="" aria-required="true" aria-invalid="false" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            
                            <h4 class="mb-5">Custom Questions</h4>
                            <div class="col-md-4">
                                <div class="mb-5">
                                    <input type="text" class="form-control" id="custom_quest1" name="custom_quest1" placeholder="Custome Question 1" required="" aria-required="true" aria-invalid="false" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-5">
                                    <input type="text" class="form-control" id="custom_quest2" name="custom_quest2" placeholder="Custome Question 2" required="" aria-required="true" aria-invalid="false" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-5">
                                    <input type="text" class="form-control" id="custom_quest3" name="custom_quest3" placeholder="Custome Question 3" required="" aria-required="true" aria-invalid="false" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-5">
                                    <input type="text" class="form-control" id="custom_quest4" name="custom_quest4" placeholder="Custome Question 4" required="" aria-required="true" aria-invalid="false" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-5">
                                    <input type="text" class="form-control" id="custom_quest5" name="custom_quest5" placeholder="Custome Question 5" required="" aria-required="true" aria-invalid="false" required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid mx-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection('content')
</div>
