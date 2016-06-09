@extends('layouts.app')

@section('content')
<?php $i=0; ?>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-success">
                <div class="panel-heading"><h4>Patient</h4></div>

                <div class="panel-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>National ID</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Insurance</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $patient->patient_id }}</td>
                            <td>{{ $patient->patientFirstName }}</td>
                            <td>{{ $patient->patientSurName }}</td>
                            <td>{{ $patient->patientNationalId }}</td>
                            <td>{{ $patient->patientDob }}</td>
                            <td>{{ $patient->patientGender }}</td>
                            <td>{{ $patient->patientInsuranceNumber }}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-warning">
                <div class="panel-heading">Contact Information</div>

                <div class="panel-body">
                    <address>
                        <a href="mailto:{{ $email }}">{{ $email }}</a><br>
                        {{ $contact->contact_telephone }}<br>
                        {{ $contact->contact_street }} {{ $contact->contact_number }}, {{ $contact->contact_city }}<br>
                        {{ $contact->contact_postcode }}<br>
                        {{ $contact->contact_state }}<br>
                        {{ $contact->contact_Country }}
                    </address>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-danger">
                <div class="panel-heading"><h4>Alerts</h4></div>

                <div class="panel-body">
                    <h3>Allergies</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Agent</th>
                            <th>Symptom</th>
                            <th>Onset Date</th>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allergies as $allergy)
                            <tr>
                                <td>{{ $allergy->allergy_id }}</td>
                                <td>{{ $agents[$i++]['allergyAgentDescription']}}</td>
                                <td>{{ $allergy->allergyDescription }}</td>
                                <td>{{ $allergy->allergyOnsetDate }}</td>
                                <td><a href="#">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <h3>Medical Alerts</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Medical Alert Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($medicals as $medical)
                            <tr>
                                <td>{{ $medical->medical_alertid }}</td>
                                <td>{{ $medical->medicalAlertDescr }}</td>
                                <td><a href="#">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-warning">
                <div class="panel-heading">Guardian Information</div>

                <div class="panel-body">
                    <p>Name: <b>{{ $guardian->guardian_firstname }} {{ $guardian->guardian_lastname }}</b></p>
                    <p>Role: <b>{{ $guardian->guardian_role }}</b></p>
                    <p>Telephone: <b>{{ $guardian->guardian_telephone }}</b></p>
                    <p>E-Mail: <b>{{ $guardian->guardian_email }}</b></p>
                </div>
            </div>
        </div>
    </div>

@endsection