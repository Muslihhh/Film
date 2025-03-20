<form action="{{ route('dashboard.subscriber') }}" method="GET">
<div id="dropdownNegara" class="z-50 hidden bg-white rounded-lg shadow-sm w-60 dark:bg-gray-700">
    <div class="p-3">
        <label for="searchNegaraInput" class="sr-only">Cari Negara</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="searchNegaraInput" onkeyup="filterNegara()" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                placeholder="Cari Negara...">
        </div>
    </div>

    <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200">
        @foreach ($negaraList as $negara)
        <li class="negara-item">
            <div class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                <input type="checkbox" name="negara[]" value="{{ $negara->id }}" 
                       {{ in_array($negara->id, request('negara', [])) ? 'checked' : '' }}>
                <span class="ml-2">{{ $negara->nama_negara }}</span>
            </div>
        </li>
        @endforeach
    </ul>
    <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Cari</button>
</div>
</form>
<script>
    function filterNegara() {
    let input = document.getElementById("searchNegaraInput").value.toLowerCase();
    let negaraItems = document.querySelectorAll(".negara-item");

    negaraItems.forEach(function (item) {
        let text = item.textContent.toLowerCase();
        item.style.display = text.includes(input) ? "" : "none";
    });
}
</script>