<form action="" method="post">
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
                        <select class="form-control" name="patient_nationalid" id="patient_nationalid">
                            <option value="legal">Legal</option>
                            <option value="contact">Contact</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="patient_dob">Date of Birth: </label>
                        <input type="text" class="form-control" name="patient_dob" id="patient_dob" value="">
                    </div>
                    <div class="form-group">
                        <label for="patient_gender">Gender: </label>
                        <select class="form-control" name="patient_gender" id="patient_gender">
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="patient_insurance">Insurance Number: </label>
                        <input type="text" class="form-control" name="patient_insurance" id="patient_insurance" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>