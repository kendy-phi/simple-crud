<div class="form-group {!! $errors->has($name) ? 'has-error' : '' !!}">
	@isset($label)
		{!! Form::label($label, $label) !!}
	@endisset
	@isset($type)
		@if($type == 'password')
			{!! Form::password($name, ['class' => 'form-control', 'placeholder' => $tag, 'id'=>$name]) !!}
		@elseif($type == 'number')
			{!! Form::number($name, isset($default) ? $default : null, ['class' => 'form-control', 'placeholder' => $tag, 'required'=>'required', 'data-mask' => isset($mask) ? $mask : '', 'id'=>$name ]) !!}
		@else
			{!! Form::text($name, isset($default) ? $default : null, ['class' => 'form-control', 'placeholder' => $tag, 'required'=>'required', 'data-mask' => isset($mask) ? $mask : null, 'id'=>$name  ]) !!}
		@endif
	@endisset
	<span class="help-block {{$name}}_error">{{ isset($help) ? $help : ''}}</span>
	{!! $errors->first($name, '<small class="help-block">:message</small>') !!}
</div>