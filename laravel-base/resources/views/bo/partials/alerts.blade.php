@if($errors->has('success'))
    <div class="row">
        <div class="col-md-12 alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $errors->first('success') }}
        </div>
    </div>
@endif

@if($errors->has('custom'))
    <div class="row">
        <div class="col-md-12 alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $errors->first('custom') }}
        </div>
    </div>
@endif