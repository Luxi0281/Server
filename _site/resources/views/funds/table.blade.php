<table class="table table-responsive" id="funds-table">
    <thead>
        <tr>
            <th>Picture</th>
        <th>Link</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Location Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($funds as $fund)
        <tr>
            <td>{!! $fund->picture !!}</td>
            <td>{!! $fund->link !!}</td>
            <td>{!! $fund->email !!}</td>
            <td>{!! $fund->phone !!}</td>
            <td>{!! $fund->location_id !!}</td>
            <td>
                {!! Form::open(['route' => ['funds.destroy', $fund->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('funds.show', [$fund->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('funds.edit', [$fund->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>