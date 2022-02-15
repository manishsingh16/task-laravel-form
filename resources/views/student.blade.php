
<!--Data Tables -->
	<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
	
	<div class="container">
	<h1 class="page-title">Students Add Form</h1>
	<div class="" style="margin-bottom:10px;margin-top:15px;">
	</div>
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				
				<div class="card-header">Add</div>
				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert">×</button>
							{{ session('status') }}
						</div>
					@elseif(session('failed'))
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert">×</button>
							{{ session('failed') }}
						</div>
					@endif

					<form method="POST" action="{{ url('/createStudent') }}" class="needs-validation" enctype="multipart/form-data" novalidate>
						@csrf
						<div class="form-group">
							<label>First Name:</label>
							<input type="text" name="name" id="name" class=" form-control col-sm-6 @error('name') is-invalid @enderror" placeholder=" Name" value="{{ old('name') }}" required />
							@error('name')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						  
						</div> <br>
						<div class="form-group">
							<label>Email:</label>
							<input type="text" name="email" id="email" class=" form-control col-sm-6 @error('email') is-invalid @enderror"  value="{{ old('email') }}" required />
							@error('email')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						  
						</div> <br>
						<div class="form-group">
							<label>Contact no:</label>
							<input type="email" name="contact_no" id="email_id" class="form-control col-sm-6 @error('email') is-invalid @enderror" value="{{ old('contact_no') }}" required / >
							@error('email')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div> <br>
						<div class="form-group">
							<label>Image Upload:</label>
							<input type="file" name="upload" id="upload" class="form-control col-sm-6 @error('upload') is-invalid @enderror"  value="{{ old('upload') }}" required / >
							@error('upload')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div> <br>
						<div class="form-group">
							<label>Status:</label>
							<select name="status" id="status" class=" form-control col-sm-6 @error('status') is-invalid @enderror" required>
								<option value="0">Inactive</option>
								<option value="1">active</option>
								<option value="2">Approved</option>
								
							</select>
						</div> <br>
						<button type="submit" class="btn btn-primary">Save</button>
					  </form>				   
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<!--Data Tables js-->
	<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	