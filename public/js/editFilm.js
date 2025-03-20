// Fungsi untuk membuka modal edit
function openEditFilmModal(id, judul, sinopsis, trailer, id_negara, tahun_rilis, age_category, durasi, cast, genres, image, banner, banner_status) {
    // Isi form dengan data film
    document.getElementById('edit-film-id').value = id;
    document.getElementById('edit-judul').value = judul || '';
    document.getElementById('edit-sinopsis').value = sinopsis || '';
    document.getElementById('edit-trailer').value = trailer || '';
    document.getElementById('edit-id_negara').value = id_negara || '';
    document.getElementById('edit-tahun_rilis').value = tahun_rilis || '';
    document.getElementById('edit-age_category').value = age_category || '';
    document.getElementById('edit-durasi').value = durasi || '';
    document.getElementById('edit-cast').value = cast || '';

    // Reset semua checkbox genre
    document.querySelectorAll("#edit-film-modal input[name='genres[]']").forEach(checkbox => {
        checkbox.checked = false;
    });

    // Centang genre yang sudah dimiliki film
    if (genres) {
        JSON.parse(genres).forEach(genreId => {
            let checkbox = document.getElementById('edit-genre-' + genreId);
            if (checkbox) checkbox.checked = true;
        });
    }

    // Tampilkan preview gambar jika ada
    document.getElementById('edit-image-preview').src = image ? `/storage/${image}` : '';
    document.getElementById('edit-banner-preview').src = banner ? `/storage/${banner}` : '';

    // Set banner status checkbox
    document.getElementById('edit-banner-status').checked = banner_status === "1" || banner_status === 1;

    // Perbaiki action form
    document.getElementById('edit-film-form').action = `/admin/films/${id}`;

    // Tampilkan modal edit
    document.getElementById('edit-film-modal').classList.remove('hidden');
}

// Fungsi untuk menutup modal edit
function closeEditFilmModal() {
    // Sembunyikan modal
    document.getElementById('edit-film-modal').classList.add('hidden');
}

// Fungsi untuk menampilkan preview gambar
function previewImage(input, previewId) {
    let file = input.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(previewId).src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        document.getElementById(previewId).src = '';
    }
}