document.getElementById('cancelBtn').addEventListener('click', function(event) {
    
    // Show confirmation dialog
    const confirmCancel = confirm('Are you sure you want to reset the form? Any unsaved changes will be lost.');
    
    // If the user clicked "Cancel", prevent the form from resetting
    if (!confirmCancel) {
        event.preventDefault();
    }
    
});
