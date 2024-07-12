@extends('components.layout')

@section('content')
@if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->type == 'admin')
<div class="container">
        <div class="row">
            <div class="col-12 col-md-12 mx-auto">
                <div class="card p-3">
                    <div class="row text-center">
                        <div class="mt-4 row mx-auto">
                            <span style="font-size: 18px">{{ Auth::guard('admin')->user()->name }}</span>
                            <span style="font-size: 18px">{{ Auth::guard('admin')->user()->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


@if(Auth::check() && Auth::user()->type == 'participant')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 mx-auto">
                <div class="card p-3">
                    <div class="row text-center">
                        <h4 class="mb-3">No Peserta:</h4>
                        <h1 style="border-bottom: 2px solid black; width: auto; font-size: 4.3rem" class="mx-auto">#{{ Auth::user()->participant_number }}</h1>
                        <div class="mt-4 row mx-auto">
                            <span style="font-size: 18px">{{ Auth::user()->name }}</span>
                            <span style="font-size: 18px">{{ $namekab }}</span>
                        </div>
                    </div>
                    <button id="toggleButton" class="btn btn-secondary mt-3" onclick="toggleDetails()">Lihat Detail</button>
                    
                    <div id="detailTable" class="table-responsive collapse">
                        <img class="d-block mx-auto mb-3 mt-2" src="{{ secure_asset('qrcodes/'.Auth::user()->id.'.png') }}" width="200" alt="" srcset="">
                        <table class="table">
                            <tr>
                                <td>No Peserta</td>
                                <td>: {{ Auth::user()->participant_number }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: {{ Auth::user()->gender }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: {{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td>Domisili</td>
                                <td>: {{ $namekec.', '.$namekab }}</td>
                            </tr>
                            <tr>
                                <td>Size Jersey</td>
                                <td>: {{ Auth::user()->size }}</td>
                            </tr>
                            <tr>
                                <td>Golongan Darah</td>
                                <td>: {{ Auth::user()->goldar }}</td>
                            </tr>
                            <tr>
                                <td>Riwayat Penyakit</td>
                                <td>: {{ Auth::user()->r_penyakit }}</td>
                            </tr>
                            <tr>
                                <td>Waktu Pembayaran</td>
                                <td>: {{ Auth::user()->waktu_pembayaran }}</td>
                            </tr>
                            <tr>
                                <td>Via Pembayaran</td>
                                <td>: {{ Auth::user()->payment_type }}</td>
                            </tr>
                            <tr>
                                @php
                                    $amount = Auth::user()->total;
                                    $formattedAmount = "Rp " . number_format($amount, 0, ',', '.');
                                @endphp
                                <td>Total Pembayaran</td>
                                <td>: {{ $formattedAmount }}</td>
                            </tr>
                            <tr>
                                <td>Status Pembayaran</td>
                                <td>: 
                                    @if(Auth::user()->status == 'settlement')
                                    <span class="btn btn-success"> Lunas</span>
                                    @elseif(Auth::user()->status == 'pending')
                                    <span class="btn btn-warning"> Pending</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<script>
    function toggleDetails() {
        var detailTable = document.getElementById("detailTable");
        var toggleButton = document.getElementById("toggleButton");

        if (detailTable.classList.contains("show")) {
            detailTable.classList.remove("show");
            toggleButton.textContent = "Lihat Detail";
        } else {
            detailTable.classList.add("show");
            toggleButton.textContent = "Tutup Detail";
        }
    }
</script>
@endsection
