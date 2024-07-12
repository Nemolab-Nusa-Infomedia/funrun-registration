<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selesaikan Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
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
                            window.location.href = '/pembayaran-gagal';
                        },
                        onError: function(result) {
                            window.location.href = '/pembayaran-gagal';
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
</body>
</html>
