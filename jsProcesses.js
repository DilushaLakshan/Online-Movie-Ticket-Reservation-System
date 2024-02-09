//send movie details to the addFilmProcess.php file
function sendMovieDetails() {
    var movieName = document.getElementById("name");
    var category = document.getElementById("category");
    var company = document.getElementById("productionCompany");
    var producer = document.getElementById("producerName");
    var director = document.getElementById("directorName");
    var writer = document.getElementById("writer");
    var musician = document.getElementById("musician");
    var description = document.getElementById("description");
    var imagePath = document.getElementById("formFile");
    var videoPath = document.getElementById("videoFile");

    var form = new FormData();
    form.append("movie", movieName.value);
    form.append("category", category.value);
    form.append("company", company.value);
    form.append("producer", producer.value);
    form.append("director", director.value);
    form.append("writer", writer.value);
    form.append("musician", musician.value);
    form.append("path", imagePath.files[0]);
    form.append("description", description.value);
    form.append("trailor", videoPath.files[0]);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "Success") {
                alert("Insertion Successful");
                //complete the code to clear text fields
            } else {
                alert(text);
            }
        }
    }
    request.open("POST", "addFilmProcess.php", true);
    request.send(form);
}

//set image to the preview box that has been choosen from the file chooser
function imagePreview() {
    var imagePath = document.getElementById("formFile");
    var imagePathTemp = document.getElementById("mImageThumbnail");

    imagePath.onchange = function() {
        var fileCount = imagePath.files.length;
        if (fileCount == 1) {
            var file = this.files[0];
            var url = window.URL.createObjectURL(file);
            imagePathTemp.src = url;
        } else {
            alert("You can choose only one image");
        }
    }
}

//set movie trailor to the preview box
function trailorPreview() {
    var videoPath = document.getElementById("videoFile");
    var videoPathTemp = document.getElementById("mTrailor");

    videoPath.onchange = function() {
        var fileCount = videoPath.files.length;
        if (fileCount == 1) {
            var file = this.files[0];
            var url = window.URL.createObjectURL(file);
            videoPathTemp.src = url;
        } else {
            alert("You can choose only one video file");
        }
    }
}

//update movie details
function updateMovieDetails() {
    var id = document.getElementById("movieID");
    var category = document.getElementById("category");
    var company = document.getElementById("company");
    var producer = document.getElementById("producer");
    var director = document.getElementById("director");
    var writer = document.getElementById("writer");
    var musician = document.getElementById("musician");
    var description = document.getElementById("description");

    var form = new FormData();
    form.append("id", id.textContent);
    form.append("category", category.value);
    form.append("company", company.value);
    form.append("producer", producer.value);
    form.append("director", director.value);
    form.append("writer", writer.value);
    form.append("musician", musician.value);
    form.append("description", description.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "Success") {
                alert("Successfully Updated");
            } else {
                alert(text);
            }
        }
    }
    request.open("POST", "updateFilmProcess.php", true);
    request.send(form);
}

//send user data to the userRegistrationProcess.php file
function sendUserDetails() {
    var fName = document.getElementById("fName");
    var lName = document.getElementById("lName");
    var nic = document.getElementById("nic");
    var email = document.getElementById("email");
    var address = document.getElementById("address");
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");
    var contact = document.getElementById("contact");
    var userType = document.getElementById("userType");
    var userName = document.getElementById("uName");
    var male;
    var female;
    var gender;

    var form = new FormData();
    form.append("fName", fName.value);
    form.append("lName", lName.value);
    form.append("nic", nic.value);
    form.append("email", email.value);
    form.append("address", address.value);
    form.append("password1", password1.value);
    form.append("password2", password2.value);
    form.append("contact", contact.value);
    form.append("userName", userName.value);
    form.append("userType", userType.value);
    //form.append("gender", gender.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "Success") {
                alert("Successfully Added");
                window.location = "addStaffMember.php";
            } else {
                alert(text);
            }
        }
    }
    request.open("POST", "userRegistrationProcess.php", true);
    request.send(form);
}

