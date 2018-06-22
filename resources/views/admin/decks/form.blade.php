{!! Form::open(array('route' => 'admin::cards.create')) !!}
<div class="col-md-12">
    <div class="col-md-10">
        <div class="form-group">
        {{ Form::label('name', 'Name', ['class' => 'col-lg-2 control-label required']) }}
        {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => 'Name', 'required' => 'required']) }}
        </div>
    </div>

    <div class="col-md-10">
        <div class="form-group">
        {{ Form::label('categoryId', 'Category', ['class' => 'col-lg-2 control-label required']) }}
        {{ Form::text('categoryId', null, ['class' => 'form-control box-size', 'placeholder' => 'Category', 'required' => 'required']) }}
        </div>
    </div>

    <div class="col-md-10">
        <div class="form-group">
        {{ Form::label('status', 'Status', ['class' => 'col-lg-2 control-label required']) }}
        {{ Form::select('status', array('L' => 'Large', 'S' => 'Small')) }}
        </div>
    </div>
    
    <div class="col-md-10">
        <div class="form-group">
        {{ Form::label('description', 'Description', ['class' => 'col-lg-2 control-label required']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control box-size', 'placeholder' => 'Description', 'required' => 'required']) }}
        </div>
    </div>
</div>
<div class="clearfix"></div>
{!! Form::close() !!}