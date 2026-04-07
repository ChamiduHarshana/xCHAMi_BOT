<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }

// --- Real-time Data Fetching ---
$res = $conn->query("SELECT * FROM bot_settings WHERE id=1");
$settings = $res->fetch_assoc();

// Update Logic
if (isset($_POST['update_all'])) {
    $status = $_POST['bot_status'];
    $api = $_POST['api_key'];
    $prompt = $conn->real_escape_string($_POST['system_prompt']);
    $model = $_POST['ai_model'];
    
    $conn->query("UPDATE bot_settings SET bot_status='$status', api_key='$api', system_prompt='$prompt', ai_model='$model' WHERE id=1");
    header("Location: index.php?success=1");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>xCHAMi MD | Command Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --apple-blue: #007AFF; --bg-ios: #F2F2F7; }
        body { background: var(--bg-ios); font-family: -apple-system, sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(30px); border: 1px solid rgba(255,255,255,0.5); }
        .card-hover:hover { transform: scale(1.02); transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .btn-ios { background: var(--apple-blue); border-radius: 14px; transition: 0.3s; }
        .btn-ios:active { transform: scale(0.95); }
    </style>
</head>
<body class="flex">

    <div class="w-72 h-screen sticky top-0 p-6 hidden lg:block">
        <div class="glass h-full rounded-[35px] p-6 flex flex-col shadow-xl">
            <div class="flex items-center space-x-3 mb-10 px-2">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg animate-pulse">
                    <i class="fas fa-microchip text-white"></i>
                </div>
                <h1 class="text-xl font-black italic">xCHAMi <span class="text-blue-600">MD</span></h1>
            </div>
            
            <nav class="flex-1 space-y-2">
                <div class="flex items-center p-4 bg-blue-600 text-white rounded-2xl shadow-lg font-bold cursor-pointer">
                    <i class="fas fa-home mr-4"></i> Dashboard
                </div>
                <div class="flex items-center p-4 text-gray-500 hover:bg-white rounded-2xl transition cursor-pointer font-semibold">
                    <i class="fas fa-robot mr-4"></i> Bot Control
                </div>
                <div class="flex items-center p-4 text-gray-500 hover:bg-white rounded-2xl transition cursor-pointer font-semibold">
                    <i class="fas fa-code mr-4"></i> API Console
                </div>
                <div class="flex items-center p-4 text-gray-500 hover:bg-white rounded-2xl transition cursor-pointer font-semibold">
                    <i class="fas fa-history mr-4"></i> Logs
                </div>
            </nav>

            <div class="p-4 bg-blue-50 rounded-2xl border border-blue-100 mt-auto">
                <p class="text-[10px] font-bold text-blue-400 uppercase tracking-widest mb-1">Current Version</p>
                <p class="text-sm font-black text-blue-700">v3.5.0 Elite Edition</p>
            </div>
        </div>
    </div>

    <main class="flex-1 p-6 lg:p-10">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h2 class="text-4xl font-black text-gray-900 tracking-tighter">Command Center</h2>
                <div class="flex items-center mt-1">
                    <span class="relative flex h-3 w-3 mr-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                    </span>
                    <p class="text-gray-500 font-bold text-sm uppercase">System Live: <span class="text-green-600">Active</span></p>
                </div>
            </div>
            <div class="flex space-x-3">
                <button class="glass px-6 py-3 rounded-2xl font-bold text-gray-700 flex items-center hover:bg-white">
                    <i class="fas fa-sync-alt mr-2"></i> Refresh Data
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="glass p-6 rounded-[30px] card-hover">
                <i class="fas fa-comments text-blue-600 mb-4 text-2xl"></i>
                <h4 class="text-gray-400 font-bold text-xs uppercase">Total Messages</h4>
                <p class="text-3xl font-black text-gray-800"><?php echo number_format($settings['total_messages']); ?>+</p>
            </div>

            <div class="glass p-6 rounded-[30px] card-hover">
                <i class="fas fa-clock text-green-600 mb-4 text-2xl"></i>
                <h4 class="text-gray-400 font-bold text-xs uppercase">System Uptime</h4>
                <p class="text-3xl font-black text-gray-800">99.8%</p>
            </div>

            <div class="glass p-6 rounded-[30px] card-hover">
                <i class="fas fa-brain text-purple-600 mb-4 text-2xl"></i>
                <h4 class="text-gray-400 font-bold text-xs uppercase">Current AI</h4>
                <p class="text-3xl font-black text-gray-800">Llama 3.3</p>
            </div>

            <div class="glass p-6 rounded-[30px] card-hover">
                <i class="fas fa-bolt text-orange-500 mb-4 text-2xl"></i>
                <h4 class="text-gray-400 font-bold text-xs uppercase">Avg Response</h4>
                <p class="text-3xl font-black text-gray-800">0.8s</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 glass p-8 rounded-[35px] shadow-sm">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-2xl font-black text-gray-800 italic">Advanced Settings</h3>
                    <span class="bg-blue-100 text-blue-600 px-4 py-1 rounded-full text-xs font-bold uppercase">Admin Access</span>
                </div>
                
                <form action="index.php" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-black text-gray-500 mb-2 uppercase italic">Bot Operation Mode</label>
                            <select name="bot_status" class="w-full p-4 bg-gray-100 border-none rounded-2xl font-bold text-gray-700 outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="ON" <?php if($settings['bot_status'] == 'ON') echo 'selected'; ?>>🟢 HIGH PERFORMANCE (ON)</option>
                                <option value="OFF" <?php if($settings['bot_status'] == 'OFF') echo 'selected'; ?>>🔴 MAINTENANCE MODE (OFF)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-black text-gray-500 mb-2 uppercase italic">AI Engine Selection</label>
                            <select name="ai_model" class="w-full p-4 bg-gray-100 border-none rounded-2xl font-bold text-gray-700 outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="llama-3.3-70b-versatile">Llama 3.3 (Versatile)</option>
                                <option value="llama-3.1-8b-instant">Llama 3.1 (Instant)</option>
                                <option value="mixtral-8x7b-32768">Mixtral (Large Context)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-black text-gray-500 mb-2 uppercase italic">Groq API Endpoint Key</label>
                        <div class="relative">
                            <input type="password" name="api_key" value="<?php echo $settings['api_key']; ?>" class="w-full p-4 bg-gray-100 border-none rounded-2xl font-bold text-gray-700 pr-12 outline-none" placeholder="gsk_xxxxxxxx">
                            <i class="fas fa-eye absolute right-4 top-5 text-gray-400 cursor-pointer"></i>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-black text-gray-500 mb-2 uppercase italic">Master AI Prompt (Personality)</label>
                        <textarea name="system_prompt" rows="5" class="w-full p-4 bg-gray-100 border-none rounded-2xl font-medium text-gray-700 leading-relaxed outline-none focus:ring-2 focus:ring-blue-500"><?php echo $settings['system_prompt']; ?></textarea>
                    </div>

                    <button type="submit" name="update_all" class="btn-ios w-full py-5 text-white font-black text-xl shadow-xl hover:shadow-blue-500/40">
                        Deploy Configuration Changes
                    </button>
                </form>
            </div>

            <div class="space-y-6">
                <div class="glass p-6 rounded-[30px]">
                    <h3 class="text-sm font-black text-gray-400 uppercase mb-4 tracking-widest">Live Activity Log</h3>
                    <div class="space-y-4 max-h-[300px] overflow-y-auto pr-2">
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 rounded-full bg-green-500 mt-1.5"></div>
                            <p class="text-xs font-bold text-gray-600"><span class="text-blue-500">[10:45 AM]</span> Message received from +9477xxxxxx</p>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 rounded-full bg-blue-500 mt-1.5"></div>
                            <p class="text-xs font-bold text-gray-600"><span class="text-blue-500">[10:45 AM]</span> AI Response generated (0.7s)</p>
                        </div>
                    </div>
                </div>

                <div class="glass p-6 rounded-[30px]">
                    <h3 class="text-sm font-black text-gray-400 uppercase mb-4 tracking-widest">Weekly Growth</h3>
                    <canvas id="growthChart" height="150"></canvas>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Feature 10 Logic
        const ctx = document.getElementById('growthChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
                datasets: [{
                    data: [40, 60, 45, 90, 75, 100, 120],
                    backgroundColor: '#007AFF',
                    borderRadius: 8
                }]
            },
            options: { plugins: { legend: { display: false } }, scales: { y: { display: false }, x: { grid: { display: false } } } }
        });
    </script>
</body>
</html>