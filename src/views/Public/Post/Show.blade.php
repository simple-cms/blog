@extends('core::Public/Base')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>{{ $post->title }}</h2>
      <p><small>Posted
        @if ($post->category !== null)
        in {{ $post->category->title }}
        @endif
        on {{ $post->created_at }}
        @if ($post->updated_at != '0000-00-00 00:00:00')
        (last updated at {{ $post->updated_at }})
        @endif
      </small></p>
      <blockquote>{{ $post->excerpt }}</blockquote>
      {{ $post->content }}
      <hr />
    </div>
  </div>
</div>
@stop