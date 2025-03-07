<!-- Year Field -->
<div class="col-sm-12">
    {!! Form::label('year', 'Year:') !!}
    <p>{{ $monthlyData->year }}</p>
</div>

<!-- Month Field -->
<div class="col-sm-12">
    {!! Form::label('month', 'Month:') !!}
    <p>{{ $monthlyData->month }}</p>
</div>

<!-- Amounth Field -->
<div class="col-sm-12">
    {!! Form::label('amounth', 'Amounth:') !!}
    <p>{{ $monthlyData->amounth }}</p>
</div>

<!-- Id Advisor Field -->
<div class="col-sm-12">
    {!! Form::label('id_advisor', 'Id Advisor:') !!}
    <p>{{ $monthlyData->id_advisor }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $monthlyData->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $monthlyData->updated_at }}</p>
</div>

