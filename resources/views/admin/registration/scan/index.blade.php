@extends('components.layout')

@section('content')
<div class="container">
    <div class="row col-12 col-md-6 justify-content-center mx-auto">
        <h4 class="d-flex justify-content-center">Scan QR Code</h4>
        <div class="card" id="reader">
            <div class="card-content mx-auto">
            </div>
        </div>
    </div>
</div>
<script>
    var qrScanned = false; // Variabel penanda untuk memastikan QR code hanya dipindai sekali
    function onScanSuccess(qrMessage) {
        if (!qrScanned) { // Pastikan QR code belum dipindai sebelumnya
            console.log('Scanned QR Code: ', qrMessage);
            qrScanned = true; // Set variabel penanda menjadi true setelah pemindaian pertama
            $.ajax({
                url: '/verify-qr',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    qr_code: qrMessage
                },
                success: function(response) {
                    const newUrl = '/hasil-scan/' + response.user.id;
                    window.location.href = newUrl;
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.responseJSON.message
                    });
                    qrScanned = false; // Set variabel penanda kembali ke false jika terjadi kesalahan
                }
            });
        }
    }

    function onScanError(errorMessage) {
        console.log('QR Code Scan Error: ', errorMessage);
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess, onScanError);

</script>
@endsection
