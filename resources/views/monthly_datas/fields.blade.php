<!-- Year Field -->
<div class="form-group col-sm-6">
    {!! Form::label('year', 'Year:') !!}
    {!! Form::number('year', null, ['class' => 'form-control']) !!}
</div>

<!-- Month Field -->
<div class="form-group col-sm-6">
    {!! Form::label('month', 'Month:') !!}
    {!! Form::number('month', null, ['class' => 'form-control']) !!}
</div>

<!-- Amounth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amounth', 'Amounth:') !!}
    {!! Form::number('amounth', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Advisor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_advisor', 'Id Advisor:') !!}
    {!! Form::select('id_advisor', ], null, ['class' => 'form-control custom-select']) !!}
</div>
