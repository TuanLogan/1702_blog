@extends('layouts.admin')
@section('title', 'Category management')
@section('content')
	<div class="col-sm-12">
		<form action="{{route('cate.list')}}" method="get" class="form-inline col-sm-4" >
			<div class="form-group">
				<label for="">Search</label>
				<input type="text" value="{{$keyword}}" class="form-control" name="keyword">
				<button type="submit" class="btn btn-sm btn-info">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</div>
			
		</form>
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Cate name</th>
				<th>Parent name</th>
				<th> 
					<a href="{{route('cate.create')}}" class="btn btn-xs btn-success">Create</a>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($cates as $element)
				<tr>
					<td>{{++$loop->index}}</td>
					<td>{{$element->cate_name}}</td>
					<td>{{$element->getParentName()}}</td>
					<td>
						<a href="" class="btn btn-xs btn-info">Edit</a>
						<a href="{{route('cate.remove', ['id' => $element->id])}}" class="btn btn-xs btn-danger">Remove</a>
					</td>
				</tr>
			@endforeach
			<tr>
				<td colspan="4" class="text-center">
					{{ $cates->links() }}
				</td>
			</tr>
			
		</tbody>
	</table>

@endsection



