<div class="table-responsive">
    <table class="table" id="monthlyDatas-table">
        <thead>
        <tr>
            <th>Year</th>
        <th>Month</th>
        <th>Amounth</th>
        <th>Id Advisor</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($monthlyDatas as $monthlyData)
            <tr>
                <td>{{ $monthlyData->year }}</td>
            <td>{{ $monthlyData->month }}</td>
            <td>{{ $monthlyData->amounth }}</td>
            <td>{{ $monthlyData->id_advisor }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['monthlyDatas.destroy', $monthlyData->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('monthlyDatas.show', [$monthlyData->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('monthlyDatas.edit', [$monthlyData->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
