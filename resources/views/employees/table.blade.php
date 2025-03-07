<div class="table-responsive">
    <table class="table" id="employees-table">
        <thead>
        <tr>
            <th>Dni</th>
        <th>Name</th>
        <th>State</th>
        <th>Workposition Id</th>
        <th>Cost Center Id</th>
        <th>Service Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->dni }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->state }}</td>
            <td>{{ $employee->workposition_id }}</td>
            <td>{{ $employee->cost_center_id }}</td>
            <td>{{ $employee->service_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('employees.show', [$employee->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('employees.edit', [$employee->id]) }}"
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
