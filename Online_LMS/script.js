function SignIn() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var form = new FormData();
    form.append("username", username);
    form.append("password", password);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            try {
                var jsonResponseText = request.responseText;
                var jsResponseObject = JSON.parse(jsonResponseText);

                if (jsResponseObject.type == "Admin") {
                    window.location = "AdminDash.php";
                } else if (jsResponseObject.type == "Teacher") {
                    window.location = "TeacherDash.php";
                } else if (jsResponseObject.type == "Student") {
                    window.location = "StudentDash.php";
                } else if (jsResponseObject.type == "Accademic") {
                    window.location = "AccademicDash.php";
                } else if (jsResponseObject.type == "Verify") {
                    window.location = "Verify.php";
                } else if (jsResponseObject.type == "Payment") {
                    window.location = "Payment.php";
                } else {
                    document.getElementById("message").innerHTML = jsResponseObject.msg;
                }
            } catch (e) {
                // Response is not valid JSON
                document.getElementById("message").innerHTML = request.responseText;
            }
        }
    };
    request.open("POST", "process_signIn.php", true);
    request.send(form);

}

function SendRequest() {
    var userType = document.getElementById("userType").value;
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var mobile = document.getElementById("mobile").value;
    var email = document.getElementById("email").value;
    var address1 = document.getElementById("address1").value;
    var address2 = document.getElementById("address2").value;
    var city = document.getElementById("city").value;
    var gender = document.getElementById("gender").value;

    var form = new FormData();
    form.append("userType", userType);
    form.append("fname", fname);
    form.append("lname", lname);
    form.append("mobile", mobile);
    form.append("email", email);
    form.append("address1", address1);
    form.append("address2", address2);
    form.append("city", city);
    form.append("gender", gender);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("message").innerHTML = request.responseText;
            // alert("request.responseText");
            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);

            if (jsResponseObject.msg == "success") {
                alert("Your request send to the officers. After checking your details will send email to you. Thank you for your request!");
                window.location = "SignIn.php";
            }
        }

    };
    request.open("POST", "process_sendRequest.php", true);
    request.send(form);

}

function GetUserDetails() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);

            // alert(jsResponseObject.username);
            document.getElementById("username").value = jsResponseObject.username;
            document.getElementById("password").value = jsResponseObject.password;
            document.getElementById("fname").value = jsResponseObject.fname;
            document.getElementById("lname").value = jsResponseObject.lname;
            document.getElementById("mobile").value = jsResponseObject.mobile;
            document.getElementById("email").value = jsResponseObject.email;
            document.getElementById("address1").value = jsResponseObject.address1;
            document.getElementById("address2").value = jsResponseObject.address2;
            document.getElementById("city").value = jsResponseObject.city;
            document.getElementById("gender").value = jsResponseObject.gender;

        }

    };
    request.open("POST", "process_userDetails.php", true);
    request.send();

}

function LoadGuardian() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);

            // alert(jsResponseObject.gfname);
            document.getElementById("gfname").value = jsResponseObject.gfname;
            document.getElementById("glname").value = jsResponseObject.glname;
            document.getElementById("gmobile").value = jsResponseObject.gmobile;
            document.getElementById("nic").value = jsResponseObject.nic;
        }

    };
    request.open("POST", "process_loadGuardian.php", true);
    request.send();

}

function UpdateProfile() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var mobile = document.getElementById("mobile").value;
    var email = document.getElementById("email").value;
    var address1 = document.getElementById("address1").value;
    var address2 = document.getElementById("address2").value;
    var city = document.getElementById("city").value;
    var gender = document.getElementById("gender").value;

    var form = new FormData();
    form.append("username", username);
    form.append("password", password);
    form.append("fname", fname);
    form.append("lname", lname);
    form.append("mobile", mobile);
    form.append("email", email);
    form.append("address1", address1);
    form.append("address2", address2);
    form.append("city", city);
    form.append("gender", gender);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert("success");
            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);

            alert(jsResponseObject.msg);
            GetUserDetails();
        }

    };
    request.open("POST", "process_updateProfile.php", true);
    request.send(form);

}

