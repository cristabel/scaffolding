@foreach( $form['elements'] as $key => $field )
<div class="form-group">
    <label class="col-lg-2 control-label">
        <span>{{ $field['label'] }}</span>
        @if( isset($field['validation']) )
        <i class="asterisk">*</i>
        @endif
    </label>
    <div class="col-lg-10">
        {!! WebForm::element($key, $field)->make($row) !!}
        @if( isset($field['description']) )
        <em>{{ $field['description'] }}</em>
        @endif
    </div>
</div>
@endforeach
