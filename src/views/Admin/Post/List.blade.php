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
      <li class="active">Blog Post List</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li><a href="#help" data-toggle="tab">Help</a></li>
            <li class="active"><a href="#basic" data-toggle="tab">Blog Posts</a></li>
            <li class="pull-left header"><i class="fa fa-envelope"></i> Blog Post List</li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              Actions <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('control.post.create') }}"><i class="fa fa-pencil-square-o"></i> New Blog Post</a></li>
              </ul>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="basic">
              <table id="posts" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Author</th>
                    <th>Last Update</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($posts as $post)
                  <tr>
                    <td><a href="{{ route('control.post.edit', $post->slug) }}" title="Edit {{ $post->title }}">{{ $post->title }}</a></td>
                    <td>!!{{ $post->status }}!!</td>
                    <td>!!{{ $post->author }}!!</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Author</th>
                    <th>Last Update</th>
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