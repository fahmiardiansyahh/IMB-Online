
function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $.post("../ajax/baca.php", {
            id_pemohon: id_pemohon
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#passwordlama").val(user.password);
        }
    );
    // Open modal popup
    $("#editpassword").modal("show");
}

function UpdateUserDetails() {
    // get values
    var first_name = $("#update_first_name").val();
    var last_name = $("#update_last_name").val();
    var email = $("#update_email").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/update.php", {
            id: id,
            first_name: first_name,
            last_name: last_name,
            email: email
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});