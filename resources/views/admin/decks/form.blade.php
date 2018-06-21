<div class="col-md-7">
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Name *</label>
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name', $record->name) }}" required>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="name">Description *</label>
            <input type="text" class="form-control" name="description" placeholder="Description" value="{{ old('description', $record->description) }}" required>

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col-md-12 -->

    <!-- /.col-md-12 -->

</div>
