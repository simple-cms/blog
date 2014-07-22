@extends('admin::Admin/Base')

@section('content')
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>{{ Lang::get('blog::category.labelTitle') }}</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($categories as $category)
		<tr>
			<td><a href='{{ route('control.category.edit', $category->id) }}'>{{ $category->title }}</td>
			<td>
				<a href='{{ route('control.category.edit', $category->id) }}' class="btn btn-small btn-primary">
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
<a href='{{ route('control.category.create') }}' class='btn'>{{ Lang::get('admin::misc.buttonCreate') }}</a>
{{ $categories->links() }}

@stop