function showDetails(topic, details, sender) {
    const subbox2 = document.querySelector('.subbox2');

    // Set the HTML content for subbox2
    subbox2.innerHTML = `
        <h3>Announcements</h3><hr>
        <div class="Adescription">
            <h4><i class="fas fa-user"></i> Sent by: ${sender}</h4>
            <hr>
            <h4>Subject: ${topic}</h4><br>
            <p>${details}</p>
        </div>
    `;
}
