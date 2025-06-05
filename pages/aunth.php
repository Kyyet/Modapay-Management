<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <script>
        // Bypass authentication
        if (sessionStorage.getItem("authenticated")) {
            let lastPage = sessionStorage.getItem("lastPage");

            if (lastPage) {
                window.location.href = lastPage;
            } else {
                window.location.href = "dashboard.php";
            }
        }
    </script>
    <style>
        body {
            background: url('../assets/images/ModaPay_New.png') no-repeat center center fixed;
            background-size: contain;
            backdrop-filter: blur(15px);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .auth-card {
            background: rgba(255, 255, 255, 0.70);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            z-index: 1;
        }
        .auth-card img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .auth-card img:hover {
            transform: scale(1.1);
        }
        .code-input {
            width: 50px;
            height: 50px;
            text-align: center;
            margin: 5px;
            font-size: 1.5rem;
            border: 2px solid #ccc;
            border-radius: 8px;
            transition: border 0.2s ease-in-out;
        }
        .code-input:focus {
            border-color: #DE476F;
            outline: none;
        }
        .error {
            border-color: red !important;
            animation: shake 0.3s ease-in-out;
        }
        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }
        .btn-custom {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(45deg, #DE476F, #FF6B8A);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }
        .error-message {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- Authentication card -->
    <div class="auth-card">
        <img src="../assets/images/ModaPay_New.png" alt="">
        <h3>Authenticate ModaPay</h3>
        <p>Enter the authenticate code</p>
        <form id="auth-form">
            <div class="d-flex justify-content-center">
                <input type="text" maxlength="1" class="code-input" required>
                <input type="text" maxlength="1" class="code-input" required>
                <input type="text" maxlength="1" class="code-input" required>
                <input type="text" maxlength="1" class="code-input" required>
            </div>
            <button type="submit" class="btn btn-custom">Submit</button>
            <p id="error-message" class="error-message"></p>
        </form>
    </div>

    <script type="module">
        const inputs = document.querySelectorAll('.code-input');
        const form = document.getElementById('auth-form');
        const errorMessage = document.getElementById('error-message');
        const correctCode = "2025"; // Kode yang benar

        // Fungsi untuk memastikan input sebelumnya terisi sebelum pindah ke input lain
        function checkPreviousInputs(index) {
            for (let i = 0; i < index; i++) {
                if (inputs[i].value === "") {
                    inputs[i].focus();
                    return false;
                }
            }
            return true;
        }

        // Auto-focus dan validasi input
        inputs.forEach((input, index) => {
            // Jika input diklik, pastikan input sebelumnya sudah diisi
            input.addEventListener('focus', () => {
                if (!checkPreviousInputs(index)) {
                    return;
                }
            });

            // Pastikan hanya angka yang bisa dimasukkan
            input.addEventListener('input', (e) => {
                if (!/^\d$/.test(e.target.value)) {
                    e.target.value = "";
                }
                
                if (e.target.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            // Pindah ke input sebelumnya saat tekan Backspace
            input.addEventListener('keydown', (e) => {
                if (e.key === "Backspace" && index > 0 && input.value === "") {
                    inputs[index - 1].focus();
                }
            });

            // Reset error saat mulai mengetik
            input.addEventListener('input', () => {
                input.classList.remove('error');
                errorMessage.textContent = "";
            });
        });

        // Handle form submission
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Gabungkan kode dari input
            let enteredCode = "";
            inputs.forEach(input => enteredCode += input.value);

            if (enteredCode === correctCode) {
                // Simpan autentikasi di sessionStorage
                sessionStorage.setItem("authenticated", "true");

                // Redirect ke dashboard
                window.location.href = "dashboard.php";
            } else {
                // Tampilkan error dan goyangkan input
                errorMessage.textContent = "Incorrect code. Please try again.";
                inputs.forEach(input => input.classList.add('error'));

                // Kosongkan input dan kembali ke input pertama
                setTimeout(() => {
                    inputs.forEach(input => input.value = "");
                    inputs[0].focus();
                }, 300);
            }
        });

        // Pastikan fokus mulai dari input pertama saat halaman dimuat
        window.onload = () => {
            inputs[0].focus();
            
            // Jika sudah login, langsung ke dashboard
            if (sessionStorage.getItem("authenticated") === "true") {
                window.location.href = "dashboard.php";
            }
        };
    </script>
</body>
</html>