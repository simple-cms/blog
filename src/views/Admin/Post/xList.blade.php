@extends('admin::Admin/Base')

@section('content')
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>{{ Lang::get('blog::post.labelReference') }}</th>
			<th>{{ Lang::get('blog::post.labelAuthor') }}</th>
			<th>{{ Lang::get('blog::post.labelCategory') }}</th>
			<th>{{ Lang::get('blog::post.labelStatus') }}</th>
			<th>{{ Lang::get('blog::post.labelLastModified') }}</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($posts as $post)
		<tr>
			<td><a href='{{ route('control.post.edit', $post->id) }}'>{{ $post->reference }}</td>
			<td>{{ $post->author->username }}</td>
			@if ($post->category === null)
			<td>{{ Lang::get('blog::post.noCategory') }}</td>
			@else
			<td><a href='{{ route('control.category.edit', $post->category_id) }}'>{{ $post->category->title }}</td>
			@endif
			@if ($post->status == 1)
			<td><span class="label label-success">{{ Lang::get('admin::misc.stateLive') }}</span></td>
			@elseif ($post->status == 0)
			<td><span class="label">{{ Lang::get('admin::misc.stateHidden') }}</span></td>
			@endif
			<td>{{ $post->updated_at }}</td>
			<td>
				<a href='{{ route('control.post.edit', $post->id) }}' class="btn btn-small btn-primary">
					<i class="icon-pencil"></i>
				</a>
				<a href='' class="btn btn-small">
					<i class='icon-search'></i>
				</a>
				<a href='' class="btn btn-small btn-danger">
					<i class='icon-remove'></i>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<a href='{{ route('control.post.create') }}' class='btn'>{{ Lang::get('admin::misc.buttonCreate') }}</a>
{{ $posts->links() }}

@stop