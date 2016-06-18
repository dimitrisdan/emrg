@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-4 col-md-offset-4 error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@if(Session::has('msg-message'))
    <div class="row">
        <div class="col-md-3 col-md-offset-4 error">
            @if(Session::get('msg-status') == 1)
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Success!</strong> {{ Session::get('msg-message') }}
                </div>
            @elseif(Session::get('msg-status') == 0)
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Holy guacamole!</strong> {{ Session::get('msg-message') }}
                </div>
            @elseif(Session::get('msg-status') == 2)
                <div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ Session::get('msg-message') }}</strong>
                </div>
            @endif
        </div>
    </div>
@endif