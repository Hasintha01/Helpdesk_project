<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="help-desk01.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="main-container">
        <h1>Dashboard</h1>

        <div class="dashboard-content">
            <!-- Percentage Table Container -->
            <div class="percentage-table">
                <h3>Ticket Percentages</h3>
                <table>
                    <tr>
                        <th>Category</th>
                        <th>Percentage</th>
                    </tr>
                    <tr>
                        <td>Students Raised Tickets</td>
                        <td>70%</td>
                    </tr>
                    <tr>
                        <td>Non-Academic Staff Raised Tickets</td>
                        <td>10%</td>
                    </tr>
                    <tr>
                        <td>Academic Staff Raised Tickets</td>
                        <td>20%</td>
                    </tr>
                </table>
                <div class="btn-helpdesk">
                    <a href="helpdesk_agent.php">
                        <button>Go to Help Desk Agent</button>
                    </a>
                </div>
            </div>

            <!-- Pie Chart Container -->
            <div class="chart-container">
                <canvas id="ticketChart" width="200" height="200"></canvas>
            </div>
        </div>

        <div class="details-container">
            <p>Total Tickets: <strong>100</strong></p>
            <p>Resolved Tickets: <strong>60</strong></p>
            <p>Pending Tickets: <strong>30</strong></p>
            <p>Rejected Tickets: <strong>10</strong></p>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        const ticketData = { total: 100, resolved: 60, pending: 30, rejected: 10 };
        const ctx = document.getElementById('ticketChart').getContext('2d');
        const ticketChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Resolved', 'Pending', 'Rejected'],
                datasets: [{
                    data: [ticketData.resolved, ticketData.pending, ticketData.rejected],
                    backgroundColor: ['#4CAF50', '#FFC107', '#F44336'],
                    hoverBackgroundColor: ['#66BB6A', '#FFD54F', '#EF5350']
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'top', }, },
            }
        });
    </script>
</body>
</html>
