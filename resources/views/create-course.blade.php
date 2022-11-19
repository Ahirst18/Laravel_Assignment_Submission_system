<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
   
<!------ Include the above in your HEAD tag ---------->
        <style>

    </style>
</head>
<body>

    <div>
    @include('sidebar')
    </div>
<div class="main">
<h2>Create Course</h2>
  @if(Session::has('msg'))
  <p class= "alert alert-success">{{ Session::get('msg')}}</p>
  @endif
  <form action="{{ url('/store-course') }}" method="post" >
    @csrf
    <div class="form-group">
      <label for="pwd">Select semester:</label>
    <select class="form-control" id="sem" name="sem">
          <option selected>Semester</option>
          <option value="1">1st</option>
          <option value="2">2nd</option>
          <option value="3">3rd</option>
          <option value="4">4th</option>
          <option value="5">5th</option>
          <option value="6">6th</option>
          <option value="7">7th</option>
          <option value="8">8th</option>
   </select>
      @error('sem')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group">
      <label for="pwd">Course name:</label>
      <input type="txt" class="form-control" id="course" placeholder="Enter course name" name="courseName">
      @error('courseName')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group">
      <label for="pwd">Course code:</label>
      <input type="txt" class="form-control" id="course" placeholder="Enter course code" name="courseCode">
      @error('courseCode')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
	</div>
</div>
</body>
</html>