function UpdateGuardian() {
    var gfname = document.getElementById("gfname").value;
    var glname = document.getElementById("glname").value;
    var gmobile = document.getElementById("gmobile").value;
    var nic = document.getElementById("nic").value;

    var form = new FormData();
    form.append("gfname", gfname);
    form.append("glname", glname);
    form.append("gmobile", gmobile);
    form.append("nic", nic);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert("success");
            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);

            alert(jsResponseObject.msg);

            if (jsResponseObject.msg == "Successfully Updated") {
                LoadGuardian();
            }

        }

    };
    request.open("POST", "process_updateGuardian.php", true);
    request.send(form);

}

function LoadRequests() {
    var requestId = document.getElementById("requestId").value;
    document.getElementById("userId").value = "";
    var createbtn = document.getElementById("create");
    createbtn.removeAttribute("disabled", "");
    document.getElementById("status").value = "";

    var form = new FormData();
    form.append("requestId", requestId);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);

            // alert(jsResponseObject.username);
            document.getElementById("username").value = jsResponseObject.username;
            document.getElementById("userType").value = jsResponseObject.usertype;
            document.getElementById("fname").value = jsResponseObject.fname;
            document.getElementById("lname").value = jsResponseObject.lname;
            document.getElementById("mobile").value = jsResponseObject.mobile;
            document.getElementById("email").value = jsResponseObject.email;
            document.getElementById("address1").value = jsResponseObject.address1;
            document.getElementById("address2").value = jsResponseObject.address2;
            document.getElementById("city").value = jsResponseObject.city;
            document.getElementById("password").value = jsResponseObject.password;
            document.getElementById("gender").value = jsResponseObject.gender;

        }

    };
    request.open("POST", "process_loadRequests.php", true);
    request.send(form);

}

function LoadUsers() {
    var userId = document.getElementById("userId").value;
    document.getElementById("requestId").value = "0";
    var createbtn = document.getElementById("create");
    createbtn.setAttribute("disabled", "");
    var status = document.getElementById("status").value;
    // alert("success");
    var form = new FormData();
    form.append("userId", userId);
    form.append("status", status);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);

            // alert("success");
            document.getElementById("username").value = jsResponseObject.username;
            document.getElementById("userType").value = jsResponseObject.usertype;
            document.getElementById("fname").value = jsResponseObject.fname;
            document.getElementById("lname").value = jsResponseObject.lname;
            document.getElementById("mobile").value = jsResponseObject.mobile;
            document.getElementById("email").value = jsResponseObject.email;
            document.getElementById("address1").value = jsResponseObject.address1;
            document.getElementById("address2").value = jsResponseObject.address2;
            document.getElementById("city").value = jsResponseObject.city;
            document.getElementById("password").value = jsResponseObject.password;
            document.getElementById("gender").value = jsResponseObject.gender;
            document.getElementById("status").value = jsResponseObject.status;

        }

    };
    request.open("POST", "process_loadUsers.php", true);
    request.send(form);

}

function CreateUser() {
    var userType = document.getElementById("userType").value;
    var username = document.getElementById("username").value;
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var mobile = document.getElementById("mobile").value;
    var email = document.getElementById("email").value;
    var address1 = document.getElementById("address1").value;
    var address2 = document.getElementById("address2").value;
    var city = document.getElementById("city").value;
    var password = document.getElementById("password").value;
    var gender = document.getElementById("gender").value;

    var requestId = document.getElementById("requestId").value;

    var form = new FormData();
    form.append("userType", userType);
    form.append("username", username);
    form.append("fname", fname);
    form.append("lname", lname);
    form.append("mobile", mobile);
    form.append("email", email);
    form.append("address1", address1);
    form.append("address2", address2);
    form.append("city", city);
    form.append("password", password);
    form.append("gender", gender);
    form.append("requestId", requestId);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            // alert("request.responseText");
            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);

            alert(jsResponseObject.msg);

            if (jsResponseObject.msg == "Successfully created account") {
                location.reload();
            }
        }

    };
    request.open("POST", "process_createAcc.php", true);
    request.send(form);

}

function DisableUser() {
    var username = document.getElementById("username").value;

    var form = new FormData();
    form.append("username", username);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert("success"); 
            alert(request.responseText);

            if (request.responseText == "Disabled User Succesfully") {
                location.reload();
            }

        }

    };
    request.open("POST", "process_disableUser.php", true);
    request.send(form);

}

function EnableUser() {
    var username = document.getElementById("username").value;

    var form = new FormData();
    form.append("username", username);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert("success"); 
            alert(request.responseText);

            if (request.responseText == "Activated User Succesfully") {
                location.reload();
            }

        }

    };
    request.open("POST", "process_enableUser.php", true);
    request.send(form);

}

