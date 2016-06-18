<form action="{{ route('patient.update') }}" class="form-group" method="post">
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
                        <input type="text" class="form-control" name="patient_nationalid" id="patient_nationalid" value="{{ Crypt::decrypt($patient->patient_nationalid) }}">
                    </div>
                    <div class="form-group">
                        <label for="patient_dob">Date of Birth: </label>
                        <input type='text' name="patient_dob" id="patient_dob" class="form-control" placeholder="DD/MM/YYYY" value="{{ $patient->patient_dob }}"/>
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
                        <input type="text" class="form-control" name="patient_insurance" id="patient_insurance" value="{{ Crypt::decrypt($patient->patient_insurance) }}">
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