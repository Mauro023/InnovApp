<div class="table-responsive">
    <table class="table" id="costCenters-table">
        <thead>
        <tr>
            <th>Code</th>
        <th>Name</th>
        <th>State</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($costCenters as $costCenter)
            <tr>
                <td>{{ $costCenter->code }}</td>
            <td>{{ $costCenter->name }}</td>
            <td>{{ $costCenter->state }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['costCenters.destroy', $costCenter->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('costCenters.show', [$costCenter->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('costCenters.edit', [$costCenter->id]) }}"
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
