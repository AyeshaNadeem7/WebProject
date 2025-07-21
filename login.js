document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const usernameInput = document.querySelector('input[name="username"]');
    const passwordInput = document.querySelector('input[name="password"]');

    form.addEventListener("submit", function (event) {
        let valid = true;
        let messages = [];

        const username = usernameInput.value.trim();
        const password = passwordInput.value;

        // Clear previous alerts
        const existingAlert = document.getElementById("formAlert");
        if (existingAlert) existingAlert.remove();

        // Username validation
        if (username.length < 4 || username.length > 20) {
            messages.push("❌ Username must be between 4 and 20 characters.");
            valid = false;
        }
        if (!/^[a-zA-Z0-9_]+$/.test(username)) {
            messages.push("❌ Username can only contain letters, numbers, and underscores.");
            valid = false;
        }

        // Password validation
        if (password.length < 6) {
            messages.push("❌ Password must be at least 6 characters.");
            valid = false;
        }
        if (!/[A-Z]/.test(password)) {
            messages.push("❌ Password must include at least one uppercase letter.");
            valid = false;
        }
        if (!/[a-z]/.test(password)) {
            messages.push("❌ Password must include at least one lowercase letter.");
            valid = false;
        }
        if (!/[0-9]/.test(password)) {
            messages.push("❌ Password must include at least one number.");
            valid = false;
        }
        if (!/[!@#$%^&*]/.test(password)) {
            messages.push("❌ Password must include at least one special character (!@#$%^&*).");
            valid = false;
        }

        if (!valid) {
            event.preventDefault(); // Stop form from submitting
            const alertBox = document.createElement("div");
            alertBox.id = "formAlert";
            alertBox.style.color = "red";
            alertBox.style.marginTop = "10px";
            alertBox.innerHTML = messages.join("<br>");
            form.appendChild(alertBox);
        }
    });
});
