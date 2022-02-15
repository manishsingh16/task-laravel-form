
	
	<meta name="csrf-token" content="{{ csrf_token() }}" /><!--Data Tables -->
	<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
	
	

			
						<div class="container">
							<div clas="row">
								<div class="col-md-3">
								<div class="ml-auto">
							<div class="btn-group">
								<a href ="{{url('/addstudent')}}" class="btn btn-primary">Add Student </a>
							</div>
						</div>
			
								</div>

                              <div class="col-md-3">
							  <div class="ml-auto">
							<div class="btn-group">
								<a href ="{{url('/export-csv')}}" class="btn btn-primary">Download Csv  </a>
							</div>
						</div>

							  </div>
							  <div class="col-md-3">
							  <div class="ml-auto">
							<div class="btn-group">
								<a href ="{{url('/export-excel')}}" class="btn btn-primary">Download Excel  </a>
							</div>
						</div>

							  </div>
							   <div class="col-md-3">
							  
<form method="POST" action="{{route('student.csv')}}" class="needs-validation" enctype="multipart/form-data">
	@csrf
  <label for="fname">Import CSV</label><br>
  <input type="file" id="fname" name="file" value="John"><br>
  
  <input type="submit" value="Submit">
</form> 


							  </div>
							 
							</div>

						</div>
				
						
							<hr/>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>S.No.</th>
                                            <th>Name</th>
											<th>Email</th>
											<th>Contact no</th>
											<th>Image</th>
											<th>Status</th>
											
											<th>Date Added</th>
										</tr>
									</thead>
									<tbody>
										@foreach($artist as $sd=>$keys)
										<tr>
											<td>{{$sd+1}}</td>
                                            <td>{{$keys->name}}</td>
											<td>{{$keys->email}}</td>
											<td>{{$keys->contact_no}}</td>
											<td><img src="{{$keys->upload}}" width="100" height="100"></td>
											
											<td> 
										

								 
								<select name="status" id="status"   onchange="changeUserStatus({{$keys->id}})"  class="toggle-class" class=" form-controlcol-sm-6 @error('city') is-invalid @enderror" required>
						<option value="1" <?php if(@$keys->status == 1){echo "selected";}?>>Active</option>
						<option value="0" <?php if(@$keys->status === 0){echo "selected";}?>>Inactive</option>
						<option value="2" <?php if(@$keys->status === 2){echo "selected";}?>>Approved</option>
								
							</select>
						
							
									</td>
											<td>{{date('d-M-Y', strtotime($keys->created_at)) }}</td>
											
										</tr>
										@endforeach
										
									</tbody>
								</table>
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

	
			

<script type="text/javascript">
	
function changeUserStatus(id,status) {
	
     var status = $('#status').val();
   
    $.ajax({
        url: `/api/change-status`,
        type: 'post',
        data: {
    
            id: id,
            status: status 
        },
        success: function (result) {

        }
    });
}

</script>

