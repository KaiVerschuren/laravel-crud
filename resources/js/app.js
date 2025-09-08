import "./bootstrap";

setTimeout(() => {
    const success = document.getElementById("alert-success");
    const error = document.getElementById("alert-error");
    if (success) success.style.display = "none";
    if (error) error.style.display = "none";
}, 3000);
