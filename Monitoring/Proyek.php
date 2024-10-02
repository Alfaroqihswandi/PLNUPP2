<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles remain unchanged */
        #user-button img {
            border-radius: 50%;
            cursor: pointer;
        }

        #logout-menu {
            display: none;
        }

        #user-button:hover #logout-menu {
            display: block;
        }

        .hidden {
            display: none;
        }

        .compact-header {
            padding: 0.5rem 1rem;
        }

        .compact-input {
            padding: 0.5rem;
        }

        .compact-button {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }

        .sidebar-button {
            padding: 0.5rem;
        }

        .footer-button {
            padding: 0.5rem 1rem;
        }

        .hover-shadow:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
    
    <script>
        // JavaScript functions remain unchanged
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
            button.className = "bg-green-600 text-white px-3 py-1 rounded-full hover:bg-green-700 transition duration-200 m-1 shadow-md transform hover:scale-105";
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

    function toggleDropdown() {
        document.getElementById('logout-menu').classList.toggle('hidden');
    }

    function logout() {
        alert("Logging out...");
        window.location.href = 'tes.php'; // Redirect to tes.php on logout
    }

    function goToDashboard() {
        window.location.href = 'dashboard.php'; // Redirect to dashboard.php
    }
    function toggleDropdown() {
    document.getElementById('logout-menu').classList.toggle('hidden');
}

    function logout() {
        alert("Logging out...");
        window.location.href = '/LoginRegister/tes.php'; // Redirect to tes.php on logout
    }

    function goToDashboard() {
        window.location.href = 'dashboard.php'; // Redirect to dashboard.php
    }
    function logout() {
    alert("Logging out...");
    window.location.href = '/LoginRegister/tes.php'; // Redirect to tes.php on logout
}
function goToDashboard() {
    window.location.href = 'dashboard.php'; // Redirect to dashboard.php
}

function logout() {
    alert("Logging out...");
    window.location.href = 'tes.php'; // Redirect to tes.php on logout
}


</script>

    </script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal min-h-screen flex flex-col">
<header class="compact-header bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-lg flex justify-between items-center">
    <div class="flex items-center">
        <img src="logo.png" alt="Logo" class="w-28 h-auto" onclick="goToDashboard()" style="cursor:pointer;">
    </div>
    <div class="flex-1 text-center">
        <h1 class="text-3xl font-extrabold">Monitoring Proyek</h1>
    </div>
    <div id="user-button" class="relative">
        <img src="logo.png" alt="User Logo" class="w-10 h-10 rounded-full cursor-pointer" onclick="toggleDropdown()">
        <div id="logout-menu" class="hidden absolute right-0 bg-white text-black rounded shadow-lg mt-2 w-32">
            <button onclick="goToDashboard()" class="block w-full text-left px-2 py-1 hover:bg-gray-200">Dashboard</button>
            <button onclick="logout()" class="block w-full text-left px-2 py-1 hover:bg-gray-200">Logout</button>
        </div>
    </div>
</header>

<div id="logout-menu" class="hidden absolute right-0 bg-white text-black rounded shadow-lg mt-2 w-32">
    <button onclick="goToDashboard()" class="block w-full text-left px-2 py-1 hover:bg-gray-200">Dashboard</button>
    <button onclick="logout()" class="block w-full text-left px-2 py-1 hover:bg-gray-200">Logout</button>
</div>

    <div class="flex-grow">
        <div class="flex justify-center mt-2">
            <input type="text" id="newTarget" placeholder="Masukkan nomor T" class="compact-input border border-gray-300 rounded-full w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md">
            <button onclick="addTarget()" class="bg-black text-white compact-button ml-2 rounded-full hover:bg-gray-800 transition duration-300 transform hover:scale-105 shadow-md">Tambah T</button>
        </div>

        <div class="flex justify-center mt-2">
            <div class="menu flex flex-wrap justify-center space-x-2">
            </div>
        </div>

        <div class="main-container flex mt-4">
            <aside class="w-1/5 bg-white p-2 shadow-lg rounded-lg">
                <h2 class="text-lg font-bold mb-2 text-gray-800">Menu Navigasi</h2>
                <button onclick="window.location.href='daily.php'" class="sidebar-button block w-full bg-blue-600 text-white py-1 my-1 rounded-full hover:bg-blue-700 transition duration-300 shadow-md">DAILY</button>
                <button onclick="window.location.href='monthly.php'" class="sidebar-button block w-full bg-blue-600 text-white py-1 my-1 rounded-full hover:bg-blue-700 transition duration-300 shadow-md">MONTHLY</button>
            </aside>

            <section class="content w-4/5 bg-white p-4 mx-2 shadow-lg rounded-lg">
                <div class="flex space-x-2">
                    <div class="flex-1">
                        <img src="tower.png" alt="Turret Image" class="w-full h-auto rounded-lg shadow-lg hover-shadow">
                    </div>
                    <div class="flex-1">
                        <img src="map.png" alt="Project Map" class="w-full h-auto rounded-lg shadow-lg hover-shadow">
                    </div>
                </div>
            </section>
        </div>
    </div>

    <footer class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-4 mt-2 w-full">
        <div class="container mx-auto flex justify-between space-x-2">
            <button onclick="window.location.href='soil_investigation.php'" class="footer-button bg-white text-blue-700 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">SOIL INVESTIGATION</button>
            <button onclick="window.location.href='foundation.php'" class="footer-button bg-white text-blue-700 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">FOUNDATION</button>
            <button onclick="window.location.href='erection.php'" class="footer-button bg-white text-blue-700 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">ERECTION</button>
            <button onclick="window.location.href='row.php'" class="footer-button bg-white text-blue-700 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">ROW</button>
            <button onclick="window.location.href='stringing.php'" class="footer-button bg-white text-blue-700 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">STRINGING</button>
            <button onclick="window.location.href='final_check.php'" class="footer-button bg-white text-blue-700 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">FINAL CHECK</button>
            <button onclick="window.location.href='commissioning.php'" class="footer-button bg-white text-blue-700 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">COMMISSIONING</button>
            <button onclick="window.location.href='tds.php'" class="footer-button bg-white text-blue-700 rounded-full hover:bg-gray-200 transition duration-300 shadow-md">TDS</button>
        </div>
    </footer>
</body>
</html>
