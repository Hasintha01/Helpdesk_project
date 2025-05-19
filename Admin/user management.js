document.addEventListener('DOMContentLoaded', function()
{
    //Get elements
    const addMemberBtn = document.getElementById('addMemberBtn');
    const popupForm = document.getElementById('popupForm');
    const popupOverlay = document.getElementById('popupOverlay');
    const closePopupBtn = document.getElementById('closePopupBtn');

    //Show popup
    addMemberBtn.addEventListener('click', function() {
        popupForm.style.display = 'block';
        popupOverlay.style.display = 'block';
    });

    //Close popup
    closePopupBtn.addEventListener('click', function() {
        popupForm.style.display = 'none';
        popupOverlay.style.display = 'none';
    });

    //Close popup when admin click on the overlay
    popupOverlay.addEventListener('click', function() {
        popupForm.style.display = 'none';
        popupOverlay.style.display = 'none';
    });
});

function redirectToUpdateForm(userId) {

    if (!userId) {
        console.error("User ID is missing or undefined");
        return;
    }

    window.location.href = 'update.php?userId=' + userId;
}
