<!DOCTYPE html>
<html>
<head>
    <title>Complete your payment</title>
    <style>
        /* CSS untuk memastikan bahwa elemen div responsif */
        .payment-container {
            max-width: 100%;
            width: 100%;
            height: auto;
            text-align: center;
            padding: 20px;
        }
        /* Mengatur elemen div di tengah layar pada perangkat seluler */
        @media (max-width: 600px) {
            .payment-container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h1>Complete your payment</h1>
        @if(isset($snapToken))
            <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function () {
                    snap.pay('{{ $snapToken }}', {
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
            <p>Payment cannot be processed at this moment. Please try again later.</p>
        @endif
    </div>
</body>
</html>
