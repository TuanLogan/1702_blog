@extends('layouts.admin')
@section('title', 'Category management')
@section('content')
	<div class="col-sm-12">
		<form action="{{route('cate.save')}}" method="post" novalidate>
			{{csrf_field()}}
			<input type="hidden" name="id" value="{{$model->id}}">
			<div class="form-group">
				<label for="title">Title</label>
				<input id="title" type="text" 
					value="{{old('title', $model->title)}}" name="title" class="form-control" placeholder="Post title">
				@if (count($errors) > 0)
					<span class="text-danger">{{$errors->first('title')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="cate-parent">Category</label>
				<select name="cate_id" class="form-control">
					<option value="0">--------------</option>
					@foreach ($listCate as $key => $value)
						@php
							$key = str_replace("x", "", $key);
							$selected = $model->cate_id == $key ? "selected" : null;
						@endphp

						<option value="{{$key}}" {{$selected}}>{{$value}}</option>
					@endforeach
				</select>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-success">Submit</button>
				<a href="{{route('cate.list')}}" class="btn btn-warning">Cancel</a>
			</div>
		</form>

	</div>

@endsection