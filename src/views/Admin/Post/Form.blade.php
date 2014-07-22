@extends('admin::Admin/Base')

@section('content')

@if (isset($post))
{{ Form::model($post, ['method' => 'PUT', 'route' => ['control.post.update', $post->id], 'class' => 'form-horizontal']) }}
	{{ Form::hidden('id') }}
	{{ Form::hidden('author_id') }}
@else
{{ Form::open(['method' => 'POST', 'route' => 'control.post.store', 'class' => 'form-horizontal']) }}
	{{ Form::hidden('author_id', Auth::user()->id) }}
@endif

	<div class="control-group{{ $errors->has('reference') ? ' error' : '' }}">
		{{ Form::label('reference', Lang::get('blog::post.labelReference'), ['class' => 'control-label']) }}
		<div class="controls">
			{{ Form::text('reference', null, ['class' => 'input-xxlarge']) }}
			{{ $errors->first('reference', '<p class="help-block">:message</p>') }}
			<p class="help-block">{{ Lang::get('blog::post.helpReference') }}</p>
		</div>
	</div>

	<div class="control-group{{ $errors->has('title') ? ' error' : '' }}">
	 {{ Form::label('title', Lang::get('blog::post.labelTitle'), ['class' => 'control-label']) }}
		<div class="controls">
			{{ Form::text('title', null, ['class' => 'input-xxlarge']) }}
			{{ $errors->first('title', '<p class="help-block">:message</p>') }}
			<p class="help-block">{{ Lang::get('blog::post.helpTitle') }}</p>
		</div>
	</div>

	<div class="control-group{{ $errors->has('description') ? ' error' : '' }}">
		{{ Form::label('description', Lang::get('blog::post.labelDescription'), ['class' => 'control-label']) }}
		<div class="controls">
			{{ Form::text('description', null, ['class' => 'input-xxlarge']) }}
			{{ $errors->first('description', '<p class="help-block">:message</p>') }}
			<p class="help-block">{{ Lang::get('blog::post.helpDescription') }}</p>
		</div>
	</div>

	<div class="control-group{{ $errors->has('slug') ? ' error' : '' }}">
		{{ Form::label('slug', Lang::get('blog::post.labelSlug'), ['class' => 'control-label']) }}
		<div class="controls">
			{{ Form::text('slug', null, ['class' => 'input-xxlarge']) }}
			{{ $errors->first('slug', '<p class="help-block">:message</p>') }}
			<p class="help-block">{{ Lang::get('blog::post.helpSlug') }}</p>
		</div>
	</div>

	<div class="control-group{{ $errors->has('category_id') ? ' error' : '' }}">
		{{ Form::label('category_id', Lang::get('blog::post.labelCategory'), ['class' => 'control-label']) }}
		<div class="controls">
			{{ Form::select('category_id', $categories) }}
			{{ $errors->first('category_id', '<p class="help-block">:message</p>') }}
			<p class="help-block">{{ Lang::get('blog::post.helpCategory') }}</p>
		</div>
	</div>

	<div class="control-group{{ $errors->has('status') ? ' error' : '' }}">
		{{ Form::label('status', Lang::get('blog::post.labelStatus'), ['class' => 'control-label']) }}
		<div class="controls">
			{{ Form::select('status', ['1' => Lang::get('admin::misc.stateLive'), '0' => Lang::get('admin::misc.stateHidden')]) }}
			{{ $errors->first('status', '<p class="help-block">:message</p>') }}
			<p class="help-block">{{ Lang::get('blog::post.helpStatus') }}</p>
		</div>
	</div>

	<div class="control-group{{ $errors->has('content') ? ' error' : '' }}">
		{{ Form::label('content', Lang::get('blog::post.labelContent'), ['class' => 'control-label']) }}
		<div class="controls">
			{{ Form::textarea('content', null, ['class' => 'input-xxlarge ckeditor']) }}
			{{ $errors->first('content', '<p class="help-block">:message</p>') }}
			<p class="help-block">{{ Lang::get('blog::post.helpContent') }}</p>
		</div>
	</div>

	<div class="form-actions">
		{{ Form::submit(Lang::get('admin::misc.buttonSubmit'), ['class' => 'btn btn-primary']) }}
		<a href='{{ route('control.post.index') }}' class='btn'>{{ Lang::get('admin::misc.buttonCancel') }}</a>
	</div>
{{ Form::close() }}
@stop