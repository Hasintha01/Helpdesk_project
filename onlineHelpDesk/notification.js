// notification.js

// Function to check for new responses
function checkForNewResponses() {
    setInterval(() => {
        fetch('check_notifications.php') // Ensure this path is correct
            .then(response => response.json())
            .then(data => {
                // Show or hide the notification dot based on the response
                const notificationDot = document.getElementById('notification-dot');
                if (data.hasNewResponse) {
                    notificationDot.style.display = 'block'; // Show red dot
                } else {
                    notificationDot.style.display = 'none'; // Hide red dot
                }
            })
            .catch(error => console.error('Error fetching notifications:', error));
    }, 5000); // Check every 5 seconds
}

// Start checking for new responses when the page loads
window.onload = () => {
    checkForNewResponses();
};
