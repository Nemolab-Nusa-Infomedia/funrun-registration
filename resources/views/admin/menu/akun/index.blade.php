@extends('components.layout')

@section('content')
<div class="card p-3">
    <span class="fw-bold text-dark fs-4">Data Akun</span>

    <div class="table-responsive mt-3">
        <a href="{{ route('akun-tambah') }}"><button class="btn btn-info" type="button">Tambah Akun</button></a>
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center" id="users-table">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Domisili</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Vindra Arya Yulian</td>
                  <td>Laki-laki</td>
                  <td>vindrayulian@gmail.com</td>
                  <td>Panitia</td>
                  <td>Banyumas</td>
                  <td>
                    <a href="{{ route('akun-edit') }}" class="btn btn-warning">Edit</a>
                    <a href="" class="btn btn-primary">Delete</a>
                  </td>
                </tr>
              </tbody>
        </table>
    </div>
</div>
</div>

<script type="text/javascript">
$(function () {
var table = $('#users-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'name', name: 'name'},
        {data: 'avatar', name: 'avatar'},
        {data: 'email', name: 'email'},
        {data: 'username', name: 'username'},
        {data: 'role_name', name: 'role_name'},
        {data: 'created_at', name: 'created_at'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
});
});
</script>
@endsection
