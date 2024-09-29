function expandTicket(ticketElement) {
    const ticketDetails = ticketElement.querySelector('.ticket-details');
    const acceptButton = ticketElement.querySelector('.accept-btn');
    const declineButton = ticketElement.querySelector('.decline-btn');
    const expandIcon = ticketElement.querySelector('.expand-icon');

    // Check if the ticket is currently expanded
    const isActive = ticketElement.classList.contains('active');

    // Toggle active class for enlargement effect
    ticketElement.classList.toggle('active');

    // If the ticket is not active, expand it
    if (!isActive) {
        ticketElement.style.transform = 'scale(1.05)'; // Slightly enlarge
        ticketElement.style.marginLeft = '10px'; // Adjust left margin
        ticketDetails.style.display = 'block'; // Show ticket details
        acceptButton.style.display = 'inline'; // Show accept button
        declineButton.style.display = 'inline'; // Show decline button
        expandIcon.style.display = 'none'; // Hide the expand icon
    } else {
        // If it's active, reset it back to normal size
        ticketElement.style.transform = 'scale(1)'; // Reset size
        ticketElement.style.marginLeft = '0'; // Reset left margin
        ticketDetails.style.display = 'none'; // Hide ticket details
        acceptButton.style.display = 'none'; // Hide accept button
        declineButton.style.display = 'none'; // Hide decline button
        expandIcon.style.display = 'inline'; // Show the expand icon
    }
}
// JavaScript for Notepad functionality
document.getElementById('save-btn').addEventListener('click', function() {
    const notepadContent = document.getElementById('notepad').value;
    localStorage.setItem('notepadContent', notepadContent); // Save content to local storage
    alert('Notes saved!');
});

document.getElementById('clear-btn').addEventListener('click', function() {
    document.getElementById('notepad').value = ''; // Clear the textarea
    localStorage.removeItem('notepadContent'); // Clear saved content in local storage
});

// Load notes from local storage on page load
window.onload = function() {
    const savedContent = localStorage.getItem('notepadContent');
    if (savedContent) {
        document.getElementById('notepad').value = savedContent; // Set saved content to textarea
    }
};
