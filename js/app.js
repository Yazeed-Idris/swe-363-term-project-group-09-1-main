let cartQuantityBtn = document.getElementById("cartQuantityBtn")    // Quantity to be added to the cart

// Function: toggles the review box
function displayReview() {
    let reviewBox = document.getElementById("reviewBox");
    if (reviewBox.style.visibility === "visible") {
        reviewBox.style.transition = "all 0s";
        reviewBox.style.visibility = "hidden";
        reviewBox.style.marginLeft = "90%";
        reviewBox.style.position = "absolute";
    } else {
        reviewBox.style.visibility = "visible";
        reviewBox.style.marginLeft = "0";
        reviewBox.style.transition = "all 1s";
        reviewBox.style.position = "relative";
    }
}

function highlightDescription() {
    let description = document.getElementById("description");
    let reviews = document.getElementById("reviews");
    description.style.backgroundColor = "#fda901"
    reviews.style.backgroundColor = "white"


}

function showReviews() {
    let description = document.getElementById("description");
    let reviews = document.getElementById("reviews");
    description.style.backgroundColor = "white"
    reviews.style.backgroundColor = "#fda901"
    let xhttp = new XMLHttpRequest();

    let urlStr = window.location.href;
    let id = urlStr.substr(urlStr.indexOf("id"));

    let response = null;

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4) {
            if (xhttp.status == 200) {
                response = xhttp.responseText
                let reviewsJSON = JSON.parse(response);

                if (reviewsJSON.length) {
                    for (let i = 0; i < reviewsJSON.length; i++) {
                        let name = reviewsJSON[i]["reviewer_name"];
                        let city = reviewsJSON[i]["city"];
                        let date = reviewsJSON[i]["date"];
                        let rating = reviewsJSON[i]["rating"];
                        let review = reviewsJSON[i]["review"];
                        let image = reviewsJSON[i]["image"];

                        let container = document.createElement("div");
                        container.classList.add("container-fluid");
                        let row = document.createElement("div");
                        row.classList.add("row");
                        let col1 = document.createElement("div");
                        let col2 = document.createElement("div");
                        col1.classList.add("col-md-12", "col-lg-6", "col-xl-6");
                        col2.classList.add("col-md-12", "col-lg-6", "col-xl-6");
                        let img = document.createElement("img");
                        img.src = "reviewImages/" + image;
                        img.height = 303;
                        img.width = 444;
                        img.classList.add("rounded-corners", "shadow");
                        let nameTag = document.createElement("h4");
                        let infoTag = document.createElement("h5");
                        let reviewTag = document.createElement("p");

                        let ratingStr = "";
                        for (let i = 0; i < rating; i++){
                            ratingStr += "⭐";
                        }

                            nameTag.innerText = name;
                        infoTag.innerText = city + " - " + date + " " + ratingStr;
                        reviewTag.innerText = review;
                        col2.append(nameTag, infoTag, reviewTag);
                        col1.append(img);
                        row.append(col1, col2);
                        container.append(row);

                        let carouselItem = document.createElement("div");
                        carouselItem.classList.add("carousel-item");
                        carouselItem.appendChild(container);

                        let indicator = `<li data-target="#carouselIndicators" data-slide-to="` + i + `"></li>`

                        if (i == 0) {
                            carouselItem.classList.add("active");
                            indicator = `<li data-target="#carouselIndicators" data-slide-to="` + i + `" class="active"></li>`;
                        }
                        document.getElementById("reviewsCarousel").appendChild(carouselItem);
                        document.getElementById("indicator").innerHTML += indicator;
                    }
                } else {
                    document.getElementById("reviewsArea").innerHTML = `<h1>No reviews</h1>`;
                }


            }
            if (xhttp.status == 404) {
                console.log("File not found");
            }
        }
    };
    xhttp.open("get", "php/review.php?" + id, true);
    xhttp.send();
}

// Function: display an error message if an empty review is submitted
function checkIfEmpty() {
    let textarea = document.getElementById("textareaReview");
    if (textarea.value.length === 0) {
        let errorMessage = document.getElementById("roboto-red");
        errorMessage.hidden = false;
    }


    let name = document.getElementById("reviewerName").value;
    let city = document.getElementById("city").value;
    let rating = document.getElementById("ratingSlider").value;
    let image = document.getElementById("imagePicker").files[0];
    let formImage = new FormData();
    formImage.append("file", image);

    let reviewText = document.getElementById("textareaReview").value;
    let meal_id = window.location.href;
    meal_id = meal_id.substr(meal_id.indexOf("id")).charAt(3);

    const form = document.getElementById("reviewForm");


    let xhttp = new XMLHttpRequest();
    let xhttp2 = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhttp.responseText);
            let reviewBox = document.getElementById("reviewBox");
            reviewBox.style.transition = "all 0s";
            reviewBox.style.visibility = "hidden";
            reviewBox.style.marginLeft = "90%";
            reviewBox.style.position = "absolute";
            let car = document.getElementById("reviewsCarousel");
            while (car.hasChildNodes()) {
                car.removeChild(car.firstChild);
            }
            let ind = document.getElementById("indicator");
            while (ind.hasChildNodes()) {
                ind.removeChild(ind.firstChild);
            }
            showReviews();
        }
    };
    xhttp2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhttp2.responseText);
        }
    };
    xhttp.open("POST", "php/review.php", true);
    xhttp2.open("POST", "php/review.php", true);
    xhttp.send(formImage);
    xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp2.send(encodeURI(`name=${name}&city=${city}&rating=${rating}&image=${image.name}&reviewText=${reviewText}&meal_id=${meal_id}&file=${image}`));



}

// Function: count and display the number of characters and remove the 'empty review' error message
function count() {
    let counter = document.getElementById("characterCounter");
    let textLength = document.getElementById("textareaReview").value.length;
    let errorMessage = document.getElementById("roboto-red");
    counter.innerHTML = textLength + " / 500";
    errorMessage.hidden = true;
}

// Incrementing quantity by 1
function increaseQuantity() {
    let sum = parseInt(cartQuantityBtn.textContent) + 1
    document.getElementById("cartQuantityBtn").textContent = sum.toString();

    let href = document.getElementById("count").getAttribute("href");
    document.getElementById("count").setAttribute("href", href.substr(0, href.indexOf("count")) + "count=" + sum.toString());

}

// Decrementing quantity by 1
function decreaseQuantity() {
    let sum = parseInt(cartQuantityBtn.textContent);
    if (sum > 0) {
        sum -= 1
        document.getElementById("cartQuantityBtn").textContent = sum.toString()
    }

    let href = document.getElementById("count").getAttribute("href");
    document.getElementById("count").setAttribute("href", href.substr(0, href.indexOf("count")) + "count=" + sum.toString());
}