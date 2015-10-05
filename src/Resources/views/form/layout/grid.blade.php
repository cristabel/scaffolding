@foreach( $form['elements'] as $fields )
<div class="form-group">
    @foreach( $fields as $name => $field )
    <div class="col-lg-{{ 12 / count($fields) }}">
        <label class="control-label">
            <i class="asterisk">*</i>
            <span>{{ $field['label'] }}</span>
            @if( isset($field['validation']) )
            @endif
        </label>
        {!! WebForm::element($name, $field)->make($row) !!}
        @if( isset($field['description']) )
        <em>{{ $field['description'] }}</em>
        @endif
    </div>
    @endforeach
</div>
@endforeach
