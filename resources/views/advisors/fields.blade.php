<!-- Localization Field -->
<div class="form-group col-sm-6">
    {!! Form::label('localization', 'Localization:') !!}
    {!! Form::text('localization', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Employee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_employee', 'Id Employee:') !!}
    {!! Form::select('id_employee', ], null, ['class' => 'form-control custom-select']) !!}
</div>
