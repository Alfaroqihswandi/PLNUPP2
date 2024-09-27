<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROW (Right of Way)</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function addRow() {
            const location = document.getElementById('location').value;
            const width = document.getElementById('width').value;
            const status = document.getElementById('status').value;
            const date = new Date().toLocaleDateString();

            const table = document.getElementById('results');
            const newRow = table.insertRow();
            newRow.innerHTML = `
                <td class="border px-4 py-2">${location}</td>
                <td class="border px-4 py-2">${width}</td>
                <td class="border px-4 py-2">${status}</td>
                <td class="border px-4 py-2">${date}</td>
            `;

            // Clear input fields after submitting
            document.getElementById('location').value = '';
            document.getElementById('width').value = '';
            document.getElementById('status').value = '';
        }
    </script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Header -->

    <header class="p-6 bg-blue-700 text-white">
        <h1 class="text-3xl font-bold text-center">ROW (Right of Way)</h1>
    </header>

     <!-- Button Kembali -->
     <div class="mb-6">
            <a href="Proyek.php" class="bg-gray-600 text-white py-1 px-4 rounded hover:bg-gray-700">
                Kembali
            </a>
        </div>

    <!-- Form Input -->
    <section class="container mx-auto mt-8 p-6 bg-white shadow-lg">
        <h2 class="text-2xl font-semibold mb-4">Input Data ROW</h2>
        <form onsubmit="event.preventDefault(); addRow();" class="space-y-4">
            <div>
                <label for="location" class="block font-medium text-gray-700">Location:</label>
                <input type="text" id="location" name="location" class="border border-gray-300 p-2 rounded-md w-full" required>
            </div>
            <div>
                <label for="width" class="block font-medium text-gray-700">Width (m):</label>
                <input type="number" id="width" name="width" class="border border-gray-300 p-2 rounded-md w-full" required>
            </div>
            <div>
                <label for="status" class="block font-medium text-gray-700">Status:</label>
                <input type="text" id="status" name="status" class="border border-gray-300 p-2 rounded-md w-full" required>
            </div>
            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Simpan</button>
                <button type="button" onclick="window.history.back();" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</button>
            </div>
        </form>
    </section>

    <!-- Output Table -->
    <section class="container mx-auto mt-8 p-6 bg-white shadow-lg">
        <h2 class="text-2xl font-semibold mb-4">ROW Results</h2>
        <table class="min-w-full bg-white table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/4 py-2">Location</th>
                    <th class="w-1/4 py-2">Width (m)</th>
                    <th class="w-1/4 py-2">Status</th>
                    <th class="w-1/4 py-2">Date</th>
                </tr>
            </thead>
            <tbody id="results">
                <!-- Data akan muncul di sini -->
            </tbody>
        </table>
    </section>
</body>
</html>
