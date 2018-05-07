<table class="table table-responsive" id="countryTranslations-table">
    <thead>
        <tr>
            <th>Country Id</th>
        <th>Language Id</th>
        <th>Country Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($countryTranslations as $countryTranslation)
        <tr>
            <td>{!! $countryTranslation->country_id !!}</td>
            <td>{!! $countryTranslation->language_id !!}</td>
            <td>{!! $countryTranslation->country_name !!}</td>
            <td>
                {!! Form::open(['route' => ['countryTranslations.destroy', $countryTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('countryTranslations.show', [$countryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('countryTranslations.edit', [$countryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>