function AddAssignment() {
    var grade = document.getElementById("grade").value;
    var subject = document.getElementById("subject").value;
    var id = document.getElementById("id").value;
    var name = document.getElementById("name").value;
    var file = document.getElementById("file").files[0];
    var year = document.getElementById("year").value;
    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;

    // alert(file);
    if (file === undefined) {
        alert("Select Assignment File(.pdf)");
    } else {
        var form = new FormData();
        form.append("grade", grade);
        form.append("subject", subject);
        form.append("id", id);
        form.append("name", name);
        form.append("file", file);
        form.append("year", year);
        form.append("from", from);
        form.append("to", to);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                // alert("request.responseText");
                var jsonResponseText = request.responseText;
                var jsResponseObject = JSON.parse(jsonResponseText);

                alert(jsResponseObject.msg);

                if (jsResponseObject.msg == "Succesfully Added Assignment") {
                    location.reload();
                }
            }

        };
        request.open("POST", "process_addAssignment.php", true);
        request.send(form);
    }
}

function GenerateAssId() {
    var grade = document.getElementById("grade").value;
    var subject = document.getElementById("subject").value;
    var year = document.getElementById("year").value;

    var form = new FormData();
    form.append("grade", grade);
    form.append("subject", subject);
    form.append("year", year);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert("success"); 
            document.getElementById("id").value = request.responseText;

        }

    };
    request.open("POST", "process_AssId.php", true);
    request.send(form);
}

function LoadAssignment() {
    var assId = document.getElementById("id").value;

    var form = new FormData();
    form.append("assId", assId);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);
            // alert("success");
            document.getElementById("grade").value = jsResponseObject.grade;
            document.getElementById("subject").value = jsResponseObject.subject;
            document.getElementById("name").value = jsResponseObject.name;
            document.getElementById("from").value = jsResponseObject.from;
            document.getElementById("to").value = jsResponseObject.to;

            if (jsResponseObject.msg == "success") {
                var ugrade = document.getElementById("grade");
                ugrade.setAttribute("disabled", "");
                var usubject = document.getElementById("subject");
                usubject.setAttribute("disabled", "");
                var ubtn = document.getElementById("add");
                ubtn.setAttribute("disabled", "");
            } else {
                var ugrade = document.getElementById("grade");
                ugrade.removeAttribute("disabled", "");
                var usubject = document.getElementById("subject");
                usubject.removeAttribute("disabled", "");
                var ubtn = document.getElementById("add");
                ubtn.removeAttribute("disabled", "");
            }

        }

    };
    request.open("POST", "process_loadReqAss.php", true);
    request.send(form);
}

function UpdateAssignment() {

    var id = document.getElementById("id").value;
    var name = document.getElementById("name").value;
    var file = document.getElementById("file").files[0];
    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;
    var grade = document.getElementById("grade").value;
    var subject = document.getElementById("subject").value;

    // alert(file);
    if (file === undefined) {
        alert("Select Assignment File(.pdf)");
    } else {
        var form = new FormData();
        form.append("id", id);
        form.append("name", name);
        form.append("file", file);
        form.append("from", from);
        form.append("to", to);
        form.append("grade", grade);
        form.append("subject", subject);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                // alert("request.responseText");
                var jsonResponseText = request.responseText;
                var jsResponseObject = JSON.parse(jsonResponseText);

                alert(jsResponseObject.msg);

                if (jsResponseObject.msg == "Succesfully Updated Assignment") {
                    location.reload();
                }
            }

        };
        request.open("POST", "process_UpdateAss.php", true);
        request.send(form);
    }
}


function GenerateNoteId() {
    var grade = document.getElementById("grade").value;
    var subject = document.getElementById("subject").value;

    var form = new FormData();
    form.append("grade", grade);
    form.append("subject", subject);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert("success"); 
            document.getElementById("id").value = request.responseText;

        }

    };
    request.open("POST", "process_noteId.php", true);
    request.send(form);
}

