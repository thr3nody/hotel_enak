$(document).ready(function () {
    var countryDropdown = $("#selectCountry");
    var cityDropdown = $("#selectCity");
    var hotelDropdown = $("#selectHotel");
    var checkIn = $("#selectCheckIn");
    var checkOut = $("#selectCheckOut");

    // Play hide and seek without the seeker
    cityDropdown.hide();
    hotelDropdown.hide();
    checkOut.hide();

    // I like things a little default
    cityDropdown.append(
        '<option value="" selected disabled>Choose destination city</option>'
    );
    hotelDropdown.append(
        '<option value="" selected disabled>Choose hotel</option>'
    );

    $.ajax({
        url: "../include/handle.country.php",
        type: "GET",
        dataType: "json",
        success: function (data) {
            data.forEach(function (countryData) {
                var option = $("<option>");
                option.text(countryData.country_name);
                option.val(countryData.id_country);
                countryDropdown.append(option);
            });
        },
        error: function (error) {
            console.log(error);
        },
    });

    countryDropdown.change(function () {
        console.log("Country dropdown changed"); // Add this line
        var selectedCountry = $(this).val();
        cityDropdown.prop("disabled", true).empty().hide();
        // hotelDropdown.prop("disabled", true).empty();

        if (selectedCountry) {
            $.ajax({
                url: "../include/handle.city.php?id_country=" + selectedCountry,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log("City data received"); // Add this line
                    cityDropdown.empty();

                    cityDropdown.append(
                        '<option value="" selected disabled>Destination city</option>'
                    );

                    data.forEach(function (cityData) {
                        var option = $("<option>");
                        option.text(cityData.city_name);
                        option.val(cityData.id_city);
                        cityDropdown.append(option);
                    });
                    cityDropdown.prop("disabled", false).show();
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    });

    cityDropdown.change(function () {
        console.log("City dropdown changed"); // Add this line
        var selectedCity = $(this).val();
        hotelDropdown.prop("disabled", true).empty().hide();

        if (selectedCity) {
            $.ajax({
                type: "POST",
                url: "../include/handle.hotel.php",
                data: { idCity: selectedCity },
                dataType: "json",
                success: function (response) {
                    console.log("Hotel data received"); // Add this line
                    hotelDropdown.empty();

                    hotelDropdown.append(
                        '<option value="" selected disabled>Destination hotel</option>'
                    );

                    $.each(response, function (index, hotel) {
                        var option = $("<option>");
                        option.text(hotel.hotel_name);
                        option.val(hotel.id_hotel);
                        hotelDropdown.append(option);
                    });

                    hotelDropdown.prop("disabled", false).show();
                },
                error: function (error) {
                    console.log("Error fetching hotel(s).", error);
                },
            });
        }
    });

    checkIn.change(function () {
        console.log("Check in date selected.");
        checkOut.hide();

        setTimeout(function () {
            checkOut.show();
        }, 200);
    });
});
