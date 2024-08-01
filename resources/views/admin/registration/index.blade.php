<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form FunRun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/registration/css/form/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/loading/css/main.css') }}">
</head>
  <body>
    {{-- <div id="loading-container">
        <div class="loader">
          <img src="{{ asset('assets/registration/img/loading/sepatu1.png') }}" alt="Loading" class="shoe">
          <img src="{{ asset('assets/registration/img/loading/sepatu2.png') }}" alt="Loading" class="shoe">
          <img src="{{ asset('assets/registration/img/loading/sepatu3.png') }}" alt="Loading" class="shoe">
        </div>
    </div> --}}

    <div class="container-fluid">
        <div class="form-registration box mt-3">
            .d-flex
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/loading/js/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const select = document.getElementById('payment_type');
            const customSelectContainer = document.getElementById('custom-select-container');

            const customSelect = document.createElement('div');
            customSelect.classList.add('custom-select');

            const selectedOption = document.createElement('div');
            selectedOption.classList.add('selected-option');
            selectedOption.innerHTML = select.options[select.selectedIndex].innerHTML;
            customSelect.appendChild(selectedOption);

            const optionsContainer = document.createElement('div');
            optionsContainer.classList.add('options-container');

            Array.from(select.options).forEach(option => {
                const customOption = document.createElement('div');
                customOption.classList.add('option');
                customOption.setAttribute('data-value', option.value);

                const span = document.createElement('span');
                span.innerText = option.innerText;
                customOption.appendChild(span);

                const imgSrc = option.getAttribute('data-img-src');
                if (imgSrc) {
                    const img = document.createElement('img');
                    img.src = imgSrc;
                    customOption.appendChild(img);
                }

                customOption.addEventListener('click', function () {
                    select.value = option.value;
                    selectedOption.innerHTML = customOption.innerHTML;
                    optionsContainer.classList.remove('show');
                });

                optionsContainer.appendChild(customOption);
            });

            customSelect.appendChild(optionsContainer);
            customSelectContainer.appendChild(customSelect);

            customSelect.addEventListener('click', function () {
                optionsContainer.classList.toggle('show');
            });

            document.addEventListener('click', function (e) {
                if (!customSelect.contains(e.target)) {
                    optionsContainer.classList.remove('show');
                }
            });
        });
    </script>

    {{-- api wilayah --}}
    <script>
        $(document).ready(function() {
            $('#inputProv').change(function() {
                var provId = $(this).val();
                if (provId) {
                    $.ajax({
                        asset: '/dapatkan/kabupaten/' + provId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#inputKab').empty();
                            $('#inputKab').append('<option selected>Pilih kabupaten</option>');
                            $.each(data, function(key, value) {
                                $('#inputKab').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#inputKab').empty();
                    $('#inputKab').append('<option selected>Pilih kabupaten</option>');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#inputKab').change(function() {
                var kecId = $(this).val();
                if (kecId) {
                    $.ajax({
                        asset: '/dapatkan/kecamatan/' + kecId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#inputKecamatan').empty();
                            $('#inputKecamatan').append('<option selected>Pilih kecamatan</option>');
                            $.each(data, function(key, value) {
                                $('#inputKecamatan').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#inputKecamatan').empty();
                    $('#inputKecamatan').append('<option selected>Pilih kecamatan</option>');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#inputKecamatan').change(function() {
                var desaId = $(this).val();
                if (desaId) {
                    $.ajax({
                        asset: '/dapatkan/desa/' + desaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#inputDesa').empty();
                            $('#inputDesa').append('<option selected>Pilih Desa</option>');
                            $.each(data, function(key, value) {
                                $('#inputDesa').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#inputDesa').empty();
                    $('#inputDesa').append('<option selected>Pilih Desa</option>');
                }
            });
        });
    </script>

    {{-- komunitas --}}
    <script>
        function toggleNamaKomunitas() {
            const komunitasSelect = document.getElementById('komunitas');
            const namaKomunitasContainer = document.getElementById('namaKomunitasContainer');
            const komunitasDiv = document.getElementById('komunitasDiv');

            if (komunitasSelect.value === 'Komunitas') {
                namaKomunitasContainer.style.display = 'block';
                komunitasDiv.className = 'col-12 col-md-6';
            } else {
                namaKomunitasContainer.style.display = 'none';
                komunitasDiv.className = 'col-12';
            }
        }

        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('togglePassword');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('ri-eye-line');
                eyeIcon.classList.add('ri-eye-off-line');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('ri-eye-off-line');
                eyeIcon.classList.add('ri-eye-line');
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
