$(document).ready(function () {
    // When the country dropdown changes
    $("#selectCountry").change(function () {
        var countryId = $(this).val();

        // Use AJAX to fetch cities for the selected country
        $.ajax({
            url: "http://localhost/hotelEnak/include/admin.get_cities.php",
            type: "POST",
            data: { countryId: countryId },
            dataType: "json",
            success: function (data) {
                // Update the city dropdown options
                var cityDropdown = $("#selectCity");
                cityDropdown.empty(); // Clear existing options
                cityDropdown.append(
                    '<option value="" disabled selected>Select City</option>'
                );

                data.forEach(function (city) {
                    var option = $("<option>");
                    option.text(city.city_name);
                    option.val(city.id_city);
                    cityDropdown.append(option);
                });
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});
