window.addEventListener("load", function () {
    const loader = document.getElementById("loader");
    loader.style.opacity = "0";

    this.setTimeout(function () {
        loader.style.transform = "translateY(-100%)";
        setTimeout(function () {
            loader.style.display = "none";
            document.body.style.overflow = "auto";
        }, 500);
    }, 500);
});
