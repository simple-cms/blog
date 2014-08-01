@extends('core::Admin/Base')

@section('content')
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
  <section class="content-header">
    <h1>
      Blog
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('control.post.index') }}">Posts</a></li>
      <li class="active">List</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class='box-header'>
            <h3 class='box-title'>Post List</h3>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive">

            @include('core::Admin/Partials/FlashMessages')

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
        </div>
      </div>
    </div>
  </section>
</aside>
@stop