function AddNote() {
    var grade = document.getElementById("grade").value;
    var subject = document.getElementById("subject").value;
    var id = document.getElementById("id").value;
    var title = document.getElementById("title").value;
    var file = document.getElementById("file").files[0];

    // alert("success");
    if (file === undefined) {
        alert("Select Note File(.pdf)");
    } else {
        var form = new FormData();
        form.append("grade", grade);
        form.append("subject", subject);
        form.append("id", id);
        form.append("title", title);
        form.append("file", file);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                // alert("request.responseText");
                var jsonResponseText = request.responseText;
                var jsResponseObject = JSON.parse(jsonResponseText);

                alert(jsResponseObject.msg);

                if (jsResponseObject.msg == "Succesfully Added Note") {
                    location.reload();
                }
            }

        };
        request.open("POST", "process_addNote.php", true);
        request.send(form);
    }
}

function LoadNotes() {
    var subject = document.getElementById("subject").value;
    // alert(subject);

    var form = new FormData();
    form.append("subject", subject);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert(request.responseText); 
            document.getElementById("loadnote").innerHTML = request.responseText;

        }

    };
    request.open("POST", "process_loadNotes.php", true);
    request.send(form);
}

document.addEventListener("DOMContentLoaded", function () {
    var deleteButtons = document.querySelectorAll(".deleteButton");

    deleteButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var rowId = button.getAttribute("data-id");
            console.log("Delete button clicked for row with ID: " + rowId);

            // alert(rowId);
            var form = new FormData();
            form.append("rowId", rowId);

            var request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    alert(request.responseText);
                    // document.getElementById("loadnote").innerHTML = request.responseText;
                    if (request.responseText == "Deleted Succesfully") {
                        location.reload();
                    }
                }

            };
            request.open("POST", "process_deleteNotes.php", true);
            request.send(form);
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var submitButtons = document.querySelectorAll(".submitButton");

    submitButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var assignmentId = button.getAttribute("data-id");
            var inputField = document.getElementById("assAnswer_" + assignmentId);
            var inputValue = inputField.files[0]; // Get the selected file

            console.log("Submit button clicked for assignment with ID: " + assignmentId);
            console.log("Submitted file:", inputValue);

            // alert(assignmentId);
            // alert(id);
            if (inputValue === undefined) {
                alert("Please select file(.pdf)");
            } else {
                var form = new FormData();
                form.append("assAnswer", inputValue);
                form.append("id", assignmentId);

                var request = new XMLHttpRequest();
                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200) {
                        // alert("success"); 
                        alert(request.responseText);

                        if (request.responseText == "Submitted Successfully") {
                            location.reload();
                        }
                    }

                };
                request.open("POST", "process_uploadAss.php", true);
                request.send(form);
            }
        });
    });
});


document.addEventListener("DOMContentLoaded", function () {
    var answerViewButtons = document.querySelectorAll(".answerViewButton");

    answerViewButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var rowId = button.getAttribute("data-id");

            var form = new FormData();
            form.append("rowId", rowId);

            var request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    // alert(request.responseText);
                    document.getElementById("container2").innerHTML = request.responseText;

                }

            };
            request.open("POST", "process_loadAllAnswer.php", true);
            request.send(form);
        });
    });
});

function SearchTeacher() {
    var tid = document.getElementById("searchTeacher").value;

    var form = new FormData();
    form.append("tid", tid);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert(request.responseText);
            document.getElementById("container").innerHTML = request.responseText;

        }

    };
    request.open("POST", "process_searchTeacher.php", true);
    request.send(form);
}

function TeacherEnrollment() {
    var tid = document.getElementById("searchTeacher").value;
    var grade = document.getElementById("grade").value;
    var subject = document.getElementById("subject").value;

    var form = new FormData();
    form.append("tid", tid);
    form.append("grade", grade);
    form.append("subject", subject);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert(request.responseText);
            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);

            alert(jsResponseObject.msg);

            if (jsResponseObject.msg == "Succesfully Added To Subject") {
                location.reload();
            }
        }

    };
    request.open("POST", "process_addTeacher.php", true);
    request.send(form);
}

function SearchStudent() {
    var sid = document.getElementById("searchStudent").value;

    var form = new FormData();
    form.append("sid", sid);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert(request.responseText);
            document.getElementById("container").innerHTML = request.responseText;

        }

    };
    request.open("POST", "process_searchStudent.php", true);
    request.send(form);
}

