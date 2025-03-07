<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Descripción:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'Estado:') !!}
    {!! Form::select('state', [
        'Habilitado' => 'Habilitado',
        'Deshabilitado' => 'Deshabilitado'
    ], null, ['class' => 'form-control custom-select']) !!}
</div>
