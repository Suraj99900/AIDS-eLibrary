// Define the API URL
const API_URL = "http://localhost:8000/api";

// Function to handle the file search
function searchBooks(page = 1) {
    var bookName = $("#searchBookByNameId").val();
    var bookISBN = $("#searchBookByISBNId").val();
    // Make an AJAX request using $.get method

    $.ajax({
        url: `${API_URL}/fetch/book?name=` + bookName + `&isbn=` + bookISBN + `&limit=` + 10 + `&page=` + page,
        method: 'get',
        success: function (data) {
            handleSearchSuccess(data);
        },
        error: function (data) {
            // Handle Ajax error
            handleSearchError(data);
        }
    });
}

// Function to handle a successful search
function handleSearchSuccess(data) {
    if (data.status_code === 200) {
        const dataTable = $('#SearchTableId').DataTable();
        dataTable.clear().draw(); // Clear existing data from the table

        const books = data.body.data;
        books.forEach((book, index) => {
            var sFileType = "";
            if (book.file_type == 1) {
                sFileType = "Book";
            } else if (book.file_type == 2) {
                sFileType = "Note";
            } else if (book.file_type == 3) {
                sFileType = "Assignment";
            }
            const row = [
                ++index,
                book.name,
                book.isbn ? book.isbn : '',
                sFileType,
                new Date(book.added_on).toLocaleString(),
                `<button class='btn download' data-url='${book.file_name}' data-index='${index}'><i class='fa-solid fa-circle-arrow-down'></i></button>`
            ];
            dataTable.row.add(row).draw();

        });
        // Handle pagination
        const currentPage = data.body.current_page;
        const lastPage = data.body.last_page;

        // Update pagination controls based on the response data
        const pagination = $('<div class="pagination"></div>');

        if (currentPage > 1) {
            pagination.append('<button class="btn prev-page">Previous</button>');
        }

        for (let page = 1; page <= lastPage; page++) {
            const pageButton = `<button class="btn page${page === currentPage ? ' active' : ''}">${page}</button>`;
            pagination.append(pageButton);
        }

        if (currentPage < lastPage) {
            pagination.append('<button class="btn next-page">Next</button>');
        }

        $('#SearchTableId_paginate').html(pagination);

        // Attach click handlers for pagination
        $('.pagination button').click(function () {
            const page = $(this).text();
            if (page === 'Previous') {
                searchBooks(currentPage - 1);
            } else if (page === 'Next') {
                searchBooks(currentPage + 1);
            } else {
                searchBooks(page);
            }
        });
    }
}


// Function to handle AJAX error
function handleSearchError(xhr, status, error) {
    console.error('Ajax Error:', error);
    const errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred';
    alert(errorMessage);
}

// Event delegation to handle download button clicks
$(document).on('click', '.download', function () {
    const url = $(this).data('url');
    const index = $(this).data('index');
    downloadFile(url, index);
});

// Function to handle a successful download
function downloadFile(url, index) {
    // Make an AJAX request to download the file
    $.ajax({
        url: `${API_URL}/download`,
        method: 'POST',
        data: { url: url },
        xhrFields: {
            responseType: 'blob' // Set the response type to 'blob' to handle binary data
        },
        success: function (data, status, xhr) {
            if (data) {
                const contentDisposition = xhr.getResponseHeader('Content-Disposition');
                const fileName = contentDisposition.match(/filename="(.+)"/)[1];

                // Create a Blob object from the downloaded data
                const blob = new Blob([data], { type: 'application/octet-stream' });

                // Create a URL for the Blob object
                const url = window.URL.createObjectURL(blob);

                // Create an anchor element to trigger the download
                const a = document.createElement('a');
                a.href = url;
                a.download = fileName;
                a.style.display = 'none';
                document.body.appendChild(a);

                a.click();

                // Clean up
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);

                alert('File downloaded successfully for ' + fileName);
            } else {
                alert('No data received for download.');
            }
        },
        error: function (xhr, status, error) {
            console.log('Download Error:', error);
            const errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred during download';
            alert(errorMessage);
        }
    });
}


// Initial search when the document is ready
$(document).ready(() => {
    searchBooks();
    // Attach the click event handler to the search button
    $("#idSearch").click(searchBooks);

    var semesterId = $("#semesterId");

    $.ajax({
        url: `${API_URL}/semester`,
        type: 'GET',
        success: function (response) {
            var aData = response.data; // Assuming response is an array of semester data

            // Clear existing options
            semesterId.empty();

            // Add default option
            semesterId.append($('<option>', {
                value: '',
                text: 'Select Any'
            }));

            // Add semester options
            $.each(aData, function (index, semester) {
                semesterId.append($('<option>', {
                    value: semester.id, // Adjust the property based on your response structure
                    text: semester.semester // Adjust the property based on your response structure
                }));
            });

        },
        error: function (xhr, status, error) {
            // Handle errors here
            console.error(xhr.responseText);
        }
    });
});