//update staff meber details
function updateStaffMember() {
    var mID = document.getElementById("mID");
    var firstName = document.getElementById("fName");
    var lastName = document.getElementById("lName");
    var NIC = document.getElementById("nic");
    var email = document.getElementById("e-mail");
    var address = document.getElementById("address");
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");
    var contact = document.getElementById("contact");

    var form = new FormData();
    form.append("mID", mID.textContent);
    form.append("firstName", firstName.value);
    form.append("lastName", lastName.value);
    form.append("NIC", NIC.value);
    form.append("email", email.value);
    form.append("address", address.value);
    form.append("password1", password1.value);
    form.append("password2", password2.value);
    form.append("contact", contact.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "Success") {
                alert("Successfully Updated");
                window.location = "allStaffMembers.php";
            } else {
                alert(text);
            }
        }
    }
    request.open("POST", "updateStaffMemberProcess.php", true);
    request.send(form);
}

//load movie showing date and times to the below table
var counter = 0;

function addTimeSheduleRecord() {
    var sDate = document.getElementById("s-date");
    var startTime = document.getElementById("start-time");
    var endTime = document.getElementById("end-time");

    counter++;

    document.getElementById("time-shedule-loading-area").innerHTML = document.getElementById("time-shedule-loading-area").innerHTML + "<!-- time shedule row --> <div class = 'col-12 mb-3' ><div class = 'row' ><div class = 'col-12 col-md-6 col-lg-6 mb-1' ><span class = 'sac' id = 'row-date" + counter + "' > " + sDate.value + " </span></div><div class = 'col-12 col-md-6 col-lg-6' ><span class = 'sac' id = 'row-time" + counter + "'> " + startTime.value + " - " + endTime.value + " </span></div></div></div><!-- time shedule row -->";
}

function saveTimeShedule(movieID) {
    var timeSheduleArray = Array();
    for (var x = 0; x < counter; x++) {
        var object = new Object();
        object.date = document.getElementById("row-date" + (x + 1)).innerText;
        object.startTime = document.getElementById("row-time" + (x + 1)).innerText.split("-")[0];
        object.endTime = document.getElementById("row-time" + (x + 1)).innerText.split("-")[1];

        timeSheduleArray[x] = object;
    }
    var requestJSONText = JSON.stringify(timeSheduleArray);
    var form = new FormData();
    form.append("arrayTextFormat", requestJSONText);
    form.append("movieID", movieID);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var responseJSONtext = request.responseText;
            var jsObject = JSON.parse(responseJSONtext);
            if (jsObject.response == "Success") {
                alert("Insertion Successful");
            } else {
                alert("Something went wrong.")
            }
        }
    };
    request.open("POST", "manageShowTimesProcess.php", true);
    request.send(form);
}

//load related times
function loadRelatedTimes() {
    var showTimeID = document.getElementById("date");
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "Something went wrong") {
                alert(text);
            } else {
                document.getElementById("time").innerHTML = text;
            }
        }
    };
    request.open("GET", "loadRelatedTimes.php?showTimeID=" + showTimeID.value, true);
    request.send();
}

//load seats both remaining and booked
function loadSeatTemplate() {
    var showTimeID = document.getElementById("time");
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "Something went wrong") {
                alert(text);
            } else {
                document.getElementById("seating-area").innerHTML = text;
            }
        }
    };
    request.open("GET", "loadSeatTemplate.php?showTimeID=" + showTimeID.value, true);
    request.send();
}

//send inquiry reply to the inquiryReplyProcess page
function inquiryReply(x) {
    var replyEmail = document.getElementById("to-email-" + x);
    var reply = document.getElementById("inquiry-reply-" + x);

    var form = new FormData();
    form.append("replyEmailAddress", replyEmail.textContent);
    form.append("reply", reply.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "Success") {
                window.alert("Email Sent");
                window.location = "inquiryView.php";
            } else {
                alert(text);
            }
        }
    }
    request.open("POST", "inquiryReplyProcess.php", true);
    request.send(form);
}

//send staff login details to staffLoginProcess page
function sendStaffLogin() {
    var userName = document.getElementById("user-name");
    var password = document.getElementById("password");

    var form = new FormData();
    form.append("userName", userName.value);
    form.append("password", password.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "admin") {
                window.location = "adminHome.php";
            } else if (text == "manager") {
                window.location = "managerHome.php";
            } else {
                alert(text);
            }
        }
    }
    request.open("POST", "staffLoginProcess.php", true);
    request.send(form);
}

//customer login
function sendCustomerLoginCredentials() {
    var userName = document.getElementById("user-name");
    var passwordLogin = document.getElementById("password");

    var form = new FormData();
    form.append("userName", userName.value);
    form.append("password".passwordLogin.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "Success") {
                window.location = "index.php";
            } else {
                alert(text);
            }
        }
    }
    request.open("POST", "userLogin.php", true);
    request.send(form);
}