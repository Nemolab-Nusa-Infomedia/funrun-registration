@extends('components.layout')

@section('content')
<div class="card p-3">
    <span class="fw-bold text-dark fs-4">Data Peserta</span>

    <div class="table-responsive mt-3">
      @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->type == 'superadmin')
        <a href=""><button class="btn btn-info" type="button">Edit Peserta</button></a>
      @endif
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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu Verifikasi Email</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Via Pembayaran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Pembayaran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pembayaran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu Verifikasi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Diverisikasi Oleh</th>
                  @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->type == 'superadmin')
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($users as $items)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $items->participant_number }}</td>
                  <td>{{ $items->name }}</td>
                  <td>{{ $items->gender }}</td>
                  <td>{{ $items->email }}</td>
                  <td>{{$items->kecamatan.','.$items->kabupaten}}</td>
                  <td>{{ $items->size }}</td>
                  <td>{{ $items->goldar }}</td>
                  <td>{{ $items->r_penyakit }}</td>
                  <td>{{ $items->waktu_pembayaran }}</td>
                  <td>{{ $items->email_verified_at }}</td>
                  <td>{{ $items->payment_type }}</td>
                  <td>{{ $items->total }}</td>
                  <td>
                    @if($items->status == 'settlement')
                      Lunas
                    @else
                      Pending
                     @endif 
                  </td>
                  <td>{{ $items->verification_admin }}</td>
                  <td>{{ $items->by_admin}}</td>
                  @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->type == 'superadmin')
                  <td>
                    <a href="" class="btn btn-primary">Delete</a>
                  </td>
                  @endif
                </tr>
                @endforeach
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
