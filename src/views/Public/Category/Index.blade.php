@extends('core::Public/Base')

@section('content')
  @foreach ($posts as $post)
  <div class="row">
    <div class="span12">
      <a href='{{ route('blog.show', $post->slug) }}' title='{{ $post->title }}'><h2>{{ $post->title }}</h2></a>
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
  </div>
  <hr />
  @endforeach

@stop