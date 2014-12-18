@extends('core::Admin/Base')

@section('content')
<aside class="right-side">
  <section class="content-header">
    <h1>
      {{ Lang::get('blog::post.plural') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> {{ Lang::get('core::core.dashboard') }}</a></li>
      <li><a href="{{ route(Config::get('core::adminURL') .'.'. Config::get('blog::postURL') .'.index') }}">{{ Lang::get('blog::post.plural') }}</a></li>
      <li class="active">{{ Lang::get('blog::post.singular') }} {{ Lang::get('core::core.list') }}</li>
    </ol>
  </section>

  <section class="content">

    @include('core::Admin/Partials/FlashMessages')

    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li><a href="#help" data-toggle="tab">{{ Lang::get('core::core.help') }}</a></li>
            <li class="active"><a href="#basic" data-toggle="tab">{{ Lang::get('blog::post.plural') }}</a></li>
            <li class="pull-left header"><i class="fa fa-envelope"></i> {{ Lang::get('blog::post.singular') }} {{ Lang::get('core::core.list') }}</li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              {{ Lang::get('core::core.actions') }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route(Config::get('core::adminURL') .'.'. Config::get('blog::postURL') .'.create') }}"><i class="fa fa-pencil-square-o"></i> {{ Lang::get('core::core.create') }} {{ Lang::get('blog::post.singular') }}</a></li>
              </ul>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="basic">
              <table id="posts" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>{{ Lang::get('core::core.title') }}</th>
                    <th>{{ Lang::get('core::core.status') }}</th>
                    <th>{{ Lang::get('core::core.author') }}</th>
                    <th>{{ Lang::get('blog::category.singular') }}</th>
                    <th>{{ Lang::get('core::core.updated') }}</th>
                    <th>{{ Lang::get('core::core.actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($posts))
                  @foreach($posts as $post)
                  <tr>
                    <td><a href="{{ route(Config::get('core::adminURL') .'.'. Config::get('blog::postURL') .'.edit', [$post->id]) }}">{{ $post->title }}</a></td>
                    @if($post->hidden == 1)
                    <td><span class="badge bg-red">{{ Lang::get('core::core.hidden') }}</span></td>
                    @else
                    <td><span class="badge bg-green">{{ Lang::get('core::core.visible') }}</span></td>
                    @endif
                    <td>!!{{ $post->author }}!!</td>
                    <td>
                      @if(!is_null($post->category))
                        <a href="{{ route(Config::get('core::adminURL') .'.'. Config::get('blog::postURL') .'.edit', [$post->category->id]) }}">{{ $post->category->title }}</a>
                      @else
                        {{ Lang::get('core::core.none') }}
                      @endif
                    </td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                    <td>
                    {!! Form::open(['route' => [Config::get('core::adminURL') .'.'. Config::get('blog::postURL') .'.destroy', $post->id], 'method' => 'delete']) !!}
                      <div class="btn-group">
                        <a href="{{ route(Config::get('core::adminURL') .'.'. Config::get('blog::postURL') .'.edit', [$post->id]) }}" class="btn btn-info">{{ Lang::get('core::core.edit') }}</a>
                        <a href="{{ route(Config::get('blog::postURL') .'.show', [$post->slug]) }}" class="btn btn-success" target="_blank">{{ Lang::get('core::core.preview') }}</a>
                        {!! Form::submit(Lang::get('core::core.destroy'), ['class' => 'btn btn-danger']) !!}
                      </div>
                    {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="6">{!! Lang::get('core::core.missing', ['model' => Lang::get('blog::post.plural'), 'link' => link_to_route(Config::get('core::adminURL') .'.'. Config::get('blog::postURL') .'create', 'click here')]) !!}
                  </tr>
                @endif
                </tbody>
                <tfoot>
                  <tr>
                    <th>{{ Lang::get('core::core.title') }}</th>
                    <th>{{ Lang::get('core::core.status') }}</th>
                    <th>{{ Lang::get('core::core.author') }}</th>
                    <th>{{ Lang::get('blog::category.singular') }}</th>
                    <th>{{ Lang::get('core::core.updated') }}</th>
                    <th>{{ Lang::get('core::core.actions') }}</th>
                  </tr>
                </tfoot>
              </table>
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
          </div>
        </div>
      </div>
    </div>
  </section>
</aside>
@stop