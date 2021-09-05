@extends('layouts.app')


@section('content')

<div class="content">
    <div class="content-header">
        <div class="container-fluid">

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        Users List
                    </h3>
                    <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new user</button>
                </div>
                <div class="card-body table-responsive">
                    <table id="users_table" style="width:100%" class="table table-bordered table-striped dt-responsive display nowrap">
                      <thead>
                          <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Created on</th>
                                <th>Status</th>
                                <th>Actions</th>
                          </tr>
                      </thead>
                  </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input id="name" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">User ID</label>
                            <input id="userid" name="user_id" type="text" class="form-control" maxlength="6">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Temp Password</label>
                            <input name="password"  type="password" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Confirm Temp Password</label>
                            <input name="password-confirm"  type="password" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">User Type</label>
                                <select id="userType" class="custom-select">
                                    <option selected disabled>Select options</option>
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-submit">Save Changes</button>
               
            </div>
            </div>
        </div>
        </div>
    <!--Modal-->

    <!-- Modal Edit-->
        <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input id="edit-name" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">User ID</label>
                                <input id="edit-userid" name="user_id" type="text" class="form-control" id="exampleInputEmail1" onkeypress=" return numericOnly(event)" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Temp Password</label>
                                <input id="edit-password" name="password" type="password" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Temp Password</label>
                                <input id="edit-password-confirm" name="password-confirm-edit" type="password" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                        </div>
    
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">User Type</label>
                                    <select id="edit-userType" class="custom-select">
                                        <option selected disabled>Select options</option>
                                        <option value="1">Admin</option>
                                        <option value="0">User</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="edit-submit" type="button" class="btn btn-primary btn-submit-edit">Save Changes</button>
                </div>
            </form>
                </div>
            </div>
            </div>
    <!--Modal-->
</div>
@endsection




@push('page_scripts')
    <script>
        $(document).ready(function(){
            load_users()
                function load_users(){
                var users = $('#users_table').DataTable( {
                ajax: "{{ route('users.index') }}",
                pageLength: 25,
                serverSide:true,
                destroy: true,
                responsive: true,
                columns:[
                    { data: 'id', name: 'id', orderable: true, searchable: true},
                    { data: 'name', name: 'name', orderable: false, searchable: false},
                    { data: 'email', name: 'email', orderable: true, searchable: true},
                    { data: 'isAdmin', name: 'isAdmin', orderable: false, searchable: false},
                    { data: 'created_at', name: 'created_at', orderable: false, searchable: false},
                    { data: 'isActivated', name: 'Status', orderable: false, searchable: false},
                    { data: 'buttons', name: 'buttons', orderable: false, searchable: false},
                    // { data: {}, name: 'Buttons', orderable: false, render: function(row,data){
                    //     return `<button class="btn btn-primary" onclick="editUser(${row})" data-name="'${row.name}'" data-userid="'${row.user_id}'" data-usertype="'${row.admin}'">Update</button> &nbsp; <button class="btn btn-danger">Delete</button>`;
                    // }}
                ]
            });
            }
        })

        function approveUser(id){  
            console.log(id)
            alertify.confirm('Confirmation', 'Approve user?', function() {
                axios.post(`/approveUser/${id}`).then((res)=>{
                    console.log(res.data)
                    toastr.success('User Approved!')
                    $('#users_table').DataTable().clear().draw();
                })
            }, function() {
                // alertify.error('Cancel')
                // console.log('cancel')
            });
        }

        function denyUser(id){  
            console.log(id)
            alertify.confirm('Confirmation', 'Deny user?', function() {
                axios.post(`/denyUser/${id}`).then((res)=>{
                    console.log(res.data)
                    toastr.error('User dened!')
                    $('#users_table').DataTable().clear().draw();
                })
            }, function() {
                // alertify.error('Cancel')
                // console.log('cancel')
            });
        }
    </script>
@endpush