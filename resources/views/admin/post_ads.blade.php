@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/datatables.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/pe7-icon.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/select2.css">
@endsection
@section('section')        
        <!-- Right sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-lg-6 main-header">
                  <h2>{{$language[7][Auth::guard('admin')->user()->lang]}}</h2>
                  <h6 class="mb-0">{{$language[0][Auth::guard('admin')->user()->lang]}}</h6>
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
                <form target="_blank" action="#" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="card-header">
                      <div class="row">
                        <div class="form-group col-md-3">
                            <label>From Date</label>
                            <input autocomplete="off" type="date" id="from_date" name="from_date" class="form-control">
                        </div>

                        <div class="form-group col-md-3">
                            <label>To Date</label>
                            <input autocomplete="off" type="date" id="to_date" name="to_date" class="form-control">
                        </div>

                        <div class="form-group col-md-3">
                          <label>Select User</label>
                          <select id="user_id" name="user_id" class="js-example-basic-single col-sm-12 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="user">Select All User</option>
                            <!-- <option value="admin">Admin</option> -->
                            @foreach($user as $row)
                            <option value="{{$row->id}}">{{$row->first_name}} {{$row->last_name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-md-3">
                          <label>Category</label>
                          <select id="category" name="category" class="js-example-basic-single col-sm-12 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="category">Select All Category</option>
                            @foreach($category as $row)
                            <option value="{{$row->id}}">{{$row->category}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label>From Range</label>
                            <input autocomplete="off" type="number" id="from_range" name="from_range" class="form-control">
                        </div>

                        <div class="form-group col-md-2">
                            <label>To Range</label>
                            <input autocomplete="off" type="number" id="to_range" name="to_range" class="form-control">
                        </div>

                        <div class="form-group col-md-3">
                            <button id="search" class="btn btn-primary btn-block mr-10" type="button">Search</button>
                        </div>
                      </div>
                    
                  </div>
                  </form>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="datatable">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Customer Details</th>
                            <th>Category</th>
                            <th>Post Details</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

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

  <script type="text/javascript">
$('.post-ads').addClass('active');

var $this = $(".iconsidebar-menu");
if ($this.hasClass('iconbar-second-close')) {
  //$this.removeClass();
  $this.removeClass('iconbar-second-close').addClass('iconsidebar-menu');
} else if ($this.hasClass('iconbar-mainmenu-close')) {
  $this.removeClass('iconbar-mainmenu-close').addClass('iconbar-second-close');
} else {
  $this.addClass('iconbar-mainmenu-close');
}

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

function search_url(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  var from_range = $('#from_range').val();
  var to_range = $('#to_range').val();
  var fdate;
  var tdate;
  var frange;
  var trange;
  if(from_date!=""){
    fdate = from_date;
  }else{
    fdate = '1';
  }
  if(to_date!=""){
    tdate = to_date;
  }else{
    tdate = '1';
  }
  if(from_range!=""){
    frange = from_range;
  }else{
    frange = 'from_range';
  }
  if(to_range!=""){
    trange = to_range;
  }else{
    trange = 'to_range';
  }
  var user_id = $('#user_id').val();
  var category = $('#category').val();
  return '/admin/get-post-ads/'+fdate+'/'+tdate+'/'+user_id+'/'+category+'/'+frange+'/'+trange;
}
var orderPageTable = $('#datatable').DataTable({
    "processing": true,
    "serverSide": true,
    //"pageLength": 50,
    "ajax":{
        "url": search_url(),
        "dataType": "json",
        "type": "POST",
        "data":{ _token: "{{csrf_token()}}"}
    },
    "columns": [
        //{ data: 'DT_RowIndex', name: 'DT_RowIndex'},
        { data: 'date', name: 'date'},
        { data: 'customer', customer: 'name'},
        { data: 'category', name: 'category' },
        { data: 'post_details', name: 'post_details' },
        { data: 'post_image', name: 'post_image' },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action' },
    ]
});

$('#search').click(function(){
    var new_url = search_url();
    orderPageTable.ajax.url(new_url).load(null, false);
    //orderPageTable.draw();
});

function Delete(id,status){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/admin/delete-post-ads/'+id+'/'+status,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success(data, 'Successfully Active/DeActive');
          // location.reload();
          var new_url = search_url();
          orderPageTable.ajax.url(new_url).load(null, false);
        }
      });
    } 
}

function Approved(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/admin/approved-post-ads/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success(data, 'Successfully Approved');
          // location.reload();
          var new_url = search_url();
          orderPageTable.ajax.url(new_url).load(null, false);
        }
      });
    } 
}
</script>
@endsection