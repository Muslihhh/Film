<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">📌 Dashboard Author</h2>

    <a href="" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Film</a>

    <table class="w-full bg-white shadow-md rounded my-4">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Judul</th>
                <th class="py-3 px-6 text-left">Tahun</th>
                <th class="py-3 px-6 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($films as $film)
            <tr class="border-b border-gray-200">
                <td class="py-3 px-6">{{ $film->judul }}</td>
                <td class="py-3 px-6">{{ $film->tahun_rilis }}</td>
                <td class="py-3 px-6">
                    <a href="" class="text-blue-500">Edit</a> |
                    <form action="" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>