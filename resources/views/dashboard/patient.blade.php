<?php $i=0; ?>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-danger">
            <div class="panel-heading">Allergy Alerts</div>
            <div class="panel-body">
                @if(isset($allergies))
                    @if(count($allergies)>0)
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
                                    <td>{{ $agents[$i++]['allergy_agent_description']}}</td>
                                    <td>{{ $allergy->allergy_description }}</td>
                                    <td>{{ $allergy->allergy_onset }}</td>
                                    <td><a href="{{ route('allergy.delete', [ 'allergy_id' => $allergy->allergy_id ]) }}">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#allergy-modal">
                            <span class="glyphicon glyphicon-plus"></span> Add Allergy Alert
                        </button>
                    @else
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#allergy-modal">
                            <span class="glyphicon glyphicon-plus"></span> Add Allergy Alert
                        </button>
                    @endif
                @endif
            </div>
        </div>




        <div class="panel panel-danger">
            <div class="panel-heading">
                Medical Alerts
            </div>
            <div class="panel-body">
                @if(isset($medicals))
                    @if(count($medicals)>0)
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
                                    <td>{{ $medical->medicalalert_id }}</td>
                                    <td>{{ $medical->medicalalert_description }}</td>
                                    <td><a href="{{ route('medicalalert.delete', [ 'medicalalert_id' => $medical->medicalalert_id ]) }}">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#medical-modal">
                            <span class="glyphicon glyphicon-plus"></span> Add Medical Alert
                        </button>
                    @else
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#medical-modal">
                            <span class="glyphicon glyphicon-plus"></span> Add Medical Alert
                        </button>
                    @endif
                @endif
            </div>
        </div>

    </div>

    <div class="col-md-3 col-md-offset-1">
        <div class="panel panel-warning">
            <div class="panel-heading">
                Personal Information
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning btn-xs pull-right" data-toggle="modal" data-target="#patient-modal">
                    <span class="glyphicon glyphicon-pencil"></span>
                </button>
            </div>

            <div class="panel-body">
                <p>National ID: <b>{{ Crypt::decrypt($patient->patient_cpr) }}</b></p>
                <p>Date of birth: <b>{{ $patient->patient_dob }}</b></p>
                <p>Gender: <b>{{ $patient->patient_gender }}</b></p>
                <p>E-Insurance: <b>{{ Crypt::decrypt($patient->patient_insurance) }}</b></p>
            </div>
        </div>

        @if(isset($contact))

            <div class="panel panel-warning">
                <div class="panel-heading">
                    Contact Information
                    <!-- delete -->
                    <form action="{{ url('contact/'.$contact['contact_id']) }}" method="POST" class="pull-right">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" id="delete-contact-{{ $contact['contact_id'] }}"  class="btn btn-xs btn-danger">
                            <span class="glyphicon glyphicon-trash"></span></button>
                    </form>

                    <!-- edit button trigger modal -->
                    <button type="button" class="btn btn-warning btn-xs pull-right" data-toggle="modal" data-target="#contact-modal" style="margin-right: 10px">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </div>

                <div class="panel-body">
                    <a href="mailto:{{ Session::get('user_email') }}">{{ Session::get('user_email') }}</a><br>
                    {{ Crypt::decrypt($contact->contact_telephone) }}<br>
                    <address>
                        {{ Crypt::decrypt($contact->contact_street) }} {{ Crypt::decrypt($contact->contact_number) }}, {{ $contact->contact_city }}<br>
                        {{ $contact->contact_postcode }}<br>
                        {{ $contact->contact_state }}<br>
                        {{ $contact->contact_country }}
                    </address>
                </div>
            </div>
        @endif

        @if(isset($guardian))
            <div class="panel panel-warning">
                <div class="panel-heading">
                    Guardian Information
                    <!-- Button trigger modal -->
                    <!-- delete -->
                    <form action="{{ url('guardian/'.$guardian->guardian_id) }}" method="POST" class="pull-right">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-danger">
                            <span class="glyphicon glyphicon-trash"></span></button>
                    </form>

                    <!-- edit button trigger modal -->
                    <button type="button" class="btn btn-warning btn-xs pull-right" data-toggle="modal" data-target="#guardian-modal" style="margin-right: 10px">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </div>

                <div class="panel-body">
                    <p>Name: <b>{{ Crypt::decrypt($guardian->guardian_firstname) }} {{ Crypt::decrypt($guardian->guardian_lastname) }}</b></p>
                    <p>Role: <b>{{ $guardian->guardian_role }}</b></p>
                    <p>Telephone: <b>{{ Crypt::decrypt($guardian->guardian_telephone) }}</b></p>
                    <p>E-Mail: <b>{{ Crypt::decrypt($guardian->guardian_email) }}</b></p>
                </div>
            </div>
        @endif
    </div>
</div>

@include('modals.guardian-modal')
@include('modals.contact-modal')
@include('modals.patient-modal')
@include('modals.allergy-modal')
@include('modals.medical-modal')