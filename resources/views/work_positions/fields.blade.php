<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::select('state', [
        'Habilitado' => 'Habilitado',
        'Deshabilitado' => 'Deshabilitado'
    ], null, ['class' => 'form-control custom-select']) !!}
</div>
