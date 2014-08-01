@extends('core::Admin/Base')

@section('content')
<aside class="right-side">
  <section class="content-header">
    <h1>
      Blog Posts
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('control.post.index') }}">Blog Posts</a></li>
      <li class="active">Edit Blog Post</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li><a href="#help" data-toggle="tab">Help</a></li>
            <li><a href="#info" data-toggle="tab">Information</a></li>
            <li><a href="#seo" data-toggle="tab">SEO</a></li>
            <li class="active"><a href="#basic" data-toggle="tab">Basic</a></li>
            <li class="pull-left header"><i class="fa fa-envelope"></i> Editing Post: {{ $post->title }}</li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              Actions <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-eye"></i> Preview</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-bar-chart-o"></i> Statisctics</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="basic">
            @include('core::Admin/Partials/FlashMessages')

            @if (isset($post))
              {{ Form::model($post, ['method' => 'PUT', 'route' => ['control.post.update', $post->slug], 'role' => 'form']) }}
              {{ Form::hidden('author_id', 1) }}
            @else
              {{ Form::open(['method' => 'POST', 'route' => 'control.post.store', 'role' => 'form']) }}
              {{ Form::hidden('author_id', 1) }}
            @endif
              <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control']) }}
                {{ $errors->first('title', '<p class="text-red">:message</p>') }}
              </div>
              <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                {{ Form::label('excerpt', 'Excerpt:') }}
                {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'placeholder' => 'The Blog Post\'s excerpt', 'rows' => 5]) }}
                {{ $errors->first('excerpt', '<p class="text-red">:message</p>') }}
              </div>
              <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                {{ Form::label('content', 'Content:') }}
                {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'The Blog Post\'s content', 'rows' => 15]) }}
                {{ $errors->first('content', '<p class="text-red">:message</p>') }}
              </div>
            </div>
            <div class="tab-pane" id="seo">
              <div class="form-group {{ $errors->has('meta_title') ? 'has-error' : '' }}">
                {{ Form::label('meta_title', 'META Title:') }}
                {{ Form::text('meta_title', null, ['class' => 'form-control']) }}
                {{ $errors->first('meta_title', '<p class="text-red">:message</p>') }}
              </div>
              <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                {{ Form::label('meta_description', 'META Description:') }}
                {{ Form::text('meta_description', null, ['class' => 'form-control']) }}
                {{ $errors->first('meta_description', '<p class="text-red">:message</p>') }}
              </div>
            </div>
            <div class="tab-pane" id="info">
              <div class="form-group">
                {{ Form::label('created_at', 'Created at:') }}
                {{ Form::text('created_at', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
              </div>
              <div class="form-group">
                {{ Form::label('updated_at', 'Last updated:') }}
                {{ Form::text('updated_at', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
              </div>
            </div>
            <div class="tab-pane" id="help">
              The European languages are members of the same family. Their separate existence is a myth.
              For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
              in their grammar, their pronunciation and their most common words. Everyone realizes why a
              new common language would be desirable: one could refuse to pay expensive translators. To
              achieve this, it would be necessary to have uniform grammar, pronunciation and more common
              words. If several languages coalesce, the grammar of the resulting language is more simple
              and regular than that of the individual languages.
            </div>
            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </section>
</aside>
@stop