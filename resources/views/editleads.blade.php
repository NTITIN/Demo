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
                    Update Lead Details
                </h4>
                <form id="modal-add-tracker-form" class="needs-validation" method="POST" action="{{ url('/updateleads',$leads->id) }}">
                    @csrf
                    <input type="hidden" id="user_id" name="user_id" value="{{  Auth::User()->id }}" />
                    <input type="hidden" id="id" name="id" value="{{  $leads->id }}" />
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="date" class="form-control" id="track_date" name="track_date" value="{{ date('Y-m-d', strtotime($leads->date)) }}"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="camp_name" name="camp_name" placeholder="Campaign Name" value=" {{ $leads->camp_name }} " />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="agent_name" name="agent_name" value="{{ $leads->agent_name }}"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address" value=" {{ $leads->email_address }} " />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="salution" name="salution" value=" {{ $leads->salution }} "  />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="first_name" name="first_name" value=" {{ $leads->first_name }} " />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="last_name" name="last_name" value=" {{ $leads->last_name }} " />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="jobtitle" name="jobtitle" value=" {{ $leads->jobtitle }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="prospects_link" name="prospects_link" value=" {{ $leads->prospects_link }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="comp_name" name="comp_name" value=" {{ $leads->comp_name }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="comp_link" name="comp_link" value=" {{ $leads->comp_link }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="phone_no" name="phone_no" value=" {{ $leads->phone_no }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="direct_no" name="direct_no" value=" {{ $leads->direct_no }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="address" name="address" value=" {{ $leads->address }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="city" name="city" value=" {{ $leads->city }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="state" name="state" value=" {{ $leads->state }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="zipcode" name="zipcode" value=" {{ $leads->zipcode }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="country" name="country" value=" {{ $leads->country }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="emp_size" name="emp_size" value=" {{ $leads->country }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="industry" name="industry" value=" {{ $leads->industry }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="website" name="website" value=" {{ $leads->website }} " />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="asset_title" name="asset_title" value=" {{ $leads->asset_title }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="time" class="form-control" id="timestamp" name="timestamp" value="{{ date('H:i', strtotime($leads->timestamp)) }}" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="agent_remark" name="agent_remark" value=" {{ $leads->agent_remark }} "/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-5">
                                <input type="text" class="form-control" id="address_link" name="address_link" value=" {{ $leads->address_link }} "/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            
                            <h4 class="mb-5">Custom Questions</h4>
                            <div class="col-md-4">
                                <div class="mb-5">
                                    <input type="text" class="form-control" id="custom_quest1" name="custom_quest1" value=" {{ $leads->custom_quest1 }} "/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-5">
                                    <input type="text" class="form-control" id="custom_quest2" name="custom_quest2" value=" {{ $leads->custom_quest2 }} "/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-5">
                                    <input type="text" class="form-control" id="custom_quest3" name="custom_quest3" value=" {{ $leads->custom_quest3 }} "/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-5">
                                    <input type="text" class="form-control" id="custom_quest4" name="custom_quest4" value=" {{ $leads->custom_quest4 }} "/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-5">
                                    <input type="text" class="form-control" id="custom_quest5" name="custom_quest5" value=" {{ $leads->custom_quest5 }} "/>
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
