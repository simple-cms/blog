@extends('core::Admin/Base')

@section('content')
<aside class="right-side">
  <section class="content-header">
    <h1>
      Blog Posts
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('control.post.index') }}">Posts</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box {{ $errors->count() ? 'box-danger' : 'box-primary' }}">
          <div class='box-header'>
            <h3 class='box-title'>Editing Post: {{ $post->title }}</h3>
            <div class="box-tools">
              <a href="{{ route('control.post.destroy', $post->slug) }}" title="Delete {{ $post->title }}" class="btn btn-danger">Delete</a>
            </div>
          </div>
          <div class="box-body">
            @include('core::Admin/Partials/FlashMessages')

          @if (isset($post))
            {{ Form::model($post, ['method' => 'PUT', 'route' => ['control.post.update', $post->slug], 'role' => 'form']) }}
            {{ Form::hidden('author_id', 1) }}
          @else
            {{ Form::open(['method' => 'POST', 'route' => 'control.post.store', 'role' => 'form']) }}
            {{ Form::hidden('author_id', 1) }}
          @endif
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
              {{ Form::label('title', 'Title') }}
              {{ Form::text('title', null, ['class' => 'form-control']) }}
              {{ $errors->first('title', '<p class="text-red">:message</p>') }}
            </div>
            <div class="form-group {{ $errors->has('meta_title') ? 'has-error' : '' }}">
              {{ Form::label('meta_title', 'META Title') }}
              {{ Form::text('meta_title', null, ['class' => 'form-control']) }}
              {{ $errors->first('meta_title', '<p class="text-red">:message</p>') }}
            </div>
            <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
              {{ Form::label('meta_description', 'META Description') }}
              {{ Form::text('meta_description', null, ['class' => 'form-control']) }}
              {{ $errors->first('meta_description', '<p class="text-red">:message</p>') }}
            </div>
            <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
              {{ Form::label('excerpt', 'Excerpt') }}
              {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'placeholder' => 'The Blog Post\'s excerpt', 'rows' => 5]) }}
              {{ $errors->first('excerpt', '<p class="text-red">:message</p>') }}
            </div>
            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
              {{ Form::label('content', 'Content') }}
              {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'The Blog Post\'s content', 'rows' => 15]) }}
              {{ $errors->first('content', '<p class="text-red">:message</p>') }}
            </div>
          </div>
          <div class="box-footer">
            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </section>
</aside>
@stop