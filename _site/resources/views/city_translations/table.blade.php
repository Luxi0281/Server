<table class="table table-responsive" id="cityTranslations-table">
    <thead>
        <tr>
            <th>City Id</th>
        <th>Language Id</th>
        <th>City Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cityTranslations as $cityTranslation)
        <tr>
            <td>{!! $cityTranslation->city_id !!}</td>
            <td>{!! $cityTranslation->language_id !!}</td>
            <td>{!! $cityTranslation->city_name !!}</td>
            <td>
                {!! Form::open(['route' => ['cityTranslations.destroy', $cityTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cityTranslations.show', [$cityTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cityTranslations.edit', [$cityTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>