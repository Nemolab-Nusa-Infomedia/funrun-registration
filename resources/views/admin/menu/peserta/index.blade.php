@extends('components.layout')

@section('content')
<div class="card p-3">
    <span class="fw-bold text-dark fs-4">Data Peserta</span>

    <div class="table-responsive mt-3">
        <a href=""><button class="btn btn-info" type="button">Edit Peserta</button></a>
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center" id="users-table">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Peserta</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Domisili</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Size Jersey</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Golongan Darah</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Riwayat Penyakit</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu Pembayaran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Via Pembayaran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Pembayaran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pembayaran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu Verifikasi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Diverisikasi Oleh</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>0001</td>
                  <td>Vindra Arya Yulian</td>
                  <td>Laki-laki</td>
                  <td>vindrayulian@gmail.com</td>
                  <td>Banyumas</td>
                  <td>L</td>
                  <td>B+</td>
                  <td>-</td>
                  <td>14.09, Senin 09 Juli 2024</td>
                  <td>Gopay</td>
                  <td>Rp.203.000</td>
                  <td>Lunas</td>
                  <td>Waktu Diverifikasi</td>
                  <td>Diverifikasi Oleh</td>
                  <td>
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
