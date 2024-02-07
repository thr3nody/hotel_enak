document.addEventListener("DOMContentLoaded", function () {
    const today = new Date().toISOString().split("T")[0];
    const checkInInput = document.getElementById("selectCheckIn");
    const checkOutInput = document.getElementById("selectCheckOut");

    checkInInput.setAttribute("min", today);

    checkInInput.addEventListener("change", function () {
        const selectedDate = new Date(checkInInput.value);
        const maxDate = new Date(selectedDate);
        maxDate.setDate(selectedDate.getDate() + 30);

        checkOutInput.setAttribute("min", checkInInput.value);
        checkOutInput.setAttribute("max", maxDate.toISOString().split("T")[0]);
        checkOutInput.style.display = "inline";

        // Reset check-out if it's before check-in
        if (new Date(checkOutInput.value) < selectedDate) {
            checkOutInput.value = checkInInput.value;
        }
    });

    checkOutInput.addEventListener("change", function () {
        const selectedCheckInDate = new Date(checkInInput.value);
        const selectedCheckOutDate = new Date(checkOutInput.value);
        const maxCheckOutDate = new Date(selectedCheckInDate);
        maxCheckOutDate.setDate(selectedCheckInDate.getDate() + 30);

        // Check if check-out date exceeds 30 days from check-in
        if (selectedCheckOutDate > maxCheckOutDate) {
            checkOutInput.value = maxCheckOutDate.toISOString().split("T")[0];
        }

        // Reset check-in if it's after check-out
        if (selectedCheckInDate > selectedCheckOutDate) {
            checkInInput.value = checkOutInput.value;
        }
    });
});
