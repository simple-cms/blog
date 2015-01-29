@extends('core::Admin/Base')

@section('content')
<aside class="right-side">
  <section class="content-header">
    <h1>
      {{ trans('blog::post.plural') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.dashboard') }}</a></li>
      <li><a href="{{ route(config('core.adminURL') .'.'. config('post.postURL') .'.index') }}">{{ trans('blog::post.plural') }}</a></li>
      <li class="active">{{ isset($post) ? trans('core::core.edit') : trans('core::core.create') }} {{ trans('blog::post.singular') }}</li>
    </ol>
  </section>

  <section class="content">

    @include('core::Admin/Partials/FlashMessages')

    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li><a href="#info" data-toggle="tab">{{ trans('core::core.info')}}</a></li>
            <li><a href="#seo" data-toggle="tab">{{ trans('core::core.seo')}}</a></li>
            <li class="active"><a href="#basic" data-toggle="tab">{{ trans('core::core.basics')}}</a></li>
            <li class="pull-left header"><i class="fa fa-envelope"></i> {{ isset($post) ? trans('core::core.editing', ['model' => trans('blog::post.singular'), 'name' => $post->title]) : trans('core::core.create') .' '. trans('blog::post.singular') }}</li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              {{ trans('core::core.actions')}} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                @if (isset($post))
                <li role="presentation"><a href="{{ route(config('post.postURL') .'.show', [$post->slug]) }}" target="_blank" role="menuitem" tabindex="-1" href="#"><i class="fa fa-eye"></i> {{ trans('core::core.preview')}}</a></li>
                @endif
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-bar-chart-o"></i> {{ trans('core::core.stats')}}</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-trash-o"></i> {{ trans('core::core.destroy')}}</a></li>
              </ul>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="basic">
            @if (isset($post))
              {!! Form::model($post, ['method' => 'PUT', 'route' => [config('core.adminURL') .'.'. config('post.postURL') .'.update', $post->id], 'role' => 'form']) !!}
              {!! Form::hidden('author_id', '1') !!}
            @else
              {!! Form::open(['method' => 'POST', 'route' => config('core.adminURL') .'.'. config('post.postURL') .'.store', 'role' => 'form']) !!}
              {!! Form::hidden('author_id', '1') !!}
            @endif
              <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                {!! Form::label('title', trans('core::core.title')) !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                {!! $errors->first('title', '<p class="text-red">:message</p>') !!}
              </div>
              <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                {!! Form::label('category_id', trans('blog::category.singular')) !!}
                {!! Form::select('category_id', $categories, isset($post) ? $post->category_id : null, ['class' => 'form-control']) !!}
                {!! $errors->first('category_id', '<p class="text-red">:message</p>') !!}
              </div>
              <div class="form-group {{ $errors->has('hidden') ? 'has-error' : '' }}">
                {!! Form::label('hidden', trans('core::core.hidden')) !!}
                {!! Form::select('hidden', [
                  0 => 'Visible',
                  1 => 'Hidden',
                ], null, ['class' => 'form-control']) !!}
                {!! $errors->first('hidden', '<p class="text-red">:message</p>') !!}
              </div>
              <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                {!! Form::label('excerpt', trans('core::core.excerpt')) !!}
                {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => 5]) !!}
                {{ $errors->first('excerpt', '<p class="text-red">:message</p>') }}
              </div>
              <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                {!! Form::label('content', trans('core::core.content')) !!}
                {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 15]) !!}
                {!! $errors->first('content', '<p class="text-red">:message</p>') !!}
              </div>
            </div>
            <div class="tab-pane" id="seo">
              <div class="form-group {{ $errors->has('meta_title') ? 'has-error' : '' }}">
                {!! Form::label('meta_title', trans('core::seo.meta_title')) !!}
                {!! Form::text('meta_title', null, ['class' => 'form-control']) !!}
                {!! $errors->first('meta_title', '<p class="text-red">:message</p>') !!}
              </div>
              <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                {!! Form::label('meta_description', trans('core::seo.meta_description')) !!}
                {!! Form::text('meta_description', null, ['class' => 'form-control']) !!}
                {!! $errors->first('meta_description', '<p class="text-red">:message</p>') !!}
              </div>
              <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                {!! Form::label('slug', trans('core::core.slug')) !!}
                {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                {!! $errors->first('slug', '<p class="text-red">:message</p>') !!}
              </div>
            </div>
            <div class="tab-pane" id="info">
              <div class="form-group">
                {!! Form::label('created_at', trans('core::core.created')) !!}
                {!! Form::text('created_at', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('updated_at', trans('core::core.updated')) !!}
                {!! Form::text('updated_at', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
              </div>
            </div>
            {!! Form::submit(trans('core::core.save'), ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </section>
</aside>
@stop