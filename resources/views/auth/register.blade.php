<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ClickFix — Global Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --primary: #f39c12; --primary-hover: #d68910; --bg-light: #fdfcfb; --border-color: #dfe6e9; }
        body { background-color: var(--bg-light); font-family: 'Segoe UI', sans-serif; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .register-card { background: #fff; border-radius: 12px; box-shadow: 0 15px 35px rgba(0,0,0,0.05); width: 100%; max-width: 600px; padding: 2.5rem; border: 1px solid var(--border-color); }
        .brand-logo { text-align: center; font-size: 2rem; font-weight: 800; color: var(--primary); text-transform: uppercase; margin-bottom: 1rem; }
        .form-group label { font-weight: 600; font-size: 0.85rem; }
        .form-control { height: 46px; border-radius: 6px; }
        .input-group-text { background: #fff; cursor: pointer; border-left: none; }
        .btn-clickfix { background-color: var(--primary); border: none; color: white; height: 48px; font-weight: 700; margin-top: 1rem; transition: 0.3s; }
        .btn-clickfix:hover { background-color: var(--primary-hover); color: white; }
        .loading-spinner { font-size: 0.75rem; color: var(--primary); display: none; margin-left: 5px; }
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
                    <input type="tel" name="phone_number" class="form-control" placeholder="+123456789" required>
                </div>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Country <span id="countryLoader" class="loading-spinner"><i class="fas fa-spinner fa-spin"></i></span></label>
                <select id="country" name="country" class="form-control" required>
                    <option value="">Loading Countries...</option>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>State/Province <span id="stateLoader" class="loading-spinner"><i class="fas fa-spinner fa-spin"></i></span></label>
                    <select id="state" name="state" class="form-control" required disabled>
                        <option value="">Select Country First</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>City <span id="cityLoader" class="loading-spinner"><i class="fas fa-spinner fa-spin"></i></span></label>
                    <select id="city" name="city" class="form-control" required disabled>
                        <option value="">Select State First</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <input id="password" type="password" name="password" class="form-control" style="border-right:none" required>
                    <div class="input-group-append">
                        <span class="input-group-text toggle-view" data-target="password"><i class="fa fa-eye"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <div class="input-group">
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" style="border-right:none" required>
                    <div class="input-group-append">
                        <span class="input-group-text toggle-view" data-target="password_confirmation"><i class="fa fa-eye"></i></span>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-clickfix btn-block">Register Now</button>
        </form>
    </div>

    <script>
        const countrySelect = document.getElementById('country');
        const stateSelect = document.getElementById('state');
        const citySelect = document.getElementById('city');

        // Initial Load: All Countries
        async function loadCountries() {
            document.getElementById('countryLoader').style.display = 'inline-block';
            try {
                const response = await fetch('https://countriesnow.space/api/v0.1/countries/iso');
                const data = await response.json();
                countrySelect.innerHTML = '<option value="">Select Country</option>';
                data.data.forEach(c => {
                    const opt = document.createElement('option');
                    opt.value = c.name;
                    opt.textContent = c.name;
                    countrySelect.appendChild(opt);
                });
            } catch (e) { console.error("Countries failed", e); }
            document.getElementById('countryLoader').style.display = 'none';
        }

        // Load States based on Country
        countrySelect.addEventListener('change', async function() {
            stateSelect.innerHTML = '<option value="">Loading...</option>';
            stateSelect.disabled = true;
            citySelect.disabled = true;
            if (!this.value) return;

            document.getElementById('stateLoader').style.display = 'inline-block';
            try {
                const response = await fetch('https://countriesnow.space/api/v0.1/countries/states', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ country: this.value })
                });
                const data = await response.json();
                stateSelect.innerHTML = '<option value="">Select State</option>';
                data.data.states.forEach(s => {
                    const opt = document.createElement('option');
                    opt.value = s.name;
                    opt.textContent = s.name;
                    stateSelect.appendChild(opt);
                });
                stateSelect.disabled = false;
            } catch (e) { stateSelect.innerHTML = '<option value="">No states found</option>'; }
            document.getElementById('stateLoader').style.display = 'none';
        });

        // Load Cities based on State
        stateSelect.addEventListener('change', async function() {
            citySelect.innerHTML = '<option value="">Loading...</option>';
            citySelect.disabled = true;
            if (!this.value) return;

            document.getElementById('cityLoader').style.display = 'inline-block';
            try {
                const response = await fetch('https://countriesnow.space/api/v0.1/countries/state/cities', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ country: countrySelect.value, state: this.value })
                });
                const data = await response.json();
                citySelect.innerHTML = '<option value="">Select City</option>';
                data.data.forEach(c => {
                    const opt = document.createElement('option');
                    opt.value = c;
                    opt.textContent = c;
                    citySelect.appendChild(opt);
                });
                citySelect.disabled = false;
            } catch (e) { citySelect.innerHTML = '<option value="">No cities found</option>'; }
            document.getElementById('cityLoader').style.display = 'none';
        });

        // Eye Toggle
        document.querySelectorAll('.toggle-view').forEach(btn => {
            btn.addEventListener('click', function() {
                const input = document.getElementById(this.getAttribute('data-target'));
                const icon = this.querySelector('i');
                input.type = input.type === 'password' ? 'text' : 'password';
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        });

        window.onload = loadCountries;
    </script>
</body>
</html>