// Define the API URL
const API_URL = "http://localhost:8000/api";

// Function to handle the file upload
function Search() {
    const sBookName = $("#searchBookByNameId").val();
    const sBookISBN = $("#searchBookByISBNId").val();

    // Make an AJAX request using FormData
    $.ajax({
        url: `${API_URL}/fetch/book?name=`+sBookName+'&isbn='+sBookISBN+'&limit='+10,
        method: "GET",
        contentType: false, // Required for FormData
        processData: false, // Required for FormData
        success: handleUploadSuccess,
        error: handleUploadError,
    });
}

// Function to handle a successful upload
function handleUploadSuccess(data) {
    if (data.status_code === 200) {
        console.log(data)
    }
}

// Function to handle AJAX error
function handleUploadError(data) {
    console.error('Ajax Error:', data);
    const errorMessage = data.responseJSON && data.responseJSON.message ? data.responseJSON.message : 'An error occurred';
    alert(errorMessage);
}

// Attach the click event handler to the button
$("#idSearch").click(Search);
