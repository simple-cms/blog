@extends('admin::Admin/Base')

@section('content')

@if (isset($category))
{{ Form::model($category, ['method' => 'PUT', 'route' => ['control.category.update', $category->id], 'class' => 'form-horizontal']) }}
	{{ Form::hidden('id') }}
@else
	{{ Form::open(['method' => 'POST', 'route' => 'control.category.store', 'class' => 'form-horizontal']) }}
@endif

	<div class="control-group{{ $errors->has('title') ? ' error' : '' }}">
		{{ Form::label('title', Lang::get('blog::category.labelTitle'), ['class' => 'control-label']) }}
		<div class="controls">
			{{ Form::text('title', null, ['class' => 'input-xxlarge']) }}
			{{ $errors->first('title', '<p class="help-block">:message</p>') }}
			<p class="help-block">{{ Lang::get('blog::category.helpTitle') }}</p>
		</div>
	</div>

	<div class="control-group{{ $errors->has('slug') ? ' error' : '' }}">
		{{ Form::label('slug', Lang::get('blog::category.labelSlug'), ['class' => 'control-label']) }}
		<div class="controls">
			{{ Form::text('slug', null, ['class' => 'input-xxlarge']) }}
			{{ $errors->first('slug', '<p class="help-block">:message</p>') }}
			<p class="help-block">{{ Lang::get('blog::category.helpSlug') }}</p>
		</div>
	</div>

	<div class="control-group{{ $errors->has('description') ? ' error' : '' }}">
		{{ Form::label('description', Lang::get('blog::category.labelDescription'), ['class' => 'control-label']) }}
		<div class="controls">
			{{ Form::textarea('description', null, ['class' => 'input-xxlarge ckeditor']) }}
			{{ $errors->first('description', '<p class="help-block">:message</p>') }}
			<p class="help-block">{{ Lang::get('blog::category.helpDescription') }}</p>
		</div>
	</div>

	<div class="form-actions">
		{{ Form::submit(Lang::get('admin::misc.buttonSubmit'), ['class' => 'btn btn-primary']) }}
		<a href='{{ route('control.category.index') }}' class='btn'>{{ Lang::get('admin::misc.buttonCancel') }}</a>
	</div>
{{ Form::close() }}
@stop