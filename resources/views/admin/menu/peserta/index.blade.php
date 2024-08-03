@extends('components.layout')

@section('content')
<div class="card p-3">
    <span class="fw-bold text-dark fs-4">Data Peserta</span>

    <div class="table-responsive mt-3">
        <table class="table" id="users-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Peserta</th>
                    <th>Name</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Domisili</th>
                    <th>Size Jersey</th>
                    <th>Golongan Darah</th>
                    <th>Riwayat Penyakit</th>
                    <th>Waktu Pembayaran</th>
                    <th>Waktu Verifikasi Email</th>
                    <th>Via Pembayaran</th>
                    <th>Total Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Waktu Verifikasi</th>
                    <th>Diverisikasi Oleh</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Load jQuery sebelum DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    console.log($('#users-table'));
    var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('getuser') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'participant_number', name: 'participant_number'},
            {data: 'name', name: 'name'},
            {data: 'gender', name: 'gender'},
            {data: 'email', name: 'email'},
            {data: 'asal', name: 'asal'},
            {data: 'size', name: 'size'},
            {data: 'goldar', name: 'goldar'},
            {data: 'r_penyakit', name: 'r_penyakit'},
            {data: 'waktu_pembayaran', name: 'waktu_pembayaran'},
            {data: 'email_verified_at', name: 'email_verified_at'},
            {data: 'payment_type', name: 'payment_type'},
            {data: 'total', name: 'total'},
            {data: 'status', name: 'status'},
            {data: 'verification_admin', name: 'verification_admin'},
            {data: 'by_admin', name: 'by_admin'},
        ],
        createdRow: function(row, data, dataIndex) {
            if (data.status === 'Lunas') {
                $(row).addClass('status-lunas');
            } else if (data.status === 'Pending') {
                $(row).addClass('status-pending');
            }
        }
    });
  });
</script>
@endsection