function StudentEnrollment() {
    var sid = document.getElementById("searchStudent").value;
    var grade = document.getElementById("grade").value;

    var form = new FormData();
    form.append("sid", sid);
    form.append("grade", grade);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert(request.responseText);
            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);

            alert(jsResponseObject.msg);

            if (jsResponseObject.msg == "Succesfully Upgrated Student") {
                location.reload();
            }
        }

    };
    request.open("POST", "process_addStudent.php", true);
    request.send(form);
}

function SearchAccademic() {
    var aid = document.getElementById("searchAccademic").value;

    var form = new FormData();
    form.append("aid", aid);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert(request.responseText);
            document.getElementById("container").innerHTML = request.responseText;

        }

    };
    request.open("POST", "process_searchAccademic.php", true);
    request.send(form);
}

function AccademicEnrollment() {
    var aid = document.getElementById("searchAccademic").value;
    var grade = document.getElementById("grade").value;

    var form = new FormData();
    form.append("aid", aid);
    form.append("grade", grade);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert(request.responseText);
            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);

            alert(jsResponseObject.msg);

            if (jsResponseObject.msg == "Succesfully Added Officer") {
                location.reload();
            }
        }

    };
    request.open("POST", "process_addAccademic.php", true);
    request.send(form);
}

function LoadStudentRequests() {
    var requestId = document.getElementById("requestId").value;

    var form = new FormData();
    form.append("requestId", requestId);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);

            // alert(jsResponseObject.username);
            document.getElementById("username").value = jsResponseObject.username;
            document.getElementById("userType").value = jsResponseObject.usertype;
            document.getElementById("fname").value = jsResponseObject.fname;
            document.getElementById("lname").value = jsResponseObject.lname;
            document.getElementById("mobile").value = jsResponseObject.mobile;
            document.getElementById("email").value = jsResponseObject.email;
            document.getElementById("address1").value = jsResponseObject.address1;
            document.getElementById("address2").value = jsResponseObject.address2;
            document.getElementById("city").value = jsResponseObject.city;
            document.getElementById("password").value = jsResponseObject.password;
            document.getElementById("gender").value = jsResponseObject.gender;

        }

    };
    request.open("POST", "process_loadStuRequests.php", true);
    request.send(form);
}

function LoadAssignmentTable() {
    var aId = document.getElementById("assignmentId").value;

    var form = new FormData();
    form.append("aId", aId);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert(request.responseText);
            document.getElementById("container").innerHTML = request.responseText;

        }

    };
    request.open("POST", "process_loadAllAssAnswer.php", true);
    request.send(form);
}

function AddMarks() {
    var aId = document.getElementById("assignmentId").value;
    var sid = document.getElementById("sid").value;
    var marks = document.getElementById("marks").value;

    var form = new FormData();
    form.append("aId", aId);
    form.append("sid", sid);
    form.append("marks", marks);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert(request.responseText);
            document.getElementById("message").innerHTML = request.responseText;
            LoadAssignmentTable();


        }

    };
    request.open("POST", "process_addMarks.php", true);
    request.send(form);
}

function ReleaseMarks() {
    var aId = document.getElementById("assignmentId").value;

    var form = new FormData();
    form.append("aId", aId);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // alert(request.responseText);
            document.getElementById("message").innerHTML = request.responseText;
            LoadAssignmentTable();


        }

    };
    request.open("POST", "process_releaseMarks.php", true);
    request.send(form);
}

function VerifyCode() {
    var code = document.getElementById("code").value;

    var form = new FormData();
    form.append("code", code);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            document.getElementById("message").innerHTML = request.responseText;

            var jsonResponseText = request.responseText;
            var jsResponseObject = JSON.parse(jsonResponseText);
            // alert(jsResponseObject.msg);

            try {
                if (jsResponseObject.msg == "Success") {
                    if (jsResponseObject.type == "Admin") {
                        window.location = "AdminDash.php";
                    } else if (jsResponseObject.type == "Teacher") {
                        window.location = "TeacherDash.php";
                    } else if (jsResponseObject.type == "Student") {
                        window.location = "StudentDash.php";
                    } else if (jsResponseObject.type == "Accademic") {
                        window.location = "AccademicDash.php";
                    } else {
                        alert("Please sign in again");
                        window.location = "SignIn.php";
                    }

                } 
            } catch (e) {
                // Response is not valid JSON
                document.getElementById("message").innerHTML = request.responseText;
            }
        }
    };
    request.open("POST", "process_verifyCode.php", true);
    request.send(form);
}

$(document).ready(function(){

    $(window).fadeThis();
    
});