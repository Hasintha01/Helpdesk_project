<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Page Title -->
    <title>Dashboard</title>
    
    <!-- Linking External CSS for Dashboard -->
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    
    <!-- Including Chart.js for the pie chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Including the Header Section -->
    <?php include 'header.php'; ?>
    
    <!-- Main Dashboard Container -->
    <div class="main-container">
        <!-- Dashboard Title -->
        <h1>Dashboard</h1>

        <!-- Pie Chart Container -->
        <div class="chart-container">
            <canvas id="ticketChart" width="200" height="200"></canvas> <!-- Adjusted width and height -->
        </div>

        <!-- Additional Details or Metrics Section -->
        <div class="details-container">
            <p>Total Tickets: <strong>100</strong></p>
            <p>Resolved Tickets: <strong>60</strong></p>
            <p>Pending Tickets: <strong>30</strong></p>
            <p>Rejected Tickets: <strong>10</strong></p>
        </div>
    </div>

    <!-- Including the Footer Section -->
    <?php include 'footer.php'; ?>

    <!-- Script for Pie Chart -->
    <script>
        // Ticket Data 
        const ticketData = {
            total: 100,
            resolved: 60,
            pending: 30,
            rejected: 10
        };

        // Creating the Pie Chart
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
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            }
        });
    </script>
</body>
</html>
