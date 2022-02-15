@extends('layouts.layout')

@section('title')
    User
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">User</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah User</a>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-hover" id="user_table">
                        <thead>
                            <tr>
                                <th class="text-center" width="30">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Role</th>
                                <th class="text-center" width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="align-middle text-center">
                                        {{ ++$no }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ $user->name }}
                                    </td>
                                    <td class="text-center">
                                        {{ $user->email }}
                                    </td>
                                    <td class="text-center">
                                        @if ($user->level == 1)
                                            Owner
                                        @elseif ($user->level == 2)
                                            Karyawan
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <a onclick="editForm({{ $user->id }})" class="btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                        <a onclick="deleteButton({{ $user->id }})" class="btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title-delete"></h3>
                    <button type="button" class="close" id="close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" id="smallBody">
                    <div>
                        <label id="text"></label>
                    </div>
                </div>
                <div class="modal-footer" id="btn-group">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" id="button">Yes!</button>
                </div>
            </div>
        </div>
    </div>

    @include('admin.user.edit')
    @include('admin.user.form')
@endsection

@section('script')
    <script>
        $(function(){
            $('#user_table').DataTable();
        })

        function addForm(){
            $('#modal-form').modal('show');
            $('.modal-title').text('Buat User Baru');
            $('#modal-form form')[0].reset();
        }

        function editForm(id){
            $.ajax({
                url: "users/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-form-edit').modal('show');
                    $('.modal-title').html('Edit User');
                    $('#name_edit').val(data.name);
                    $('#email_edit').val(data.email);
                    $('#role_edit').val(data.level).change();
                },
                error: function(){
                    alert('Gagal Ambil Data!');
                }
            })
        }

        function deleteButton(id){
            $('#smallModal').modal('show');
            $('.modal-title-delete').html('Delete User');
            $('#text').html('Anda yakin ingin menghapus user?');
        }
    </script>
@endsection