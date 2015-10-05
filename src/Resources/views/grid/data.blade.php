<table class="table table-hover table-striped">
	<thead>
		<tr>
		@foreach($datagrid->headers() as $header)
			<th>{{ strtoupper($header) }}</th>
        @endforeach
        <th>OPTIONS</th>
		</tr>
	</thead>
	<tbody>
		@foreach($datagrid->data() as $row)
        <tr>
            @foreach($datagrid->columns() as $column)
            <td>{!! $datagrid->renderColumn($row, $column) !!}</td>
			@endforeach
            <td >
				<div class="btn-toolbar">
                    <div class="btn-group">
                        <a href="{{ url("/scaffolding/{$model}/edit/{$row->id}") }}" class="btn btn-mac btn-mac-feed" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ url("/scaffolding/{$model}/delete/{$row->id}") }}" class="btn btn-mac btn-mac-danger" title="Delete">
                            <i class="fa fa-remove"></i>
                        </a>
                    </div>
				</div>
            </td>
		</tr>
        @endforeach
	</tbody>
</table>
