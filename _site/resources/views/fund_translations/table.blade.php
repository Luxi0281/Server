<table class="table table-responsive" id="fundTranslations-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fund Id</th>
        <th>Language Id</th>
        <th>Title</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($fundTranslations as $fundTranslation)
        <tr>
            <td>{!! $fundTranslation->id !!}</td>
            <td>{!! $fundTranslation->fund_id !!}</td>
            <td>{!! $fundTranslation->language_id !!}</td>
            <td>{!! $fundTranslation->title !!}</td>
            <td>{!! $fundTranslation->description !!}</td>
            <td>
                {!! Form::open(['route' => ['fundTranslations.destroy', $fundTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('fundTranslations.show', [$fundTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('fundTranslations.edit', [$fundTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>