  
  <div></div>
    @if(isset($snapToken))
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="@php env('MIDTRANS_CLIENT_KEY') @endphp"></script>
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