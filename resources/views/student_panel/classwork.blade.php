<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <style>
       body{
    background: #eee;
}
span{
    font-size:13px;
}
a{
  text-decoration:none; 
  color: #0062cc;
  
}
.box{
    padding:50px 0px;
}

.box-part{
    background:#CCD1D1 ;
    border-radius:0;
    padding:40px 10px;
    margin:10px 0px;
}
.text{
    margin:10px 0px;
}

.fa{
     color:#4183D7;
} 
    </style>
    <title>Document</title>
</head>
<body>
<div>
    @include('student_panel/sidebarStu')
    </div>
<div class="main">
    <div class="container">
    <h4>Classwork</h4>
    
     	<div class="row">
         @foreach($query as $key=>$data)
			    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="box-part text-center">
						<div class="title">
							<h4>{{ \App\Models\Courses::getCourseName($data -> course_id)}}</h4>
						</div>
                        
						<div class="text">
							<span>CSE-334</span>
						</div>
                        
						<a href="{{ url ('/assignment-submission/'.$data->course_id)}}" class = "btn btn-info">View Classwork</a>
					 </div>
				</div>	
                @endforeach 
		</div>		
    </div>
    
</div>
</body>
</html>