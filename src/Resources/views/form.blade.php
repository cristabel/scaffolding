@extends('administrator::layouts.template')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $config['title'] }}</h3>
    </div>
    <div class="box-body table-responsive">
        @if( Session::has('message') )
        <div class="block-messages">
            @include('scaffolding::messages')
        </div>
        @endif
        {!! Form::open(['url' => "/scaffolding/{$model}/save", 'class' => 'form-horizontal', 'role' => 'form', 'files' => true]) !!}
            {{--*/ $layout = 'field' /*--}}
            @if( isset($form['layout']) )
                {{--*/ $layout = $form['layout'] /*--}}
            @endif
            @include('scaffolding::form.layout.' . $layout, ['elements' => $form['elements']])
        {!! Form::close() !!}
    </div>
</div>
@stop
