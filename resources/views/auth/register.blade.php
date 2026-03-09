<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ClickFix — Register Pakistan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #f39c12;
            --primary-hover: #d68910;
            --bg-light: #fdfcfb;
            --border-color: #dfe6e9;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 600px;
            padding: 2.5rem;
            border: 1px solid var(--border-color);
        }

        .brand-logo {
            text-align: center;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .form-group label {
            font-weight: 600;
            font-size: 0.85rem;
        }

        .form-control {
            height: 46px;
            border-radius: 6px;
        }

        .input-group-text {
            background: #fff;
            cursor: pointer;
            border-left: none;
        }

        .btn-clickfix {
            background-color: var(--primary);
            border: none;
            color: white;
            height: 48px;
            font-weight: 700;
            margin-top: 1rem;
            transition: 0.3s;
        }

        .btn-clickfix:hover {
            background-color: var(--primary-hover);
            color: white;
        }

        .loading-spinner {
            font-size: 0.75rem;
            color: var(--primary);
            display: none;
            margin-left: 5px;
        }
    </style>
</head>

<body>

    <div class="register-card">
        <div class="brand-logo">ClickFix</div>

        <form action="{{ route('register') }}" method="POST" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone_number" class="form-control" placeholder="+92 300 1234567" required>
                </div>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Country</label>
                <select class="form-control" disabled>
                    <option value="Pakistan" selected>Pakistan</option>
                </select>
                <input type="hidden" name="country" value="Pakistan">
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Province/State <span id="stateLoader" class="loading-spinner"><i
                                class="fas fa-spinner fa-spin"></i></span></label>
                    <select id="state" name="state" class="form-control" required>
                        <option value="">Select Province</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Sindh">Sindh</option>
                        <option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>
                        <option value="Balochistan">Balochistan</option>
                        <option value="Gilgit-Baltistan">Gilgit-Baltistan</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>City <span id="cityLoader" class="loading-spinner"><i
                                class="fas fa-spinner fa-spin"></i></span></label>
                    <select id="city" name="city" class="form-control" required disabled>
                        <option value="">Select Province First</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <input id="password" type="password" name="password" class="form-control" style="border-right:none"
                        required>
                    <div class="input-group-append">
                        <span class="input-group-text toggle-view" data-target="password"><i
                                class="fa fa-eye"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <div class="input-group">
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"
                        style="border-right:none" required>
                    <div class="input-group-append">
                        <span class="input-group-text toggle-view" data-target="password_confirmation"><i
                                class="fa fa-eye"></i></span>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-clickfix btn-block">Register Now</button>
        </form>
    </div>

    <script>
        const stateSelect = document.getElementById('state');
        const citySelect = document.getElementById('city');
        const countryValue = "Pakistan";

        // Load Cities based on State Selection
        stateSelect.addEventListener('change', async function () {
            const selectedState = this.value;

            // Reset and disable City dropdown
            citySelect.innerHTML = '<option value="">Loading Cities...</option>';
            citySelect.disabled = true;

            if (!selectedState) {
                citySelect.innerHTML = '<option value="">Select Province First</option>';
                return;
            }

            document.getElementById('cityLoader').style.display = 'inline-block';

            try {
                const response = await fetch('https://countriesnow.space/api/v0.1/countries/state/cities', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        country: countryValue,
                        state: selectedState
                    })
                });

                const data = await response.json();

                if (data.data && data.data.length > 0) {
                    citySelect.innerHTML = '<option value="">Select City</option>';
                    data.data.forEach(city => {
                        const opt = document.createElement('option');
                        opt.value = city;
                        opt.textContent = city;
                        citySelect.appendChild(opt);
                    });
                    citySelect.disabled = false;
                } else {
                    citySelect.innerHTML = '<option value="">No cities found</option>';
                }
            } catch (error) {
                console.error("City fetch error:", error);
                citySelect.innerHTML = '<option value="">Error loading cities</option>';
            } finally {
                document.getElementById('cityLoader').style.display = 'none';
            }
        });

        // Password Visibility Toggle
        document.querySelectorAll('.toggle-view').forEach(btn => {
            btn.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        });
    </script>
</body>

</html>