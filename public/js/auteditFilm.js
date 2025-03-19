function openEditFilmModal(id, judul, sinopsis, trailer, id_negara, tahun_rilis, age_category, durasi, genres) {
    // Isi form dengan data film
    document.getElementById('edit-film-id').value = id;
    document.getElementById('edit-judul').value = judul;
    document.getElementById('edit-sinopsis').value = sinopsis;
    document.getElementById('edit-trailer').value = trailer;
    document.getElementById('edit-id_negara').value = id_negara;
    document.getElementById('edit-tahun_rilis').value = tahun_rilis;
    document.getElementById('edit-age_category').value = age_category;
    document.getElementById('edit-durasi').value = durasi;

    // Reset semua checkbox genre sebelum menampilkan modal
    document.querySelectorAll("input[name='genres[]']").forEach(checkbox => {
        checkbox.checked = false;
    });

    // Ubah string JSON genres menjadi array JavaScript
    const genreIds = JSON.parse(genres);

    // Centang checkbox genre yang sudah dimiliki film
    genreIds.forEach(genreId => {
        let checkbox = document.getElementById('edit-genre-' + genreId);
        if (checkbox) checkbox.checked = true;
    });

    // Ambil route dari data attribute tombol edit
    const editButton = document.querySelector(`button[data-route*="/film/${id}"]`);
    const route = editButton.getAttribute('data-route');

    // Perbarui action form sesuai route
    document.getElementById('edit-film-form').action = route;

    // Tampilkan modal edit
    document.getElementById('edit-film-modal').classList.remove('hidden');
}

function closeEditFilmModal() {
    // Sembunyikan modal
    document.getElementById('edit-film-modal').classList.add('hidden');
}