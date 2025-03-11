function openEditFilmModal(id, judul, sinopsis, trailer, id_negara, tahun_rilis, age_category, durasi, genres) {
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

    // Centang checkbox genre yang sudah dimiliki film
    genres.forEach(genreId => {
        let checkbox = document.getElementById('genre-' + genreId);
        if (checkbox) checkbox.checked = true;
    });

    // Set action form ke URL update film
    document.getElementById('edit-film-form').action = '/films/' + id;

    // Tampilkan modal edit
    document.getElementById('edit-film-modal').classList.remove('hidden');
}

function closeEditFilmModal() {
    document.getElementById('edit-film-modal').classList.add('hidden');
}
