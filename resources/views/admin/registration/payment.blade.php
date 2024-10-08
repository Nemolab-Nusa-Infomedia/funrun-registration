<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selesaikan Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ secure_asset('assets/loading/css/main.css') }}">

</head>
<body>
    <div id="loading-container">
        <div class="loader">
          <img src="{{ asset('assets/registration/img/loading/sepatu1.png') }}" alt="Loading" class="shoe">
          <img src="{{ asset('assets/registration/img/loading/sepatu2.png') }}" alt="Loading" class="shoe">
          <img src="{{ asset('assets/registration/img/loading/sepatu3.png') }}" alt="Loading" class="shoe">
        </div>
    </div>
    <div class="container p-3">
        @if(isset($snapToken))
        <h1 class="text-center fw-bold mb-3">Selesaikan Pembayaran Anda</h1>
            <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
            <div id="snap-container" class="d-flex justify-content-center mx-auto"></div>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function () {
                    snap.embed('{{ $snapToken }}', {
                        embedId: 'snap-container',
                        onSuccess: function(result) {
                            window.location.href = '/pembayaran-berhasil';
                        },
                        onPending: function(result) {
                            window.location.href = '/pembayaran-gagal?transaction_id={{ $transactionId }}';
                        },
                        onError: function(result) {
                            window.location.href = '/pembayaran-gagal?transaction_id={{ $transactionId }}';
                        },
                        onClose: function(){
                            window.location.href = '/form';
                        }
                    });
                });
            </script>
        @else
            <p class="text-center">Payment cannot be processed at this moment. Please try again later. <a href="#">Hubungi Admin</a></p>
        @endif
    </div>

    <script src="{{ secure_asset('assets/loading/js/main.js') }}"></script>
</body>
</html>
