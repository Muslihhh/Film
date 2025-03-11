<x-dashboard>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                   <th>
                    Tanggal Bergabung
                   </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{ $user->name }}
                    </th>
                    <td class="px-6 py-4">
                       {{ $user->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->role }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->created_at->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <button type="button" 
                        onclick="openEditUser({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')"
                        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800   font-medium rounded-lg text-sm px-3 py-2 text-center  dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Edit</button>
                        <!-- Modal Edit User -->
<div id="edit-user-modal" class="hidden fixed inset-0 flex items-center justify-center z-50 w-full h-full bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <!-- Modal Header -->
        <div class="flex items-center justify-between p-4 border-b">
            <h3 class="text-lg font-semibold">Edit User</h3>
            <button type="button" onclick="closeEditUserModal()" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
            >
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            </button>
        </div>

        <!-- Form Edit -->
        <form id="edit-user-form" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" id="edit-user-id" name="user_id">

            <label class="block mb-2">
                <span class="">Nama</span>
                <input type="text" id="edit-user-name" name="name" class="w-full bg-gray-50 dark:text-white text-gray-900 dark:bg-gray-700 border border-gray-300 px-3 py-2 rounded">
            </label>

            <label class="block mb-2">
                <span class="">Email</span>
                <input type="email" id="edit-user-email" name="email" class="w-full px-3 py-2 dark:text-white text-gray-900 bg-gray-50 dark:bg-gray-700 border border-gray-300 rounded">
            </label>

            <label class="block mb-2">
                <span class="">Role</span>
                <select id="edit-user-role" name="role" class="w-full px-3 py-2 dark:text-white text-gray-900 bg-gray-50 dark:bg-gray-700 border border-gray-300 rounded">
                    <option value="admin">Admin</option>
                    <option value="author">Author</option>
                    <option value="subscriber">Subscriber</option>
                </select>
            </label>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded mt-4">Update</button>
        </form>
    </div>
</div>
<script>
    function openEditUser(id, name, email, role) {
    // Mengisi form edit dengan data user yang dipilih
    document.getElementById('edit-user-id').value = id;
    document.getElementById('edit-user-name').value = name;
    document.getElementById('edit-user-email').value = email;
    document.getElementById('edit-user-role').value = role;

    // Set action form agar mengarah ke route update
    document.getElementById('edit-user-form').action = '/users/' + id;

    // Tampilkan modal edit
    document.getElementById('edit-user-modal').classList.remove('hidden');
}

function closeEditUserModal() {
    document.getElementById('edit-user-modal').classList.add('hidden');
}

</script>
                        
                        
                        <button type="button"
                        onclick="setDeleteAction('{{ route('users.destroy', $user->id) }}', '{{ $user->nama }}')"
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
                                    <p>Apakah Anda yakin ingin menghapus user <br>
                                        <strong id="user-nama"></strong>?
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
                        function setDeleteAction(action, nama) {
                            document.getElementById('delete-form').action = action;
                            document.getElementById('user-nama').innerText = nama;
                        }
                    </script>
                    </td>
               </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard>