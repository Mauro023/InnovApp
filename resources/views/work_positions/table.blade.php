<div class="table-responsive">
    <table class="table" id="workPositions-table">
        <thead>
        <tr>
            <th>Description</th>
        <th>State</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($workPositions as $workPosition)
            <tr>
                <td>{{ $workPosition->description }}</td>
            <td>{{ $workPosition->state }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['workPositions.destroy', $workPosition->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('workPositions.show', [$workPosition->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('workPositions.edit', [$workPosition->id]) }}"
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
