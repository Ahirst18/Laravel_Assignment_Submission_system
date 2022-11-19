<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    @include('student_panel/sidebarStu')
    </div>
    <div class="main">
    <h4>Enroll course</h4>
    @if(Session::has('msg'))
  <p class= "alert alert-success">{{ Session::get('msg')}}</p>
  @endif
<form action="{{ url('/store-enroll-courses') }}" method="post" >
  @csrf
  <div class="form-group">
      <label for="pwd">Student ID:</label>
      <input type="txt" class="form-control" id="student_id" placeholder="Enter your id" name="student_id">
      @error('courseName')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group">
      <label for="pwd">Select semester:</label>
    <select class="form-control input-lg dynamic" id="semester" name="semester" data-dependent = "course_id">
    <option value= "">Semester</option>
          @foreach($all_semester as $semester)
          <option value = "{{ $semester -> semester}}">{{ $semester-> semester }}</option>
          @endforeach
   </select>
      @error('sem')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">

      <label for="pwd">Select course:</label>
    <select class="form-control input-lg dynamic" id="course_id" name="course_id" >
          <option value="">Courses</option>
          
   </select>
    </div>
    {{ csrf_field() }}
    <div>
    <button type="submit" class="btn btn-primary">Enroll</button>
    </div>
</form>
</div>
</body>
</html>

<script> 
$(document).ready(function(){
    $('.dynamic').change(function(){
      if ($(this).val() != ''){
        var select = $(this).attr("id");
        var value = $(this).val();
        var dependent = $(this).data('dependent');
        var _token = $('input[name = "_token"]').val();
        $.ajax({
          url:"{{ route('enrollcourse.fetch') }}",
          method:"POST",
          data:{select:select , value:value ,_token:_token , dependent:dependent},
          success:function(result){
            $('#'+dependent).html(result);
          }
        })
      }
    })
    

});
</script>