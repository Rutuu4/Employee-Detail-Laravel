  @extends('../index')
  @section('content')
  
  <main>
      @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
           {{ Session::get('message')}}
        </div>
      @endif

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <link   rel="stylesheet" href="{{ asset('css/app.css') }}"/>
        
<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Delete Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form class="px-md-2" id="form">
            @csrf

                            <div class=" form-outline mb-4">
                                <input type="text" id="first_name" name="first_name" class="form-control" />
                                <label class="form-label" for="form3Example1q">First name</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="last_name" name="last_name" class="form-control" />
                                <label class="form-label" for="form3Example1q">Last name</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="tel" id="contact_no" name="contact_no" class="form-control" />
                                <label class="form-label" for="form3Example1q">Contact No</label>
                            </div>

                            <div class="row mb-4 pb-2 pb-md-0 mb-md-5">

                            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="add" class="btn btn-primary">Add</button>
      </div>
       </form>
    </div>
  </div>
</div>

    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-2">
                        <div id="dataTable_filter" class="dataTables_filter">
                             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
                             </button>

                        </div>
                    </div>
                    <!-- Button trigger modal -->

                    <div class="col-sm-12 col-md-2">
                        <div class="dataTables_length" id="dataTable_length">
                            <label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm" onclick="pageChange()">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <form action="/search">
                        <div id="dataTable_filter" class="dataTables_filter">
                            <label>Search:<input type="search" name="search" class="form-control form-control-sm" placeholder="Search" aria-controls="dataTable"></label><button  type="submit" class="btn btn-light">Go</button>
                        </form>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="bidders" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 105px;">Id</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 105px;">First Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 94px;">Last Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 94px;">Contact No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 94px;">Actions</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 94px;">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>

                                    <th rowspan="1" colspan="1">Id</th>
                                    <th rowspan="1" colspan="1">First Name</th>
                                    <th rowspan="1" colspan="1">Last Name</th>
                                    <th rowspan="1" colspan="1">Contact No</th>
                                    <th rowspan="1" colspan="1">Actions</th>
                                    <th rowspan="1" colspan="1">Actions</th>
                                </tr>


                            </tfoot>

                            <tbody id="row_body">
                                  @foreach($employees as $employee)
                                <tr id="eid{{$employee->id}}" class="odd">
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->contact_no}}</td>
                                     <td><a href="javascript:void(0)" onclick="edit({{$employee->id}})" class="btn btn-secondary edit_data" data-bs-toggle="modal" data-bs-target="#editexampleModal">Update
                                    </a></td>
                                    {{-- <td><a href="javascript:void(0)" onclick="edit({{$employee->id}})" class="btn btn-secondary edit_data" data-toggle="modal" data-target="#editexampleModal">Update</a></td> --}}
                                    <td><a href="javascript:void(0)" class="btn btn-danger delete_data" data-bs-toggle="modal" data-bs-target="#rModal">Delete
                                    </a></td>
                                    {{-- <td><a href="javascript:void(0)" class="btn btn-danger delete_data"  data-toggle="modal" data-target="#deleteexampleModal">Delete</a></td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade" id="editexampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editexampleModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editexampleModal">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form class="px-md-2" id="editform">
            @csrf
            <input type="hidden" id="id" name="id"/>
                            <div class=" form-outline mb-4">
                                <input type="text" id="first_name_edit" name="first_name" class="form-control" />
                                <label class="form-label" for="form3Example1q">First name</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="last_name_edit" name="last_name" class="form-control" />
                                <label class="form-label" for="form3Example1q">Last name</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="tel" id="contact_no_edit" name="contact_no" class="form-control" />
                                <label class="form-label" for="form3Example1q">Contact No</label>
                            </div>

                            <div class="row mb-4 pb-2 pb-md-0 mb-md-5">

                            </div>

                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <input type="submit" id="edit" value="Edit" class="btn btn-primary"/>
      </div>
       </form>
    </div>
  </div>
</div>
                
<div class="modal fade" id="rModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="rModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rModal">Delete Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="px-md-2" id="deleteform">
            @csrf
            <input type="hidden" id="delete_id"/>
                         <p>Are you sure you want to delete this employee?</p>
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
       </form>
    </div>
  </div>
</div>
  
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
 <script>

        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#example').DataTable();
        });

          $("#form").submit(function(e) {
            e.preventDefault();
                var firstName = $("#first_name").val();
                var lastName = $("#last_name").val();
                var contact_no = $("#contact_no").val();
                console.log(typeof(firstName),lastName,contact_no,'input_data');

                if (firstName == '' || lastName == '' || contact_no == '') {
                    alert("Please fill all fields.");
                    return false;
                }

                $.ajax({
                    type: "POST",
                    url: "/add",
                    data:{
                         _token: "{{ csrf_token() }}",
                         first_name:firstName,
                        last_name:lastName,
                        contact_no:contact_no
                    },
                }).done(function(response){
                    console.log(response.id);
                var row='<tr id="eid'+response.id+'">';
                row+='<td>'+response.id+'</td>';
                row+='<td>'+response.first_name+'</td>';
                row+='<td>'+response.last_name+'</td>';
                row+='<td>'+response.contact_no+'</td>';
                row+='<td><a href="javascript:void(0)" onclick="edit('+response.id+')" class="btn btn-secondary edit_data" data-bs-toggle="modal" data-bs-target="#editexampleModal">Update</a></td>';
                // row+='<td><a href="javascript:void(0);" class="btn btn-secondary" data-toggle="modal" data-target="#editexampleModal" onclick="edit('+response.id+')">Update</a></td>';
                row+='<td><a href="javascript:void(0)" class="btn btn-danger delete_data" data-bs-toggle="modal" data-bs-target="#rModal">Delete</a></td>';
                row+='</tr>';
                $('#exampleModal').modal('hide');
                  $('#exampleModal').on('hidden.bs.modal', function() {
                            $(this).find('form').trigger('reset');
                        });
                console.log(row);
                $('#row_body').prepend(row);
            });



        });

        function edit(id)
        {
            $.get('/show/'+id,function(data){
                console.log(data.id);
                   $('#id').val(data.id);
                   $('#first_name_edit').val(data.first_name);
                    $('#last_name_edit').val(data.last_name);
                    $('#contact_no_edit').val(data.contact_no);
                       $('#editexampleModal').modal('show');
            })

        }
        $('#editform').submit(function(e){
            e.preventDefault();
            var id = $('#id').val();
              var firstName = $("#first_name_edit").val();
                var lastName = $("#last_name_edit").val();
                var contact_no = $("#contact_no_edit").val();
                console.log(firstName);
         if (firstName == '' || lastName == '' || contact_no == '') {
                    alert("Please fill all fields.");
                    return false;
                }

                $.ajax({
                    type: "PUT",
                    url: "/update",
                    data:{
                         _token: "{{ csrf_token() }}",
                         id:id,
                         first_name:firstName,
                        last_name:lastName,
                        contact_no:contact_no
                    },}).done(function(response){
                    console.log(response.id);
                var row='<tr id="eid'+response.id+'">';
                row+='<td>'+response.id+'</td>';
                row+='<td>'+response.first_name+'</td>';
                row+='<td>'+response.last_name+'</td>';
                row+='<td>'+response.contact_no+'</td>';
                row+='<td><a href="javascript:void(0);" class="btn btn-secondary" data-toggle="modal" data-target="#editexampleModal" onclick="edit('+response.id+')">Update</a></td>';
                row+=' <td><a href="javascript:void(0)" class="btn btn-danger delete_data" data-bs-toggle="modal" data-bs-target="#rModal">Delete</a></td>';
                row+='</tr>';
                $('#editexampleModal').modal('hide');
                  $('#editexampleModal').on('hidden.bs.modal', function() {
                            $(this).find('editform').trigger('reset');
                        });
                // console.log(row);
                $('#eid'+response.id).replaceWith(row);
            });


        });
          $(".delete_data").click(function() {

            $('#rModal').modal('show');
            $tr=$(this).closest('tr');
            var data=$tr.children('td').map(function(){
                return $(this).text();
            }).get();
            console.log(data[0]);

            $('#delete_id').val(data[0]);



        });
           $('#deleteform').submit(function(e){
            e.preventDefault();
            var id = $('#delete_id').val();
                console.log(id);
                $.ajax({
                    type: "DELETE",
                    url: "/delete/"+id,
                    data:{
                         _token: "{{ csrf_token() }}",
                         id:id,
                       
                    },
                    success:function(response){
                        console.log(response);
                        $('#rModal').modal('hide');
                        location.reload();

                    }
                    
                })
            });
    </script>
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> --}}

<!-- Modal -->

</main>
@endsection

     