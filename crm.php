<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour CRM - Pitch Black Edition</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --bg-color: #000000;
            --card-bg: #0a0a0a;
            --neon-red: #ff0033;
            --text-white: #ffffff;
            --border-color: #333333;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-white);
            margin: 0; 
            padding: 0;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Rajdhani', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-white);
        }

        /* --- 3D & ANIMATION --- */
        .animate-entry { animation: fadeInUp 0.6s ease-out; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* --- BLACK GLASS CARDS --- */
        .glass-card {
            background: rgba(10, 10, 10, 0.9);
            border: 1px solid var(--border-color);
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,1);
            transition: all 0.3s ease;
        }
        .glass-card:hover {
            transform: translateY(-5px);
            border-color: var(--neon-red);
            box-shadow: 0 0 25px rgba(255, 0, 51, 0.3);
        }

        /* --- SIDEBAR --- */
        .sidebar {
            width: 260px;
            background: #000000;
            border-right: 1px solid #222;
            min-height: 100vh;
            position: fixed;
            left: 0; top: 0;
            z-index: 100;
        }
        
        .nav-link {
            color: #bbbbbb; /* Slightly grey for inactive */
            margin: 10px 15px;
            border-radius: 5px;
            padding: 12px 20px;
            transition: 0.3s;
            border-left: 3px solid transparent;
            cursor: pointer;
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--text-white);
            background: #111;
            border-left: 3px solid var(--neon-red);
            text-shadow: 0 0 8px white;
        }

        /* --- CONTENT AREA --- */
        .content-wrapper { margin-left: 260px; padding: 30px; }

        /* --- FORMS & INPUTS (White Text on Black) --- */
        .form-label { color: var(--text-white); font-weight: 500; }
        .form-control, .form-select {
            background-color: #111;
            border: 1px solid #444;
            color: var(--text-white);
            border-radius: 8px;
            padding: 12px;
        }
        .form-control:focus, .form-select:focus {
            background-color: #000;
            border-color: var(--neon-red);
            color: var(--text-white);
            box-shadow: 0 0 10px rgba(255, 0, 51, 0.2);
        }
        .form-control::placeholder { color: #666; }

        /* --- BUTTONS --- */
        .btn-red {
            background: linear-gradient(135deg, #ff0033 0%, #990000 100%);
            border: none;
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(255, 0, 51, 0.4);
            transition: 0.3s;
        }
        .btn-red:hover {
            transform: scale(1.05);
            color: white;
            box-shadow: 0 0 25px var(--neon-red);
        }

        /* --- TABLES --- */
        .table { color: var(--text-white); border-color: #333; }
        .table thead th {
            color: var(--neon-red);
            border-bottom: 2px solid #333;
            background: #050505;
        }
        .table tbody td { border-bottom: 1px solid #222; }
        .table-hover tbody tr:hover { background-color: #111; color: white; }

        /* --- UTILS --- */
        .text-muted { color: #aaaaaa !important; } /* Force lighter grey for readability */
        .border-bottom { border-color: #333 !important; }
        .stat-val { font-size: 2.5rem; font-weight: 700; color: white; text-shadow: 0 0 10px rgba(255,255,255,0.2); }

        /* LOGIN */
        #login-screen {
            position: fixed; top:0; left:0; width:100%; height:100%;
            background: #000;
            display: flex; justify-content: center; align-items: center;
            z-index: 9999;
        }
        .d-none { display: none !important; }
    </style>
</head>
<body>

    <div id="login-screen">
        <div class="glass-card p-5 text-center" style="width: 400px; border: 1px solid var(--neon-red);">
            <div class="mb-4">
                <i class="bi bi-shield-lock-fill" style="font-size: 3rem; color: var(--neon-red); text-shadow: 0 0 20px var(--neon-red);"></i>
            </div>
            <h3 class="fw-bold mb-4">SECURE ACCESS</h3>
            <form onsubmit="event.preventDefault(); handleLogin();">
                <input type="email" class="form-control mb-3" placeholder="admin@tourcrm.com" value="admin@crm.com">
                <input type="password" class="form-control mb-4" placeholder="Password" value="123456">
                <button class="btn btn-red w-100 py-3 rounded-pill">ENTER SYSTEM</button>
            </form>
        </div>
    </div>

    <div id="main-app" class="d-none">
        
        <nav class="sidebar py-4">
            <h3 class="text-center fw-bold mb-5" style="color: var(--neon-red); text-shadow: 0 0 10px var(--neon-red);">
                TOUR CRM
            </h3>
            <ul class="nav flex-column px-2">
                <li class="nav-item"><a class="nav-link active" onclick="nav('dashboard', this)"><i class="bi bi-grid-fill me-3"></i>DASHBOARD</a></li>
                <li class="nav-item"><a class="nav-link" onclick="nav('leads', this)"><i class="bi bi-send-fill me-3"></i>NEW LEAD</a></li>
                <li class="nav-item"><a class="nav-link" onclick="nav('vendors', this)"><i class="bi bi-people-fill me-3"></i>VENDORS</a></li>
                <li class="nav-item"><a class="nav-link" onclick="nav('reports', this)"><i class="bi bi-graph-up me-3"></i>REPORTS</a></li>
                <li class="nav-item mt-5"><a class="nav-link text-danger fw-bold" onclick="location.reload()"><i class="bi bi-power me-3"></i>LOGOUT</a></li>
            </ul>
        </nav>

        <div class="content-wrapper">
            
            <div class="d-flex justify-content-between align-items-center mb-5 animate-entry">
                <h2 class="fw-bold" id="page-title">OVERVIEW</h2>
                <div class="d-flex align-items-center gap-4">
                    <i class="bi bi-bell-fill fs-4 text-white" style="cursor: pointer;"></i>
                    <div class="d-flex align-items-center px-3 py-2" style="background: #111; border-radius: 50px; border: 1px solid #333;">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=ff0033&color=fff" class="rounded-circle me-2" width="30">
                        <span class="small fw-bold">SUPER ADMIN</span>
                    </div>
                </div>
            </div>

            <div id="view-dashboard" class="animate-entry">
                <div class="row g-4 mb-5">
                    <div class="col-md-3">
                        <div class="glass-card p-4">
                            <div class="stat-val">150</div>
                            <div class="text-muted small uppercase">TOTAL LEADS</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="glass-card p-4">
                            <div class="stat-val text-danger">45</div>
                            <div class="text-muted small uppercase">PENDING</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="glass-card p-4">
                            <div class="stat-val">120</div>
                            <div class="text-muted small uppercase">VENDORS</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="glass-card p-4">
                            <div class="stat-val" style="color: var(--neon-red);">₹5.2L</div>
                            <div class="text-muted small uppercase">REVENUE</div>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-4">
                    <h5 class="mb-4 text-white">LIVE STATUS</h5>
                    <table class="table table-hover">
                        <thead><tr><th>CLIENT</th><th>DESTINATION</th><th>STATUS</th><th>REPLY</th></tr></thead>
                        <tbody id="lead-table-body">
                            <tr>
                                <td>Amit Kumar</td>
                                <td>Manali</td>
                                <td><span class="badge bg-danger">SENT</span></td>
                                <td class="text-muted">Waiting...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="view-leads" class="d-none animate-entry">
                <div class="glass-card p-5">
                    <div class="d-flex justify-content-between mb-4 border-bottom pb-3">
                        <h4 class="text-white">BROADCAST INQUIRY</h4>
                        <span class="badge bg-danger d-flex align-items-center">PRIORITY HIGH</span>
                    </div>
                    
                    <form id="leadForm" onsubmit="event.preventDefault(); sendBroadcast();">
                        <div class="row g-4">
                            <div class="col-12"><h6 class="text-danger small fw-bold">CLIENT INFO</h6></div>
                            <div class="col-md-6">
                                <label class="form-label">Client Name</label>
                                <input type="text" class="form-control" id="c_name" placeholder="Enter Name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="c_phone" placeholder="Enter Contact" required>
                            </div>

                            <div class="col-12 mt-4"><h6 class="text-danger small fw-bold">TRIP DETAILS</h6></div>
                            <div class="col-md-4">
                                <label class="form-label">Destination</label>
                                <input type="text" class="form-control" id="c_dest" placeholder="e.g. Goa" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Travel Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Budget (₹)</label>
                                <input type="text" class="form-control" placeholder="50000">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Requirements</label>
                                <textarea class="form-control" rows="3" placeholder="Hotel type, Cab type, etc..."></textarea>
                            </div>
                        </div>
                        <div class="mt-5 text-end">
                            <button class="btn btn-red btn-lg px-5 rounded-pill">BROADCAST NOW</button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="view-vendors" class="d-none animate-entry">
                <div class="glass-card p-4">
                    <div class="d-flex justify-content-between mb-4">
                        <h4>VENDOR LIST</h4>
                        <button class="btn btn-red btn-sm rounded-pill px-4">+ ADD</button>
                    </div>
                    <table class="table">
                        <thead><tr><th>NAME</th><th>TYPE</th><th>LOCATION</th><th>ACTION</th></tr></thead>
                        <tbody>
                            <tr>
                                <td>Himalayan Travels</td>
                                <td>Agent</td>
                                <td>Manali</td>
                                <td><button class="btn btn-outline-danger btn-sm">View</button></td>
                            </tr>
                             <tr>
                                <td>Goa Cabs</td>
                                <td>Driver</td>
                                <td>Goa</td>
                                <td><button class="btn btn-outline-danger btn-sm">View</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="view-reports" class="d-none animate-entry">
                <div class="glass-card p-4">
                    <h4>ANALYTICS</h4>
                    <div class="alert alert-dark border-danger text-white mt-3">
                        <i class="bi bi-arrow-up-circle text-danger me-2"></i> Revenue is up by 20%
                    </div>
                    <table class="table table-bordered mt-4" style="border-color: #333;">
                        <thead><tr><th>MONTH</th><th>LEADS</th><th>REVENUE</th></tr></thead>
                        <tbody>
                            <tr><td>JAN 2026</td><td>150</td><td>₹ 5.2L</td></tr>
                            <tr><td>DEC 2025</td><td>120</td><td>₹ 3.8L</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script>
        // LOGIN
        function handleLogin() {
            const screen = document.getElementById('login-screen');
            screen.style.transition = "opacity 0.8s";
            screen.style.opacity = "0";
            setTimeout(() => {
                screen.style.display = 'none';
                document.getElementById('main-app').classList.remove('d-none');
            }, 800);
        }

        // NAV
        function nav(id, el) {
            document.querySelectorAll('[id^="view-"]').forEach(x => x.classList.add('d-none'));
            const view = document.getElementById('view-' + id);
            view.classList.remove('d-none');
            
            // Re-animate
            view.classList.remove('animate-entry');
            void view.offsetWidth;
            view.classList.add('animate-entry');

            const titles = {'dashboard':'OVERVIEW', 'leads':'BROADCAST LEAD', 'vendors':'VENDOR DIRECTORY', 'reports':'ANALYTICS'};
            document.getElementById('page-title').innerText = titles[id];

            document.querySelectorAll('.nav-link').forEach(x => x.classList.remove('active'));
            el.classList.add('active');
        }

        // BROADCAST
        function sendBroadcast() {
            const name = document.getElementById('c_name').value;
            const dest = document.getElementById('c_dest').value;

            Swal.fire({
                title: 'SENDING...',
                background: '#000', color: '#fff',
                timer: 1500, didOpen: () => Swal.showLoading()
            }).then(() => {
                Swal.fire({ 
                    icon: 'success', title: 'SENT', 
                    background: '#000', color: '#fff', iconColor: '#ff0033',
                    showConfirmButton: false, timer: 1000 
                });

                const tbody = document.getElementById('lead-table-body');
                tbody.innerHTML = `<tr>
                    <td>${name}</td>
                    <td>${dest}</td>
                    <td><span class="badge bg-danger">SENT</span></td>
                    <td class="text-white fw-bold"><i class="bi bi-hourglass-split text-danger"></i> Waiting...</td>
                </tr>` + tbody.innerHTML;

                document.getElementById('leadForm').reset();
            });
        }
    </script>
</body>
</html>