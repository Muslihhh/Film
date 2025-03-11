<x-dashboard>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block mb-4 text-white bg-blue-700 hover:bg-blue-800  font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Tambah
          </button>
          @include('admin.negara.addnegara')
          
          
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Negara
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($negaras as $negara)
                    
                
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $negara->nama_negara }}
                    </th>
                    
                        <td class="px-6 py-4 flex gap-2">
                            <button type="button"
                            onclick="openEditModal({{ $negara->id }}, '{{ $negara->nama_negara }}')"
                            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800   font-medium rounded-lg text-sm px-3 py-2 text-center  dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            Edit
                        </button>
                        <!-- Modal Edit -->
    <div id="edit-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 flex bg-black bg-opacity-50 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-lg font-semibold ">Edit Negara</h3>
                <button type="button" onclick="closeEditModal()"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                >
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
                </button>
            </div>
    
            <!-- Modal body -->
            <form id="edit-negara-form" class="p-4" method="POST">
                @csrf
                @method('PUT')
    
                <input type="hidden" id="edit-id" name="id">
    
                <div class="grid gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="edit-nama" class="block mb-2 text-sm font-medium  ">Nama Negara</label>
                        <input type="text" name="nama_negara" id="edit-nama"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:text-white text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            required>
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update
                </button>
            </form>
        </div>
    </div>
    </div>
    <script>
        function openEditModal(id, nama_negara) {
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-nama').value = nama_negara;
    
        // Set action form ke URL update
        document.getElementById('edit-negara-form').action = '/negaras/' + id;
    
        // Tampilkan modal edit
        document.getElementById('edit-modal').classList.remove('hidden');
    }
    
    function closeEditModal() {
        document.getElementById('edit-modal').classList.add('hidden');
    }
    
    </script>

<button type="button"
onclick="setDeleteAction('{{ route('negaras.destroy', $negara->id) }}', '{{ $negara->judul }}')"
data-modal-target="delete-modal" data-modal-toggle="delete-modal"
class=" btn btn-danger flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
    fill="currentColor" aria-hidden="true">
    <path fill-rule="evenodd"
        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
        clip-rule="evenodd" />
</svg>
Delete
</button>
<div id="delete-modal" tabindex="-1"
class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="relative w-full h-auto max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button type="button"
            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
            data-modal-toggle="delete-modal">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
        <!-- Modal -->
        <div class="p-6 text-center">
            <svg aria-hidden="true"
                class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                fill="none" stroke="currentColor" viewbox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <!-- Di modal delete -->
            <p>Apakah Anda yakin ingin menghapus negara <br>
                <strong id="negara-nama_negara"></strong>?
            </p>
            <form id="delete-form" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Yes,
                    I'm sure</button>
                <button type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                    data-modal-toggle="delete-modal">No,
                    cancel</button>
            </form>
        </div>

    </div>
</div>
</div>
<script>
function setDeleteAction(action, nama_negara) {
    document.getElementById('delete-form').action = action;
    document.getElementById('negara-nama_negara').innerText = nama_negara;
}
</script>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard>