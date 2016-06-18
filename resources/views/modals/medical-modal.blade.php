<form action="{{ route('medicalalert.create') }}" method="post">
    <!-- Modal -->
    <div class="modal fade" id="medical-modal" tabindex="-1" role="dialog" aria-labelledby="medical-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Medical Alert</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="medicalalert_description">Medical Alert Description: </label>
                        <textarea class="form-control" name="medicalalert_description" id="medicalalert_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Medical Alert</button>
                </div>
            </div>
        </div>
    </div>
</form>