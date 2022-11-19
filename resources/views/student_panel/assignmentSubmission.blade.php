<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!------ Include the above in your HEAD tag ---------->
        <style>

    </style>
</head>
<body>

    <div>
    @include('student_panel/sidebarStu')
    </div>
<div class="main">
  @if(count($query) > 0)
@foreach($query as $key=>$data)
    <div class ="container">
   
<h1>Assignment - {{ $data-> course_name }} </h1>
<div class = "form-row" style = "margin-left: .1%;" >
        <label>Name : </label> <p >{{ $data-> assignment_name }}</p>
     <div class = "form-row" style = "margin-left: 50%;" >
        <label>Assign Date : </label> <p >{{ $data-> created_at}}</p>
    </div>
</div>
        <div class = "form-row" style = "margin-left: 0.1%;" >
            <label>Due Date : </label> <p>{{ $data-> submit_date }} {{ $data-> submit_time }}</p>
            <div class = "form-row" style = "margin-left: 50%;" >
        <label>Score : </label> <p >{{ $data-> score }}</p>
    </div>
        </div>
        
<hr>
<div>

    <button type="button" class="btn btn-secondary btn-lg btn-block" data-toggle="modal" data-target="#myModal">Click here to view assignment - Computer network</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>- {{ $data-> instruction }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <div class="form-group" style = "margin-top: 1%;" >
  <form method= "post" action = "{{ url('/store-work')}}" enctype="multipart/form-data" >
    @csrf
    @if(Session::has('msg'))
  <p class= "alert alert-success">{{ Session::get('msg')}}</p>
  @endif
  <h1>Submit your assignment </h1>
    <div class="form-group">
    <label class="form-label">Your ID:</label>
    <input type="txt" class="form-control" id="stu_id" placeholder="Enter your ID" name="stu_id">
 </div>
      <label for="formFileDisabled" class="form-label">Add file/answer:</label>
<input class="file"  type="file" id="view_work" name = "view_work"/>

    </div>
</div>
<button type="submit" class="btn btn-primary btn-lg">Submit</button>
	</div>
  </div>
</form>

@endforeach
@else
      <h3>No Assignment available for this course</h3> 
      @endif
    </div>
</div>
</body>
</html>
