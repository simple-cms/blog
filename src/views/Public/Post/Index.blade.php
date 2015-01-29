@extends('core::Public/Base')

@section('content')
<div class="container">
  <div class="row">
    @foreach ($posts as $post)
    <div class="col-md-12">
      <a href='{{ route(config('post.postURL') .'.show', $post->slug) }}' title='{{ $post->title }}'><h2>{{ $post->title }}</h2></a>
      <p><small>Posted
        @if ($post->category !== null)
        in {{ $post->category->title }}
        @endif
        on {{ $post->created_at }}
        @if ($post->updated_at != '0000-00-00 00:00:00')
        (last updated at {{ $post->updated_at }})
        @endif
      </small></p>
      <p>{{ $post->excerpt }}</p>
    </div>
    @endforeach
  </div>
</div>
@stop