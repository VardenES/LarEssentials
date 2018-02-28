@extends('layouts.master')

@section('header')
	<a href="{{ url('/') }}">Back to overview</a>
	<h2>{{ $cat->name }}</h2>
	<a href="{{ url('cats/'.$cat->id.'/edit') }}">
		<span class="glyphicon glyphicon-edit"></span>
		Edit
	</a>
	<a href="{{ url('cats/'.$cat->id.'/delete') }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure?">
		<span class="glyphicon glyphicon-trash"></span>
		Delete
	</a>

	<form method="POST" action="{{ url('cats/'.$cat->id.'/delete') }}">
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	    <input type="hidden" name="_method" value="DELETE">
	    <span class="glyphicon glyphicon-trash"></span>
    <button type="submit">Delete</button>
	</form>


	<p>Last edited: {{ $cat->updated_at }}</p>
@stop

@section('content')
	<p>Date of Birth: {{ $cat->date_of_birth }}</p>
	<p>
		@if ($cat->breed)
			Breed:
			<a href="{{ url('cats/breeds/'.$cat->breed->name) }}">{{ $cat->breed->name }}</a>
		@endif
	</p>
@stop
