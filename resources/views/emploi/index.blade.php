@extends('master')
  @section('content')
  <div class="row">
  	<div class="col-md-12">
  		<h1>Index page</h1>
  	</div>
  </div>

  <div class="row">
  		<?php $no=1; ?>
      <div class="row text-right">
        
      <a href="{{route('emploi.create')}}" class='btn btn-primary'>Create New Blog post</a>
      </div>
      <hr>
    <table class="table table-stripped">
      <tr>
        <td>Id </td>
        <td>JOBURL </td>
        <td>POSITION </td>
        <td>Actions </td>
      </tr>


  		@foreach($emplois as $emploi)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$emploi->JOBURL}}</td>
				<td>{{$emploi->POSITION}}</td>
				<td>
					<form class='' method='post' action="{{route('emploi.destroy', $emploi->id)}}">
						<input type="hidden" name='_method' value='delete'>
						<input type="hidden" name='_token' value='{{ csrf_token() }}'>
						<a href="{{route('emploi.edit', $emploi->id)}}" class='btn btn-primary'>Edit</a>
						<input type="submit" class='btn btn-danger' onclick="return confirm('Are you sure that you want to delete this button')" name='delete' value='delete'>
					</form>
				</td>
			</tr>
  		@endforeach
  	</table>
  </div>

  @stop