// handle.book.js

document.addEventListener("DOMContentLoaded", function () {
    const bookButton = document.getElementById("bookButton");

    if (!bookButton) {
        console.error("Book button not found.");
        return;
    }

    bookButton.addEventListener("click", function () {
        handleBooking();
    });

    // Fetch user ID from the server
    fetch("http://localhost/hotelEnak/include/getUserId.php")
        .then((response) => response.json())
        .then((data) => {
            const id_user = data.id_user;

            bookButton.addEventListener("click", function () {
                handleBooking(id_user);
            });
        })
        .catch((error) => console.error("Error fetching user ID: ", error));

    function handleBooking(id_user) {
        // Fetch and validate user inputs (id_user, id_room_type, id_hotel, check_in_date, check_out_date)
        const id_room_type = $("#selectRoom").val();
        const id_hotel = $("#selectHotel").val();
        const check_in_date = $("#selectCheckIn").val();
        const check_out_date = $("#selectCheckOut").val();

        // Validate inputs (you can add more validation if needed)

        // Prepare the data for the booking request
        const bookingData = {
            id_user: id_user,
            id_room_type: id_room_type,
            id_hotel: id_hotel,
            check_in_date: check_in_date,
            check_out_date: check_out_date,
        };

        // Send an AJAX request to the server to handle the booking
        $.ajax({
            url: "http://localhost/hotelEnak/include/handle.booking.php",
            type: "POST",
            data: bookingData,
            dataType: "json",
            success: function (response) {
                console.log("Success: ", response);
                if (response.success) {
                    document.getElementById(
                        "totalPriceDisplay"
                    ).textContent = `Total Price: $${response.totalPrice.toFixed(
                        2
                    )}`;
                } else {
                    alert("Booking failed. Please try again.");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error: ", xhr, status, error);
            },
        });
    }
});
