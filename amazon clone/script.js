        const form = document.getElementById("contact-form");
        const successMessage = document.querySelector(".success-message");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(form);

            fetch("https://api.web3forms.com/submit", {
                method: "POST",
                body: formData
            }).then(response => {
                if (response.ok) {
                    form.style.display = "none";
                    successMessage.style.display = "block";
                } else {
                    alert("Something went wrong. Please try again.");
                }
            }).catch(error => {
                console.error("Error:", error);
                alert("Error submitting the form.");
            });
        });