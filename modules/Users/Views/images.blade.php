@extends('layouts.default')

@section('content')
	<div class="content">
		@include('partials/messages')
		<div class="card">
			<div class="card-header">
				<h2>Images</h2>
				<form action="" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="">Upload Image</label>
						<input type="file" name="images[]" class="form-control" multiple>
					</div>
					<button type="submit" class="btn btn-primary">Upload</button>
				</form>
			</div>
			<div class="card-body">
				<hr>
				<div class="row">
					<div class="col-md-12">
						<strong>{{ $images->currentPage()*$images->perPage().' of '.$images->total() }}</strong>
					</div>
					@foreach($images as $key=>$image)
						<div class="col-md-4">
							<img src="{{ asset('storage/'.$image->image) }}" alt="" width="100">
							<br>
							<a href="{{ route('images.destroy', $image->id) }}" class="btn btn-danger"><i class="icon icon-trash"></i></a>
						</div>
					@endforeach
				</div>

			</div>
			<div class="card-footer">
				{{ $images->links() }}
			</div>
		</div>
	</div>
@endsection