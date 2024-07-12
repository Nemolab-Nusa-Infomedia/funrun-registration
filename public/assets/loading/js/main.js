// window.addEventListener("load", function() {
//     var loadingContainer = document.getElementById("loading-container");
//     loadingContainer.style.display = "none";
// });

window.addEventListener("load", function() {
    // Simulasi waktu loading
    var loadingDuration = 2500; // Durasi loading dalam milidetik (3 detik)
    var loadingContainer = document.getElementById("loading-container");

    // Fungsi untuk menyembunyikan loader setelah waktu yang ditentukan
    function hideLoader() {
    loadingContainer.style.display = "none";
    }

    // Cek jika halaman telah dimuat sebelum waktu yang ditentukan
    if (document.readyState === "complete") {
    setTimeout(hideLoader, loadingDuration);
    } else {
    window.addEventListener("load", function() {
        setTimeout(hideLoader, loadingDuration);
    });
    }
});
