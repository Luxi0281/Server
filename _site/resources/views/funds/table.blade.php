<div style="overflow: scroll; height: 550px;">
<table class="table table-responsive" id="funds-table">
    <thead>
        <tr>
            <th>Action</th>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Logo</th>
            <th>Picture</th>
            <th>Link</th>
        </tr>
    </thead>
    <tbody>
    @foreach($funds as $funds)
        <tr>
            <td>
                {!! Form::open(['route' => ['funds.destroy', $funds->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('funds.show', [$funds->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('funds.edit', [$funds->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            <td>{!! $funds->id !!}</td>
            <td>{!! $funds->title !!}</td>
            <td>{!! $funds->description !!}</td>
            <td>{!! $funds->logo !!}</td>
            <td>{!! $funds->picture !!}</td>
            <td>{!! $funds->link !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>