@extends('layouts.app')

@include('includes.message-block')

@section('content')

    <?php $i=0; ?>
    <div class="row">
        <div class="col-md-8">
            @if($allergies)
                <div class="panel panel-danger">
                    <div class="panel-heading">Allergy Alerts</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Agent</th>
                                <th>Symptom</th>
                                <th>Onset Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allergies as $allergy)
                                <tr>
                                    <td>{{ $allergy->allergy_id }}</td>
                                    <td>{{ $agents[$i++]['allergyAgentDescription']}}</td>
                                    <td>{{ $allergy->allergyDescription }}</td>
                                    <td>{{ $allergy->allergyOnsetDate }}</td>
                                    <td><a href="{{ route('allergy.delete', [ 'allergy_id' => $allergy->allergy_id ]) }}">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            @if($medicals)
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Medical Alerts
                    </div>
                    <div class="panel-body">
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
                                    <td><a href="{{ route('medical.delete', [ 'allergy_id' => $allergy->allergy_id ]) }}">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    Personal Information
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#patient-modal">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </div>

                <div class="panel-body">
                    <p>National ID: <b>{{ $patient->patient_nationalid }}</b></p>
                    <p>Date of birth: <b>{{ $patient->patient_dob }}</b></p>
                    <p>Gender: <b>{{ $patient->patient_gender }}</b></p>
                    <p>E-Insurance: <b>{{ $patient->patient_insurance }}</b></p>
                </div>
            </div>

        @if($contact)
            <div class="panel panel-warning">
                <div class="panel-heading">
                    Contact Information
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#contact-modal">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </div>

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
        @endif

        @if($guardian)
            <div class="panel panel-warning">
                <div class="panel-heading">
                    Guardian Information
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#guardian-modal">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </div>

                <div class="panel-body">
                    <p>Name: <b>{{ $guardian->guardian_firstname }} {{ $guardian->guardian_lastname }}</b></p>
                    <p>Role: <b>{{ $guardian->guardian_role }}</b></p>
                    <p>Telephone: <b>{{ $guardian->guardian_telephone }}</b></p>
                    <p>E-Mail: <b>{{ $guardian->guardian_email }}</b></p>
                </div>
            </div>
        @endif

        </div>
    </div>

    @include('modals.guardian-modal')
    @include('modals.contact-modal')
    @include('modals.patient-modal')
@endsection