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
    <style>
        /*	Reset & General
---------------------------------------------------------------------- */
* { margin: 0px; padding: 0px; }
body {
	background: #ecf1f5;
	font:14px "Open Sans", sans-serif; 
	text-align:center;
}

.tile{
	width: 100%;
	background: #fff;
	border-radius:5px ;
	box-shadow:0px 2px 3px -1px rgba(151, 171, 187, 0.7);
	float:left;
  	transform-style: preserve-3d;
  	margin: 10px 5px;

}

.header{
	border-bottom:1px solid #707171  ;
	padding:10px 0;
	text-align:center;
	color:#59687f;
	font-size:600;
	font-size:19px;	
	position:relative;
}

.banner-img {
	padding: 5px 5px 0;
}

.banner-img img {
	width: 100%;
	border-radius: 5px;
}

.dates{
	border:1px solid #ebeff2;
	border-radius:5px;
	padding:20px 0px;
	margin:10px 20px;
	font-size:16px;
	color:#5aadef;
	font-weight:600;	
	overflow:auto;
}
.dates div{
	float:left;
	width:50%;
	text-align:center;
	position:relative;
}
.dates strong,
.stats strong{
	display:block;
	color:#adb8c2;
	font-size:11px;
	font-weight:700;
}
.dates span{
	width:1px;
	height:40px;
	position:absolute;
	right:0;
	top:0;	
	background:#ebeff2;
}
.stats{
	border-top:1px solid #ebeff2;
	background:#f7f8fa;
	overflow:auto;
	padding:15px 0;
	font-size:16px;
	color:#59687f;
	font-weight:600;
	border-radius: 0 0 5px 5px;
}
.stats div{
	border-right:1px solid #ebeff2;
	padding:10px 0;
	float:left;
	text-align:justify
}

.stats div:nth-of-type(3){border:none;}

div.footer {
	text-align: right;
	position: relative;
	margin: 20px 5px;
}

div.footer a.Cbtn{
	padding: 10px 25px;
	background-color: #DADADA;
	color: #666;
	margin: 10px 2px;
	text-transform: uppercase;
	font-weight: bold;
	text-decoration: none;
	border-radius: 3px;
}

div.footer a.Cbtn-primary{
	background-color: #5AADF2;
	color: #FFF;
}

div.footer a.Cbtn-primary:hover{
	background-color: #7dbef5;
}

div.footer a.Cbtn-danger{
	background-color: #fc5a5a;
	color: #FFF;
}

div.footer a.Cbtn-danger:hover{
	background-color: #fd7676;
}
    </style>
</head>
<body>
<div class="col-md-4 col-lg-4 col-sm-12">
    @include('sidebar')
</div>
<div class="main">
        <div class="row">
        @foreach($view as $key=>$data)
            <div class="col-lg-30 col-md-30 col-sm-12 col-xs-20">
                <div class="tile">
                    <div class="wrapper">
                    
                        <div class="header">
                        <h2>{{ $data-> course_name }}</h2>
                        <p>{{ $data-> assignment_name }}</p>
                    <p>Score - {{ $data-> score }}</p>
                    </div>
                        <div class="dates">
                            <div class="start">
                                <strong>Assign date</strong> {{ $data-> created_at }}
                                <span></span>
                            </div>
                            <div class="ends">
                                <strong>Submitted date</strong> {{ $data-> submit_date }} {{ $data-> submit_time }}
                            </div>
                        </div>

                        <div class="stats"  >

                            <h3 style = "margin-left: 0.5%;">Instructions:</h3>

                            <div style = "margin-left: 0.5%; margin-right: 0.5%; " >
                                <p >
                                {{ $data-> instruction }}
                                </p>
                            </div>
                            <div class="banner-img" style = "margin-left: 0.5%;" >
                            <img src="{{ $data-> figure }}" alt="Image">
                        </div>
                        

</div>
                        <div class="footer">
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="{{ url ('/deleteAssignment/'.$data->id)}}" onclick = "return confirm('Are you sure to delete')"   class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                    
                </div> 
            </div>
        </div>
		@endforeach
    </div>
	
</body>
</html>