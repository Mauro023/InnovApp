<!-- Dni Field -->
<div class="col-sm-12">
    {!! Form::label('dni', 'Dni:') !!}
    <p>{{ $employee->dni }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $employee->name }}</p>
</div>

<!-- State Field -->
<div class="col-sm-12">
    {!! Form::label('state', 'State:') !!}
    <p>{{ $employee->state }}</p>
</div>

<!-- Workposition Id Field -->
<div class="col-sm-12">
    {!! Form::label('workposition_id', 'Workposition Id:') !!}
    <p>{{ $employee->workposition_id }}</p>
</div>

<!-- Cost Center Id Field -->
<div class="col-sm-12">
    {!! Form::label('cost_center_id', 'Cost Center Id:') !!}
    <p>{{ $employee->cost_center_id }}</p>
</div>

<!-- Service Id Field -->
<div class="col-sm-12">
    {!! Form::label('service_id', 'Service Id:') !!}
    <p>{{ $employee->service_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $employee->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $employee->updated_at }}</p>
</div>

