document.addEventListener("DOMContentLoaded", function () {
    const hotelContainer = document.getElementById("hotelContainer");
    const selectCity = document.getElementById("selectCity");

    function createHotelCard(hotel) {
        const hotelCard = document.createElement("div");
        hotelCard.classList.add("hotel-card");

        hotelCard.innerHTML = `
            <div class="previewImage">
                <img src="${hotel.image || "No Image available"}" alt="${
            hotel.name
        }">
            </div>

            <div class="hotel-card-info">
                <h2>${hotel.hotel_name}</h2>
                <p>${hotel.description || "No description available"}</p>
                <p>${hotel.address || "No address available"}</p>   
                <p>Rating: ${hotel.rating}</p>
                <button type="button" data-hotel-id="${
                    hotel.id
                }" class="select-hotel-btn" id="selectHotel">Select Hotel</button>
            </div>
        `;

        hotelContainer.appendChild(hotelCard);

        const selectBtn = hotelCard.querySelector(".select-hotel-btn");
        selectBtn.addEventListener("click", function () {
            handleHotelSelection(hotel);
        });

        return hotelCard;
    }

    function handleHotelSelection(selectedHotel) {
        console.log("Selected Hotel: ", selectedHotel);
    }

    if (!hotelContainer || !selectCity) {
        console.error("Hotel container or select city element not found.");
        return;
    }

    console.log("Select city element in handle.preview.js", selectCity);

    console.log("Select city element: ", selectCity);
    selectCity.addEventListener("change", function () {
        const selectedCity = this.value;
        console.log("Selected city", selectedCity);

        fetchHotelData(selectedCity);
    });

    function fetchHotelData(cityId) {
        const hotelDropdown = document.getElementById("selectHotel");
        console.log("Fetching hotel data for city with ID", cityId);

        fetch("../include/handle.hotel.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `idCity=${cityId}`,
        })
            .then((response) => response.json())
            .then((data) => {
                console.log("Fetched data: ", data);

                hotelContainer.innerHTML = "";

                data.forEach((hotel) => {
                    const card = createHotelCard(hotel);
                    hotelContainer.appendChild(card);
                });
            })

            .catch((error) =>
                console.error("Error fetching hotel data: ", error)
            );
    }
});
