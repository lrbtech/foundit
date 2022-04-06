@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/datatables.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/pe7-icon.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/select2.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('section')        
        <!-- Right sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-lg-6 main-header">
                  <h2>Live Ads <span> </span></h2>
                  <h6 class="mb-0">Admin Panel</h6>
                </div>
                <!-- <div class="col-lg-6 breadcrumb-right">     
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item">Data Tables</li>
                    <li class="breadcrumb-item active">Basic Init</li>
                  </ol>
                </div> -->
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <form id="form" target="_blank" action="#" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="card-header">
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label class="col-form-label">Post</label>
                        <select id="post_id" name="post_id" class="js-example-basic-single select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true">
                        <option value="">Select Post</option>
                        @foreach($post_ads as $row)
                        <option value="{{$row->id}}">{{$row->title}}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <button onclick="Save()" id="save" class="btn btn-primary btn-block mr-10" type="button">Save Post</button>
                      </div>
                    </div>
                  </div>
                  </form>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <!-- <th>User</th> -->
                                <th>Post</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($live_ads as $key => $row)
                        <tr id="<?php echo $row->id ?>" class="ui-draggable ui-draggable-handle ui-sortable-handle">
                            <td>{{$row->order_id}}</td>
                            <!-- <td>
                              {{$row->user_id}}
                            </td> -->
                            <td>
                            @foreach($post_ads as $post_ad)
                            @if($post_ad->id == $row->post_id)
                            {{$post_ad->title}}
                            @endif
                            @endforeach
                            </td>
                            <td>
                                <a onclick="Delete({{$row->id}})" href="#">
                                <i class="fa fa-trash"></i> 
                                </a>
                            </td>
                        </tr>
                         @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Zero Configuration  Ends-->


            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>

@endsection
@section('extra-js')
  <script src="/assets/app-assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
  <script src="/assets/app-assets/js/datatable/datatables/datatable.custom.js"></script>
  <script src="/assets/app-assets/js/chat-menu.js"></script>
  <script src="/assets/app-assets/js/select2/select2.full.min.js"></script>
  <script src="/assets/app-assets/js/select2/select2-custom.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  var $sortable = $( "#basic-1 > tbody" );
  $sortable.sortable({
      stop: function ( event, ui ) {
          var parameters = $sortable.sortable( "toArray" );
          $.ajax({
            url : '/admin/update-live-ads',
            type: "POST",
            data: {
              value:parameters,
              _token: '{{csrf_token()}}'
            },
            dataType: "JSON",
            success: function(data)
            {                
              location.reload();
            }
          });
      }
  });
</script>

<script type="text/javascript">
$('.live-ads').addClass('active');

$(document).ready(function() {
  $('.js-example-basic-single').select2({
    width: '100%',
    //dropdownParent: $("#popup_modal")
  });
});


function Save(){
  var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/admin/save-live-ads',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            $("#form")[0].reset();
            //$('#popup_modal').modal('hide');
            location.reload();
            toastr.success(data, 'Successfully Save');
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
                toastr.error(obj[0]);
            });
        }
    });
}

function Delete(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/admin/delete-live-ads/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success(data, 'Successfully Delete');
          location.reload();
        }
      });
    } 
}
</script>
@endsection