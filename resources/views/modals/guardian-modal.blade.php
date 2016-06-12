<form action="" method="post">
    <!-- Modal -->
    <div class="modal fade" id="guardian-modal" tabindex="-1" role="dialog" aria-labelledby="guardian-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Guardian Information</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="guardian_role">Role: </label>
                        <select class="form-control" name="guardian_role" id="guardian_role">
                            <option value="legal">Legal</option>
                            <option value="contact">Contact</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="guardian_firstname">First Name: </label>
                        <input type="text" class="form-control" name="guardian_firstname" id="guardian_firstname" value="">
                    </div>
                    <div class="form-group">
                        <label for="guardian_lastname">Last Name: </label>
                        <input type="text" class="form-control" name="guardian_lastname" id="guardian_lastname" value="">
                    </div>
                    <div class="form-group">
                        <label for="guardian_telephone">Telephone: </label>
                        <input type="text" class="form-control" name="guardian_telephone" id="guardian_telephone" value="">
                    </div>
                    <div class="form-group">
                        <label for="guardian_email">E-Mail: </label>
                        <input type="text" class="form-control" name="guardian_email" id="guardian_email" value="">
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