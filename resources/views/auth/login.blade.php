<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro-Stream POS | Kitchen & Service Documentation</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            /* Professional Color Palette */
            --bg-body: #0a0f18;
            --card-bg: #161f2e;
            --header-bg: #1e293b;
            --accent-emerald: #10b981; /* Ready / Success */
            --accent-amber: #f59e0b;   /* Preparing / Warning */
            --accent-rose: #f43f5e;    /* Priority / Alert */
            --accent-blue: #3b82f6;    /* New / Bar */
            --text-main: #f1f5f9;
            --text-dim: #94a3b8;
            --border: #334155;
            --shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.4);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.6;
            padding-bottom: 50px;
        }

        /* Documentation Header */
        header {
            background: linear-gradient(135deg, var(--header-bg), #0f172a);
            padding: 40px 5%;
            border-bottom: 1px solid var(--border);
            text-align: center;
        }

        header h1 {
            font-size: 2.5rem;
            letter-spacing: -1px;
            margin-bottom: 10px;
        }

        header p {
            color: var(--text-dim);
            font-weight: 300;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .section-title {
            margin: 40px 0 20px;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--accent-blue);
        }

        .section-title::after {
            content: "";
            height: 1px;
            flex-grow: 1;
            background: var(--border);
        }

        /* Grid Layout for Screens */
        .pos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
        }

        /* Card Styling */
        .kds-card {
            background: var(--card-bg);
            border-radius: 16px;
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform 0.2s ease;
        }

        .kds-card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.03);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border);
        }

        .table-badge {
            background: var(--accent-blue);
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.85rem;
        }

        .timer {
            font-family: monospace;
            font-size: 1.1rem;
            color: var(--accent-amber);
        }

        .card-body {
            padding: 20px;
        }

        .order-list {
            list-style: none;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .order-item:last-child { border: none; }

        .qty {
            font-weight: 700;
            color: var(--accent-emerald);
            margin-right: 10px;
        }

        .mod {
            display: block;
            font-size: 0.8rem;
            color: var(--accent-rose);
            font-style: italic;
        }

        .footer-action {
            padding: 15px 20px;
            background: rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
        }

        .btn-ready { background: var(--accent-emerald); color: white; }
        .btn-ready:hover { background: #059669; }

        /* Storyboard Flow */
        .storyboard {
            background: var(--card-bg);
            padding: 30px;
            border-radius: 16px;
            border: 1px solid var(--border);
        }

        .step {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            position: relative;
        }

        .step-num {
            min-width: 40px;
            height: 40px;
            background: var(--accent-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .step-content h4 {
            color: var(--accent-emerald);
            margin-bottom: 5px;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .pos-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<header>
    <h1>POS System Research & UI Documentation</h1>
    <p>Client Presentation: Workflow Architecture for Bar, Waiter, and Kitchen</p>
</header>

<div class="container">

    <h2 class="section-title">01. High-Level Flow Storyboard</h2>
    <div class="storyboard">
        <div class="step">
            <div class="step-num">1</div>
            <div class="step-content">
                <h4>Waiter Entry</h4>
                <p>Waiter opens Table 12 on a mobile handheld. Inputs order. System splits the data: Drinks to Bar, Food to Kitchen.</p>
            </div>
        </div>
        <div class="step">
            <div class="step-num">2</div>
            <div class="step-content">
                <h4>Kitchen Notification (KDS)</h4>
                <p>Kitchen screen chimes. New ticket appears in <strong>Blue</strong>. Timer starts counting from 00:00.</p>
            </div>
        </div>
        <div class="step">
            <div class="step-num">3</div>
            <div class="step-content">
                <h4>Preparation & Ready</h4>
                <p>Chef taps item to mark "In Progress". Once finished, taps "Ready". Ticket flashes green and moves to waiter's handheld.</p>
            </div>
        </div>
    </div>

    <h2 class="section-title">02. Kitchen Display System (Visual Mockup)</h2>
    <div class="pos-grid">
        
        <div class="kds-card">
            <div class="card-header">
                <span class="table-badge">TABLE 08</span>
                <span class="timer">12:45</span>
            </div>
            <div class="card-body">
                <ul class="order-list">
                    <li class="order-item">
                        <span><span class="qty">2</span> Grilled Salmon</span>
                        <span class="mod">+ Extra Lemon</span>
                    </li>
                    <li class="order-item">
                        <span><span class="qty">1</span> Ribeye Steak</span>
                        <span class="mod">Medium Rare</span>
                    </li>
                    <li class="order-item">
                        <span><span class="qty">3</span> Caesar Salad</span>
                    </li>
                </ul>
            </div>
            <div class="footer-action">
                <button class="btn btn-ready">Mark Order Ready</button>
            </div>
        </div>

        <div class="kds-card" style="border-left: 5px solid var(--accent-rose);">
            <div class="card-header">
                <span class="table-badge" style="background:var(--accent-rose)">TABLE 04</span>
                <span class="timer" style="color:var(--accent-rose)">18:10</span>
            </div>
            <div class="card-body">
                <ul class="order-list">
                    <li class="order-item">
                        <span><span class="qty">1</span> Margherita Pizza</span>
                        <span class="mod">NO ONIONS</span>
                    </li>
                    <li class="order-item">
                        <span><span class="qty">4</span> Buffalo Wings</span>
                        <span class="mod">Extra Spicy</span>
                    </li>
                </ul>
            </div>
            <div class="footer-action">
                <button class="btn btn-ready">Mark Order Ready</button>
            </div>
        </div>

    </div>

    <h2 class="section-title">03. Communications Logic</h2>
    <table style="width:100%; border-collapse: collapse; background: var(--card-bg); border-radius: 12px; overflow: hidden;">
        <thead style="background: var(--border);">
            <tr>
                <th style="padding: 15px; text-align: left;">Person</th>
                <th style="padding: 15px; text-align: left;">Screen View</th>
                <th style="padding: 15px; text-align: left;">Action Effect</th>
            </tr>
        </thead>
        <tbody>
            <tr style="border-bottom: 1px solid var(--border);">
                <td style="padding: 15px;"><strong>Waiter</strong></td>
                <td style="padding: 15px;">Table Map & Menu Grid</td>
                <td style="padding: 15px;">Sends items to kitchen immediately.</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border);">
                <td style="padding: 15px;"><strong>Chef</strong></td>
                <td style="padding: 15px;">List of Pending Tickets</td>
                <td style="padding: 15px;">Tapping "Ready" alerts the Waiter.</td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border);">
                <td style="padding: 15px;"><strong>Barman</strong></td>
                <td style="padding: 15px;">Liquid Only Queue</td>
                <td style="padding: 15px;">Clears drinks as they are poured.</td>
            </tr>
        </tbody>
    </table>

</div>

</body>
</html>