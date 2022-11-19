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
    @include('sidebar')
    </div>
    <div class="main">
	<div class="row">
        <div class="col-md-12">
        <h4>Your Enrolled courses</h4>
        <div class="table-responsive">
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                   <th>id</th>
                    <th>Semester</th>
                    <th>student ID</th>
                    <th>Course name</th>
                    <th>Status</th>
                    <th>Approved</th>
                    <th>Canceled</th>
                   </thead>
    <tbody>
        @foreach ($enroll_req as $key => $data)
    <tr>
            <td>{{ $key + 1}}</td>
            <td>{{ $data -> semester }}</td>
            <td>{{ $data -> student_id }}</td>
            <td>{{ \App\Models\Courses::getCourseName($data -> course_id) }}</td>
            <td>
              {{ $data -> status }}
            </td>
            <td><a href="{{ url ('/approved/'.$data->id)}}" class = "btn btn-success">Approved</a></td>
            <td><a href="{{ url ('/canceled/'.$data->id)}}" class = "btn btn-danger">Canceled</a></td>
    </tr>
    @endforeach

    </tbody>
        
</table>

            </div>
        </div>
</body>
</html>