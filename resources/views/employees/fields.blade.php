<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni', 'Dni:') !!}
    {!! Form::number('dni', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Workposition Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workposition_id', 'Cargo:') !!}
    {!! Form::select('workposition_id', $workposition, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Cost Center Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost_center_id', 'Centro de costos:') !!}
    {!! Form::select('cost_center_id', $CostCenter, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_id', 'Servicio:') !!}
    {!! Form::select('service_id', $Service, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'Estado:') !!}
    {!! Form::select('state', [
        'Habilitado' => 'Habilitado',
        'Deshabilitado' => 'Deshabilitado'
    ], null, ['class' => 'form-control custom-select']) !!}
</div>

