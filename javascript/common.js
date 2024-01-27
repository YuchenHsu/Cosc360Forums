// common.js
document.addEventListener("DOMContentLoaded", function () {
    // Load posts content dynamically
    const postsContainer = document.querySelector(".posts");
    fetch("posts.html")
        .then(response => response.text())
        .then(html => {
            postsContainer.innerHTML = html;
        })
        .catch(error => {
            console.error("Error loading posts:", error);
        });
});
