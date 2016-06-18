@extends('layouts.app')

@section('content')
    <form action="{{ route('patient.create') }}" method="post">
        <div class="row">
            <div class="col-md-4">
                <h3>Patient Information</h3>
                <div class="form-group">
                    <label for="patient_nationalid">National ID: </label>
                    <input type="text" class="form-control" name="patient_nationalid" id="patient_nationalid" >
                </div>
                <div class="form-group">
                    <label for="patient_dob">Date of Birth: </label>
                    <input type='text' name="patient_dob" id="patient_dob" class="form-control" placeholder="DD/MM/YYYY"/>
                </div>
                <div class="form-group">
                    <label for="patient_gender">Gender: </label>
                    <select class="form-control" name="patient_gender" id="patient_gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="patient_insurance">Insurance Number: </label>
                    <input type="text" class="form-control" name="patient_insurance" id="patient_insurance" >
                </div>
            </div>
            <div class="col-md-4">
                <h3>Contact Information</h3>
                <div class="form-group">
                    <label for="contact_telephone">Telephone: </label>
                    <input type="text" class="form-control" name="contact_telephone" id="contact_telephone">
                </div>
                <div class="form-group">
                    <label for="contact_street">Street: </label>
                    <input type="text" class="form-control" name="contact_street" id="contact_street">
                </div>
                <div class="form-group">
                    <label for="contact_number">Street Number: </label>
                    <input type="text" class="form-control" name="contact_number" id="contact_number">
                </div>
                <div class="form-group">
                    <label for="contact_city">City: </label>
                    <input type="text" class="form-control" name="contact_city" id="contact_city">
                </div>
                <div class="form-group">
                    <label for="contact_post_code">Post Code: </label>
                    <input type="text" class="form-control" name="contact_postcode" id="contact_postcode">
                </div>
                <div class="form-group">
                    <label for="contact_">State: </label>
                    <input type="text" class="form-control" name="contact_state" id="contact_state">
                </div>
                <div class="form-group">
                    <label for="contact_country">Country: </label>
                    <input type="text" class="form-control" name="contact_country" id="contact_country">
                </div>
                <div class="form-group">
                    <label for="contact_hpid">HP ID: </label>
                    <input type="text" class="form-control" name="contact_hpid" id="contact_hpid">
                </div>
            </div>
            <div class="col-md-4">
                <h3>Guardian Information</h3>
                <div class="form-group">
                    <label for="guardian_role">Role: </label>
                    <select class="form-control" name="guardian_role" id="guardian_role">
                        <option value="legal">Legal</option>
                        <option value="contact">Contact</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="guardian_firstname">First Name: </label>
                    <input type="text" class="form-control" name="guardian_firstname" id="guardian_firstname">
                </div>
                <div class="form-group">
                    <label for="guardian_lastname">Last Name: </label>
                    <input type="text" class="form-control" name="guardian_lastname" id="guardian_lastname">
                </div>
                <div class="form-group">
                    <label for="guardian_telephone">Telephone: </label>
                    <input type="text" class="form-control" name="guardian_telephone" id="guardian_telephone">
                </div>
                <div class="form-group">
                    <label for="guardian_email">E-Mail: </label>
                    <input type="text" class="form-control" name="guardian_email" id="guardian_email">
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>

    </form>
@endsection