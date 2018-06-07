<div style="overflow: scroll;">
<table class="table table-responsive" id="addressTranslations-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Address Id</th>
        <th>Language Id</th>
        <th>Full Address</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($addressTranslations as $addressTranslation)
        <tr>
            <td>{!! $addressTranslation->id !!}</td>
            <td>{!! $addressTranslation->address_id !!}</td>
            <td>{!! $addressTranslation->language_id !!}</td>
            <td>{!! $addressTranslation->full_address !!}</td>
            <td>
                {!! Form::open(['route' => ['addressTranslations.destroy', $addressTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('addressTranslations.show', [$addressTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('addressTranslations.edit', [$addressTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>