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
    <title>Document</title>
</head>
<body>
    <div>
        @include('sidebar')
    </div>
    <div class="main">
    <h2>Create Assignment</h2>
    @if(Session::has('msg'))
  <p class= "alert alert-success">{{ Session::get('msg')}}</p>
  @endif
  <form action="{{ url('/store-assignment-data') }}" method ="post" >
    @csrf
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Course Name:</label>
      <input type="name" class="form-control" id="course_name" placeholder="Enter assignment name" name="course_name">
    </div>
    <div class="form-group col-md-6">
      <label for="email">Assignment Name:</label>
      <input type="name" class="form-control" id="assignment_name" placeholder="Enter assignment name" name="assignment_name">
    </div>

    <div class="form-group col-md-6">
    <label for="birthday">Due submit:</label>
  <input type="date" class="form-control"  id="submit_date" name="submit_date"> 
    </div>

    <div class="form-group col-md-6">
    <label for="birthday">Due Time:</label>
  <input type="time" class="form-control"  id="submit_time" name="submit_time">
    </div>

    </div>
    
  <div class="form-group" my-3>
  
  <label for="email">Score out of:</label>
      <input type="name"  class="form-control" id="score" placeholder="Score" name="score">
  </div>
  <div class="form-group">
  <label for="comment">Instruction:</label>
  <textarea class="form-control" rows="5" name = "instruction" id="instruction"></textarea>
</div>
  <div class="form-group">
    <label for="">Attach figure</label>
    <input type="file" class="form-control-file"  name = "figure" id="figure">
  </div>
  <button type="submit" class="btn btn-primary btn-lg">Create</button>
  </form>
</div>
    </div>
</body>
</html>