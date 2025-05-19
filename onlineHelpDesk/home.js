document.addEventListener("DOMContentLoaded", function() {
    
    const knowledgeBase = document.getElementById("content01");
    const shuttleService = document.getElementById("content02");
    const announcement = document.getElementById("content03");

  
    knowledgeBase.onclick = function() {
        window.location.href = "knowledgebase.html";
    };

    shuttleService.onclick = function() {
        window.location.href = "shuttle.html"; 
    };

    announcement.onclick = function() {
        window.location.href = "announcement.php"; 
    };
});


