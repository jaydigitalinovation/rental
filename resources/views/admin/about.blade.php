@extends('admin.layout.header')

@section('content')

<style type="text/css">
  .checkbox{
    position: static!important;
  }
  .btn4{
    right: 100px!important;
  }
</style>

@if(session()->has('error'))
              <div class="alert alert-success" id="newhide">
                  {{session()->get('error')}}
              </div>
              @endif
 <div class="page title1" style="display: block;">
  <div id="saveform_errList"></div>
          <div class="mt-5">
              <div class="list1">
                  <h4 class="mb-4">Portfolio List</h4>
                  <button class="btn1 btn4 d-none" id="deleteAllBtn"><a href="{{url('/admin/delete_selected_data')}}" style="color:black;">Delete all</a></button>
                  <button class="btn1"><a href="{{url('/admin/add_about_info')}}" style="color:black;">ADD</a></button>
              </div>
              <div class="detail table-responsive">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>
                              <input class="checkbox" type="checkbox" name="select_all">
                            </th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>About</th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                      </thead>

                      @foreach($userdata as $key=>$u)

                      <tbody>
                          <tr class="data_{{$u->id}}">
                            <td>
                              <input class="checkbox" type="checkbox" value="{{$u->id}}" name="select">
                            </td>
                            <td>{{$key+1}}</td>
                              <td>{{$u->name}}</td>
                              <td>{{$u->email}}</td>
                              <td>
                                <button class="btn2 glow-on-hover"><a href="{{url('/admin/update_category_data')}}/{{$u->id}}"><i class="fal fa-pencil"></i></a></button>
                              </td>
                              <td>
                                <button class="glow-on-hover"><a href="{{url('/admin/delete_about_data')}}/{{$u->id}}"><i class="fal fa-trash-alt"></i></a></button>
                                <!-- <button type="button" value="{{$u->id}}" id="delete_data" class="btn3 btn0 glow-on-hover"><i class="fal fa-trash-alt"></i></button> -->
                              </td>
                          </tr>
                      </tbody>

                      @endforeach
                  </table>
              </div>
          </div>
      </div>







@endsection


<style type="text/css">
  .glow-on-hover {
        width: 50px!important;
    }
</style>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

  setTimeout(function() { $(".alert").fadeOut(1500);},5000);
  


  $(document).ready(function(){

    $(document).on('click' , 'input[name="select_all"]' , function(){

      if(this.checked){

        $('input[name="select"]').each(function(){
          this.checked=true;
        });
      }else{

        $('input[name="select"]').each(function(){
          this.checked=false;
        });
      }
      toggledeleteallBtn();
    });
  });

  $(document).ready(function(){

    $(document).on('change' , 'input[name="select"]' , function(){

      if($('input[name="select"]').length== $('input[name="select"]:checked').length ){

        $('input[name="select_all"]').prop('checked',true);
      }else{

        $('input[name="select_all"]').prop('checked',false);
      }
      toggledeleteallBtn();
    });
  });

  function toggledeleteallBtn(){

    if($('input[name="select"]:checked').length > 0){
      $('button#deleteallBtn').text('Delete ('+$('input[name="select"]:checked').length +')').removeClass('d-none');
    }else{
      $('button#deleteallBtn').addClass('d-none');
    }
  }

  $(document).on('click' , 'button#deleteAllBtn' , function(){

    var checkProfile=[];

    $('input[name="select"]:checked').each(function(){

      checkProfile.push($(this).attr('value'));
    });

    if(checkProfile.length<=0){

      alert('Please Select Row!!');
    }
    else{

      var check=confirm('Are You Sure Want To Delete Selected Row??');

      if(check==true){

        var all_seleted_value = checkProfile.join(",");

        $.ajax({
                        url: '/admin/delete_selected_data',
                        type: 'get',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+all_seleted_value,
                        success: function (data) {
                            if (data['success']) {
                                $('input[name="select"]:checked').each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                                toggledeleteallBtn();
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(checkProfile, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
      }
    }
  });

  /*$(document).ready(function(){

  $(document).on('click' , '#delete_data', function(e) {

        e.preventDefault();
        var my_id = $(this).val();

          alert("Are you sure to delete whole data??");

          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });

          $.ajax({

        type: "get",
        url: "/admin/delete_home_data/"+my_id,
        datatype: "json",
        success:function(response){

          if(response.status == 200)
          {

            $('#saveform_errList').text(response.message);
            $('#saveform_errList').addClass('alert alert-success');
            $('.data_'+my_id).hide();
         
          }else{

             alert("somthing went wrong!!");

          }

          }
      });
    });
  });
  */
</script>
