@extends('admin.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/datatables.css">
<link rel="stylesheet" type="text/css" href="/assets/app-assets/css/pe7-icon.css">
@endsection
@section('section')        
        <!-- Right sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-lg-6 main-header">
                  <h2>{{$language[8][Auth::guard('admin')->user()->lang]}}</h2>
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
                            <!-- <th>#</th> -->
                            <th>Customer Details</th>
                            <th>Category</th>
                            <th>Post Details</th>
                            <th>Report Reason</th>
                            <th>Image</th>
                            <th>Post Status</th>
                            <th>User Status</th>
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

  <script type="text/javascript">
$('.all-customer').addClass('active');

function search_url(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  var fdate;
  var tdate;
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
  return '/admin/get-report-post-ads/'+fdate+'/'+tdate;
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
        { data: 'customer', customer: 'name'},
        { data: 'category', name: 'category' },
        { data: 'post_details', name: 'post_details' },
        { data: 'report_reason', name: 'report_reason' },
        { data: 'post_image', name: 'post_image' },
        { data: 'post_status', name: 'post_status' },
        { data: 'user_status', name: 'user_status' },
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
          toastr.success(data, 'Successfully Delete');
          // location.reload();
          var new_url = search_url();
          orderPageTable.ajax.url(new_url).load(null, false);
        }
      });
    } 
}

function UserDelete(id,status){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/admin/delete-customer/'+id+'/'+status,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success(data, 'Successfully Delete');
          // location.reload();
          var new_url = search_url();
          orderPageTable.ajax.url(new_url).load(null, false);
        }
      });
    } 
}
</script>
@endsection