<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Proyek</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        const targets = [];

        function addTarget() {
            const input = document.getElementById('newTarget');
            const targetValue = input.value.trim();

            if (!targetValue || targetValue.includes(' ')) {
                alert("Masukkan nomor T yang valid (tidak boleh kosong atau mengandung spasi).");
                return;
            }

            if (targets.includes(targetValue)) {
                alert("T." + targetValue + " sudah ada.");
                input.value = ''; 
                return;
            }

            targets.push(targetValue);
            input.value = '';

            targets.sort((a, b) => a - b);
            updateMenu();

            fetch('save_target.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ target: targetValue })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function updateMenu() {
            const menu = document.querySelector('.menu');
            menu.innerHTML = '';

            targets.forEach(target => {
                const button = document.createElement('button');
                button.textContent = "T." + target;
                button.className = "bg-green-600 text-white px-4 py-2 rounded-full hover:bg-green-700 transition duration-200 m-2 shadow-md transform hover:scale-105";
                button.onclick = function() {
                    window.location.href = 'template.php?target=' + encodeURIComponent("T." + target);
                };
                menu.appendChild(button);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetch('get_targets.php')
                .then(response => response.json())
                .then(data => {
                    data.targets.forEach(target => {
                        targets.push(target.nomor_t);
                    });
                    targets.sort((a, b) => a - b);
                    updateMenu();
                });
        });
    </script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Header -->
    <header class="p-6 bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-lg">
        <h1 class="text-4xl font-extrabold text-center font-poppins">Monitoring Proyek</h1>
        <div class="flex justify-center mt-4">
            <input type="text" id="newTarget" placeholder="Masukkan nomor T" class="border border-gray-300 p-3 rounded-full w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md">
            <button onclick="addTarget()" class="bg-black text-white px-6 py-3 rounded-full ml-2 hover:bg-gray-800 transition duration-300 transform hover:scale-105 shadow-md">Tambah T</button>
        </div>
        <div class="menu flex justify-center mt-6 space-x-4">
            <!-- Buttons akan muncul di sini -->
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-container flex mt-10">
        <!-- Sidebar Kiri -->
        <aside class="w-1/4 bg-white p-6 shadow-lg rounded-lg">
            <h2 class="text-xl font-bold mb-4 text-gray-700">Menu Navigasi</h2>
            <button onclick="window.location.href='daily.php'" class="block w-full bg-blue-600 text-white py-3 my-2 rounded-full hover:bg-blue-700 transition duration-300 shadow-md">DAILY</button>
            <button onclick="window.location.href='monthly.php'" class="block w-full bg-blue-600 text-white py-3 my-2 rounded-full hover:bg-blue-700 transition duration-300 shadow-md">MONTHLY</button>
        </aside>

        <!-- Konten Tengah -->
        <section class="content w-3/4 bg-white p-6 mx-6 shadow-lg rounded-lg">
            <div class="turret mb-6">
                <img src="path/to/turret_image.jpg" alt="Turret Image" class="w-full rounded-lg shadow-lg">
            </div>
            <div class="map-container">
                <img src="path/to/project_map.jpg" alt="Project Map" class="w-full rounded-lg shadow-lg">
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-6 mt-10">
        <div class="container mx-auto text-center space-x-4">
            <button onclick="window.location.href='soil_investigation.php'" class="bg-white text-blue-700 px-4 py-2 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">SOIL INVESTIGATION</button>
            <button onclick="window.location.href='foundation.php'" class="bg-white text-blue-700 px-4 py-2 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">FOUNDATION</button>
            <button onclick="window.location.href='erection.php'" class="bg-white text-blue-700 px-4 py-2 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">ERECTION</button>
            <button onclick="window.location.href='row.php'" class="bg-white text-blue-700 px-4 py-2 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">ROW</button>
            <button onclick="window.location.href='stringing.php'" class="bg-white text-blue-700 px-4 py-2 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">STRINGING</button>
            <button onclick="window.location.href='final_check.php'" class="bg-white text-blue-700 px-4 py-2 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">FINAL CHECK</button>
            <button onclick="window.location.href='commissioning.php'" class="bg-white text-blue-700 px-4 py-2 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">COMMISSIONING</button>
        </div>
    </footer>
</body>
</html>
