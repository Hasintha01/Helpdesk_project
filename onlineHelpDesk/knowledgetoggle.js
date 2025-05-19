const details = document.querySelectorAll("details");


details.forEach((detail) => {
    detail.addEventListener("click", function () {
        // Close all other details elements except the one being clicked
        details.forEach((otherDetail) => {
            if (otherDetail !== detail) {
                otherDetail.removeAttribute("open");
            }
        });
    });
});
