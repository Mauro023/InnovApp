<div class="table-responsive">
    <table class="table" id="advisors-table">
        <thead>
        <tr>
            <th>Localization</th>
        <th>Id Employee</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($advisors as $advisor)
            <tr>
                <td>{{ $advisor->localization }}</td>
            <td>{{ $advisor->id_employee }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['advisors.destroy', $advisor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('advisors.show', [$advisor->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('advisors.edit', [$advisor->id]) }}"
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
