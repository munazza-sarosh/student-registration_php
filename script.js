const form = document.getElementById("registrationForm");
const message = document.getElementById("message");
const submitBtn = document.getElementById("submitBtn");

form.addEventListener("submit", async function (event) {

    event.preventDefault();

    message.innerHTML = "Registering...";
    message.style.color = "gray";

    submitBtn.disabled = true;

    const formData = new FormData(form);

    try {

        const response = await fetch("register.php", {
            method: "POST",
            body: formData
        });

        const data = await response.json();
        console.log(data);

        message.innerHTML = data.message;

        if (data.success) {
            message.style.color = "green";
            form.reset();
        } else {
            message.style.color = "red";
        }

    } catch (error) {

        message.innerHTML = "Something went wrong!";
        message.style.color = "red";

        console.log(error);

    } finally {

        submitBtn.disabled = false;

    }

});