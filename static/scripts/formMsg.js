setTimeout(() => {
    const msg = document.getElementById('msg');
    if (msg) {
        msg.style.transition = "0.5s";
        msg.style.opacity = "0";
        setTimeout(() => msg.remove(), 500);
    }
}, 3000);