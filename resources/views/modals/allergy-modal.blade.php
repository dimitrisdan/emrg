<form action="{{ route('allergy.create') }}" method="post">
    <!-- Modal -->
    <div class="modal fade" id="allergy-modal" tabindex="-1" role="dialog" aria-labelledby="contact-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Contact Information</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="allergy_agent_id">Allergy Description: </label>
                        <select class="form-control" name="allergy_agent_id" id="allergy_agent_id">
                            <?php
                                $allergy_agents = DB::table('allergyagents')->get();
                            ?>
                            @foreach($allergy_agents as $allergy_agent)
                                <option value="{{ $allergy_agent->allergy_agent_id }} }}">{{ $allergy_agent->allergy_agent_description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="allergy_description">Allergy Description: </label>
                        <textarea class="form-control" name="allergy_description" id="allergy_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>