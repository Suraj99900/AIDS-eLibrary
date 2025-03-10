// Register User

$("#idLogin").click(function() {
    var sStaffName = $("#staffuserNameId").val();
    var sStaffPassword = $("#staffuserPasswordId").val();


    // Make an Ajax request
    $.ajax({
        url: API_URL + "/login?userName="+sStaffName+"&password="+sStaffPassword, // URL to your server-side script
        method: "GET", // HTTP method (POST for user registration)
        success: function(data) {
            if (data.status_code === 200) {
                // Registration was successful
                responsePop('Success',data.message,'success','ok');
                
                $.ajax({
                    url: "../session.php", // URL to your server-side script
                    method: "POST", // HTTP method (POST for user registration)
                    data: {
                        "username":sStaffName,
                        "password":sStaffPassword,
                        "login":1
                    },
                    dataType: "json", // Expected data type (e.g., JSON)
                    success: function(data) {
                        console.log(data);
                        if(data == 1){
                            window.location.href = ABS_URL+"view/uploadScreen.php?staffAccess=1";
                        }
                    },
                    error: function(data) {
                        // Handle Ajax error
                        responsePop('Error','Error while genratng session.','error','ok');

                    }
                });
            }
        },
        error: function(data) {
            // Handle Ajax error
            var aData = data.responseJSON;
            responsePop('Error',aData.message,'error','ok');
        }
    });
});
