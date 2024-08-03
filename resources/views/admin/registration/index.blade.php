<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form FunRun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/registration/css/form/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/loading/css/main.css') }}">
    <script src="https://kit.fontawesome.com/0a267e6f70.js" crossorigin="anonymous"></script>
</head>
  <body>
     <div id="loading-container">
        <div class="loader">
          <img src="{{ asset('assets/registration/img/loading/sepatu1.png') }}" alt="Loading" class="shoe">
          <img src="{{ asset('assets/registration/img/loading/sepatu2.png') }}" alt="Loading" class="shoe">
          <img src="{{ asset('assets/registration/img/loading/sepatu3.png') }}" alt="Loading" class="shoe">
        </div>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="form-registration box p-3 mt-3 mb-3">
            <div class="d-flex justify-content center mt-3">
                <div class="icon-back">
                    <a href="{{ route('profile') }}" class="text-dark fs-1"><i class="fa-solid fa-reply"></i></a>
                </div>
                <div class="mx-auto">
                    <div class="text-center">
                        <h3>FORMULIR REGISTRASI</h3>
                        <p>harap isi formulir dengan benar dan sesuai dengan data diri</p>
                    </div>
                </div>
            </div>

            <div class="form">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="row col-12 col-md-12 mx-auto">
                        <span class="text-secondary fw-bold mb-3">Data diri</span>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama lengkap" aria-label="">
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Jenis Kelamin</label>
                                <select id="inputState" class="form-select" name="gender">
                                    <option selected>--- Pilih jenis kelamin ---</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Usia</label>
                                <input type="text" class="form-control" name="age" placeholder="Usia">
                            </div>
                        </div>
                        <div class="col-12" id="komunitasDiv">
                            <div class="mb-3">
                                <label for="komunitas" class="form-label">Komunitas / Individu</label>
                                <select id="komunitas" name="community" class="form-control" onchange="toggleNamaKomunitas()">
                                    <option selected>Pilih</option>
                                    <option value="Komunitas">Komunitas</option>
                                    <option value="Individu">Individu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6" id="namaKomunitasContainer" style="display: none;">
                            <div class="mb-3">
                                <label for="namaKomunitas">Nama Komunitas</label>
                                <input type="text" id="namaKomunitas" name="name_community" class="form-control mt-2" placeholder="nama komunitas">
                            </div>
                        </div>

                        <span class="text-secondary fw-bold mb-3">Domisili</span>
                        <div class="col-12 col-md-3">
                            <div class="mb-3">
                                <label for="inputDesa" class="form-label">Desa</label>
                                <input type="text" class="form-control" name="desa" id="inputDesa">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="mb-3">
                                <label for="inputKecamatan" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" name="kecamatan" id="inputKecamatan">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="mb-3">
                                <label for="inputKab" class="form-label">Kabupaten</label>
                                <input type="text" class="form-control" name="kabupaten" id="inputKab">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="mb-3">
                                <label for="inputProv" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" name="domisili" id="inputProv">
                            </div>
                        </div>
                        <span class="text-secondary fw-bold mb-3">Informasi Pribadi</span>
                        <div class="col-12 col-md-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Nomor Handphone</label>
                                <input type="text" class="form-control" name="phone" placeholder="masukan nomor handphone">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Size Jersey</label>
                                <select id="inputState" class="form-select" name="size">
                                    <option selected>Pilih size jersey</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <option value="XXXL">XXXL</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Golongan Darah</label>
                                <select id="" class="form-select" name="goldar">
                                    <option selected>Pilih golongan darah</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB-">AB-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Riwayat Penyakit</label>
                                <input type="text" class="form-control" name="r_penyakit" placeholder="riwayat penyakit">
                            </div>
                        </div>

                        <span class="text-secondary fw-bold mb-3">Kontak Darurat</span>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Kontak darurat</label>
                                <input type="text" class="form-control" name="contant_urgent" placeholder="nama kontak darurat">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Nomor Kontak Darurat</label>
                                <input type="text" class="form-control" name="phone_urgent" placeholder="nomor kontak darurat">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Hubungan Dengan Kontak Darurat</label>
                                <input type="text" class="form-control" name="relation_urgent" placeholder="hubungan dengan kontak darurat">
                            </div>
                        </div>

                        <span class="text-secondary fw-bold mb-3 mt-3">Transaksi Pembayaran</span>
                        <div class="col-12 col-md-12">
                            <div class="mb-3">
                                <label for="payment_type" class="form-label">Pilih Metode Pembayaran</label>
                                <select class="form-select" id="payment_type" name="payment_type" style="display: none;">
                                    <option value="" selected>--- Pilih Pembayaran ---</option>
                                    <option value="gopay" data-img-src="{{ asset('assets/registration/img/metode-pembayaran/gopay.png') }}">GoPay</option>
                                    <option value="shopeepay" data-img-src="{{ asset('assets/registration/img/metode-pembayaran/shopeepay.jpg') }}">ShopeePay</option>
                                    <option value="other_qris" data-img-src="{{ asset('assets/registration/img/metode-pembayaran/qriss.jpg') }}">Qris (QRis, Dana, OVO, LinkAja)</option>
                                    <option value="bank_merchant" data-img-src="{{ asset('assets/registration/img/metode-pembayaran/bank.png') }}">Bank Merchant</option>
                                    <option value="credit_card" data-img-src="{{ asset('assets/registration/img/metode-pembayaran/kartu kredit.png') }}">Kartu Kredit</option>
                                </select>
                                <div class="custom-select-container" id="custom-select-container"></div>
                            </div>
                        </div>

                        <div class="mb-3 mt-3 text-end">
                            <a href="{{ route('profile') }}" class="btn btn-c6 rounded-5 text-white fw-bold border-1 border">Kembali</a>
                            <button type="button" class="btn btn-c1 rounded-5 text-white fw-bold border-1 border"  data-bs-toggle="modal" data-bs-target="#daftar">Daftar</button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="daftar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Anda akan melalukan pembayaran</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <span>Apakah anda setuju untuk melakukan pembayaran ?</span>
                                    <span>click tombol bayar untuk melanjutkan pendaftaran</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-dark rounded-5 text-dark fw-bold border-1 border" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                                    <button type="submit" class="btn btn-submit rounded-5 text-dark fw-bold border-1 border">Bayar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Modal -->
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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

    <script>
        $(function() {
            $("#inputDesa").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "https://base-wilayah.lumbungdata.id/api/get-desa",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            var formattedData = data.map(function(item) {
                                return {
                                    label: item.value+" - " + item.kecamatan,
                                    value: item.value,
                                    kecamatan: item.kecamatan,
                                    kabupaten: item.kabupaten,
                                    provinsi: item.provinsi
                                };
                            });
                            response(formattedData);
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    $('#inputDesa').val(ui.item.value);
                    $('#inputKecamatan').val(ui.item.kecamatan);
                    $('#inputKab').val(ui.item.kabupaten);
                    $('#inputProv').val(ui.item.provinsi);
                    return false;
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
