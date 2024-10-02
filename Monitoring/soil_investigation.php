<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soil Investigation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        let investigations = [];
        let editIndex = null; // Variabel untuk menyimpan index saat editing

        function saveData(event) {
            event.preventDefault();
            const form = event.target;
            const newData = {
                number: form.number.value,
                location: form.location.value,
                sondir: form.sondir.checked,
                boring: form.boring.checked,
                progress: form.progress.value,
                keterangan: form.keterangan.value,
                date: new Date().toLocaleDateString() // Tambahkan tanggal secara otomatis
            };

            if (editIndex !== null) {
                investigations[editIndex] = newData; // Mengganti data lama dengan yang baru
                editIndex = null; // Reset editIndex setelah penyimpanan
            } else {
                investigations.push(newData); // Menambahkan data baru jika bukan dalam mode edit
            }

            form.reset();
            displayData();
        }

        function displayData() {
            const results = document.getElementById("results");
            results.innerHTML = "";
            investigations.forEach((data, index) => {
                const row = document.createElement("tr");
                row.className = "border-b border-gray-200";
                row.innerHTML = `
                    <td class="py-3 px-4 text-center">${data.number}</td>
                    <td class="py-3 px-4 text-center">${data.location}</td>
                    <td class="py-3 px-4 text-center">${data.sondir ? 'Yes' : 'No'}</td>
                    <td class="py-3 px-4 text-center">${data.boring ? 'Yes' : 'No'}</td>
                    <td class="py-3 px-4 text-center">${data.progress}</td>
                    <td class="py-3 px-4 text-center">${data.keterangan}</td>
                    <td class="py-3 px-4 text-center">${data.date}</td>
                    <td class="py-3 px-4 text-center">
                        <button onclick="editData(${index})" class="bg-yellow-400 text-white py-1 px-3 rounded hover:bg-yellow-500">Edit</button>
                        <button onclick="deleteData(${index})" class="bg-red-600 text-white py-1 px-3 rounded hover:bg-red-700">Hapus</button>
                    </td>
                `;
                results.appendChild(row);
            });
        }

        function editData(index) {
            const data = investigations[index];
            const form = document.getElementById("investigationForm");
            form.number.value = data.number;
            form.location.value = data.location;
            form.sondir.checked = data.sondir;
            form.boring.checked = data.boring;
            form.progress.value = data.progress;
            form.keterangan.value = data.keterangan;
            editIndex = index; // Menyimpan index yang sedang diedit
        }

        function deleteData(index) {
            investigations.splice(index, 1);
            displayData();
        }
        function editData(index) {
    const data = investigations[index];
    const form = document.getElementById("investigationForm");
    form.number.value = data.number;
    form.location.value = data.location;
    form.sondir.checked = data.sondir;
    form.boring.checked = data.boring;
    form.progress.value = data.progress;
    form.keterangan.value = data.keterangan;
    editIndex = index; // Menyimpan index yang sedang diedit
    document.querySelector('button[type="submit"]').textContent = 'Update Data'; // Mengubah teks tombol submit menjadi "Update Data"
}

function saveData(event) {
    event.preventDefault();
    const form = event.target;
    const newData = {
        number: form.number.value,
        location: form.location.value,
        sondir: form.sondir.checked,
        boring: form.boring.checked,
        progress: form.progress.value,
        keterangan: form.keterangan.value,
        date: new Date().toLocaleDateString() // Tambahkan tanggal secara otomatis
    };

    if (editIndex !== null) {
        investigations[editIndex] = newData; // Mengganti data lama dengan yang baru
        editIndex = null; // Reset editIndex setelah penyimpanan
        document.querySelector('button[type="submit"]').textContent = 'Simpan Data'; // Mengubah teks tombol submit menjadi "Simpan Data"
    } else {
        investigations.push(newData); // Menambahkan data baru jika bukan dalam mode edit
    }

    form.reset();
    displayData();
}
    </script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="container mx-auto mt-10">
        <header class="mb-10">
            <h1 class="text-3xl font-bold text-center text-gray-800">Soil Investigation</h1>
        </header>

        <!-- Button Kembali -->
        <div class="mb-6">
            <a href="Proyek.php" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700">
                Kembali
            </a>
        </div>

        <form id="investigationForm" onsubmit="saveData(event)">
            <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Tower Number</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Condition of Tower Location</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Sondir</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Boring</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Progress</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class='bg-gray-100 border-b border-gray-200'>
                            <td class='py-3 px-4'><input type="text" name="number" class="form-input block  text-gray-700 border border-gray-300 rounded-md" required></td>
                            <td class='py-3 px-4'>
                                <select name="location" class="form-select block w-full mt-1 text-gray-700" required>
                                    <option value="tanah_kosong">Tanah Kosong</option>
                                    <option value="kebun">Kebun</option>
                                </select>
                            </td>
                            <td class='py-3 px-4'><input type="checkbox" name="sondir" class="form-checkbox text-blue-600"></td>
                            <td class='py-3 px-4'><input type="checkbox" name="boring" class="form-checkbox text-blue-600"></td>
                            <td class='py-3 px-4'>
                                <select name="progress" class="form-select block w-full mt-1 text-gray-700" required>
                                    <option value="not_yet">Not Yet</option>
                                    <option value="idle">Idle</option>
                                    <option value="on_going">On Going</option>
                                    <option value="done">Done</option>
                                </select>
                            </td>
                            <td class='py-3 px-4'><input type="text" name="keterangan" class="form-input block w-full text-gray-700 border border-gray-300 rounded-md"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 text-right">
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Simpan Data
                </button>
            </div>
        </ form>

        <!-- Output Table -->
        <section class="container mx-auto mt-8 p-6 bg-white shadow-lg">
            <h2 class="text-2xl font-semibold mb-4">Soil Investigation Data</h2>
            <table class="min-w-full bg-white table-auto mx-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 text-center">Tower Number</th>
                        <th class="py-2 text-center">Location</th>
                        <th class="py-2 text-center">Sondir</th>
                        <th class="py-2 text-center">Boring</th>
                        <th class="py-2 text-center">Progress</th>
                        <th class="py-2 text-center">Keterangan</th>
                        <th class="py-2 text-center">Date</th>
                        <th class="py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="results">
                    <!-- Data akan muncul di sini -->
                </tbody>
            </table>
        </section>
    </div>
</body>

</html>