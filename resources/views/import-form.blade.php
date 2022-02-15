 <div class="col-md-3">
							  
<form method="POST" action="{{route('student.csv')}}" class="needs-validation" enctype="multipart/form-data">
	@csrf
  <label for="fname">Import CSV</label><br>
  <input type="file" id="fname" name="file" value="John"><br>
  
  <input type="submit" value="Submit">
</form> 


							  </div>