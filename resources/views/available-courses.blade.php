<!DOCTYPE html>
<html lang="en">
<head>
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
	<div class="row">

        <div class="col-md-12">
        <h4>Available courses</h4>
        @if(Session::has('msg'))
  <p class= "alert alert-success">{{ Session::get('msg')}}</p>
  @endif
        <div class="table-responsive">
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                   <th>id</th>
                    <th>Semester</th>
                    <th>Course name</th>
                    <th>Course code</th>
                    <th>Action</th>
                   </thead>
    <tbody>
        @foreach($available_course as $key=>$data)
    <tr>
            <td>{{ $key + 1}}</td>
            <td>{{ $data-> semester }}</td>
            <td>{{ $data-> course_name}}</td>
            <td>{{ $data-> course_code}}</td>
            <td>
             <a href="{{ url ('/edit-course/'.$data->id)}}" class = "btn btn-success">Edit</a>
             <a href="{{ url ('/delete-course/'.$data->id)}}" onclick = "return confirm('Are you sure to delete')" class= "btn btn-danger">Delete</a>
            </td>
    </tr>
     @endforeach
    </tbody>
 
</table>
    {{ $available_course->links() }}
            </div>
            
        </div>
</body>
</html>