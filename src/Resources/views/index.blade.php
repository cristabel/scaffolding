@extends('administrator::layouts.template')

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">{{ $config['title'] }}</h4>
        <div class="btn-tool">
			<div class="btn-group">
				<a href="{{ url("/scaffolding/{$model}/create") }}" class="btn btn-sm btn-mac btn-mac-primary btn-mac-focus">
					<i class="fa fa-plus"></i> Add New
				</a>
			</div>        
        </div>
    </div>
    <div class="box-body table-responsive no-padding">
        @include('scaffolding::grid.data')
    </div>
</div>
@stop
