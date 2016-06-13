<form action="{{ route('patient.update') }}" class="form-control" method="post">
    <!-- Modal -->
    <div class="modal fade" id="patient-modal" tabindex="-1" role="dialog" aria-labelledby="patient-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Personal Information</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="patient_nationalid">National ID: </label>
                        <input type="text" class="form-control" name="patient_nationalid" id="patient_nationalid" value="{{ $patient->patient_nationalid }}">
                    </div>

                    <label for="idTourDateDetails">Tour Start Date:</label>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="idTourDateDetails" id="idTourDateDetails" readonly="readonly" class="form-control clsDatePicker"> <span class="input-group-addon"><i id="calIconTourDateDetails" class="glyphicon glyphicon-th"></i></span>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="patient_dob">Date of Birth: </label>
                        <div class='input-group date' id='patient_dob'>
                            <input type='text' class="form-control" value="{{ $patient->patient_dob }}"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="patient_gender">Gender: </label>
                        <select class="form-control" name="patient_gender" id="patient_gender">
                            @if($patient->patient_gender == 'male')
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            @elseif($patient->patient_gender == 'female')
                                <option value="male">Male</option>
                                <option value="female" selected>Female</option>
                            @else
                                <option disabled selected value>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="patient_insurance">Insurance Number: </label>
                        <input type="text" class="form-control" name="patient_insurance" id="patient_insurance" value="{{$patient->patient_insurance}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <input type="hidden" name="id" value="{{ $patient->patient_id }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</form>