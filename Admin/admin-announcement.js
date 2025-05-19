document.addEventListener('DOMContentLoaded', function() {
    // Elements for Add Announcement popup
    const addAnnouncementBtn = document.getElementById('addAnnouncementBtn');
    const announcementPopupForm = document.getElementById('announcementPopupForm');
    const announcementPopupOverlay = document.getElementById('announcementPopupOverlay');
    const closeAnnouncementPopupBtn = document.getElementById('closeAnnouncementPopupBtn');

    // Show Announcement popup
    addAnnouncementBtn.addEventListener('click', function() {
        announcementPopupForm.style.display = 'block';
        announcementPopupOverlay.style.display = 'block';
    });

    // Close Announcement popup
    closeAnnouncementPopupBtn.addEventListener('click', function() {
        announcementPopupForm.style.display = 'none';
        announcementPopupOverlay.style.display = 'none';
    });

    // Close Announcement popup when clicking on overlay
    announcementPopupOverlay.addEventListener('click', function() {
        announcementPopupForm.style.display = 'none';
        announcementPopupOverlay.style.display = 'none';
    });
});


function redirectToUpdateForm(announcementId) {

    if (!announcementId) {
        console.error("Announcement ID is missing or undefined");
        return;
    }

    window.location.href = 'announcement-update.php?announcementId=' + announcementId;
}



