<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }

        .input-group-text {
            background-color: #ffffff;
            border-right: none;
        }

        .form-control {
            border-left: none;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .text-muted {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <div class="card">
        <h3 class="text-center fw-bold mb-2">Login</h3>
        <p class="text-center text-muted mb-4">Please login to your account</p>
        <form method="POST" action="">
            <!-- @csrf (aktifkan kalau pakai Laravel) -->

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <!-- @error('email') -->
                <!-- <div class="invalid-feedback d-flex align-items-center mt-1" style="display: block;">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <span>Pesan error email</span>
                </div> -->
                <!-- @enderror -->
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <!-- @error('password') -->
                <!-- <div class="invalid-feedback d-flex align-items-center mt-1" style="display: block;">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <span>Pesan error password</span>
                </div> -->
                <!-- @enderror -->
            </div>

            <!-- Tombol -->
            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Login</button>
            </div>
        </form>
    </div>

</body>

</html>
