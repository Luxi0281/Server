<table class="table table-responsive" id="provinceTranslations-table">
    <thead>
        <tr>
            <th>Province Id</th>
        <th>Language Id</th>
        <th>Province Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($provinceTranslations as $provinceTranslation)
        <tr>
            <td>{!! $provinceTranslation->province_id !!}</td>
            <td>{!! $provinceTranslation->language_id !!}</td>
            <td>{!! $provinceTranslation->province_name !!}</td>
            <td>
                {!! Form::open(['route' => ['provinceTranslations.destroy', $provinceTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('provinceTranslations.show', [$provinceTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('provinceTranslations.edit', [$provinceTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>