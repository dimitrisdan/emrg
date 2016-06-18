
<form action="{{ route('contact.update') }}" method="post">
    <!-- Modal -->
    <div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="contact-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Contact Information</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="contact_telephone">Telephone: </label>
                        @if(isset($contact->contact_telephone))
                            <input type="text" name="contact_telephone" id="contact_telephone" value="{{ Crypt::decrypt($contact->contact_telephone) }}">
                        @else
                            <input type="text" name="contact_telephone" id="contact_telephone">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="contact_street">Street: </label>
                        <input type="text" name="contact_street" id="contact_street" value="{{ Crypt::decrypt($contact->contact_street) }}">
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Street Number: </label>
                        <input type="text" name="contact_number" id="contact_number" value="{{ Crypt::decrypt($contact->contact_number) }}">
                    </div>
                    <div class="form-group">
                        <label for="contact_city">City: </label>
                        <input type="text" name="contact_city" id="contact_city" value="{{ $contact->contact_city }}">
                    </div>
                    <div class="form-group">
                        <label for="contact_post_code">Post Code: </label>
                        <input type="text" name="contact_postcode" id="contact_postcode" value="{{ $contact->contact_postcode }}">
                    </div>
                    <div class="form-group">
                        <label for="contact_">State: </label>
                        <input type="text" name="contact_state" id="contact_state" value="{{ $contact->contact_state }}">
                    </div>
                    <div class="form-group">
                        <label for="contact_country">Country: </label>
                        <input type="text" name="contact_country" id="contact_country" value="{{ $contact->contact_country }}">
                    </div>
                    <div class="form-group">
                        <label for="contact_hpid">HP ID: </label>
                        <input type="text" name="contact_hpid" id="contact_hpid" value="{{ $contact->contact_hpid }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <input type="hidden" name="id" value="{{ $contact->contact_id }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>