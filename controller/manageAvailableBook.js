// Define the API URL
const API_URL = "http://localhost:8000/api/books"; // Replace with your actual API endpoint
var currentPage = 1;
var paginationData;
// Initialize a counter for dynamic fields
let fieldCounter = 0;
// Function to add a new book
function addBook() {

    // Collect data from dynamic book fields
    const bookData = {
        book: [], // Initialize an empty array to store book names
    };

    if (fieldCounter == 0) {
        return 0;
    }

    // Iterate through all dynamic book name and ISBN fields
    for (let i = 0; i < fieldCounter; i++) {
        const bookNameInput = document.getElementsByName("bookname[]")[i];
        const bookISBNInput = document.getElementsByName("bookisbn[]")[i];
        // Make sure there is at least one book name and ISBN
        if ((bookNameInput.value.length == 0)) {
            alert("Please enter book name");
            return;
        } if (bookISBNInput.value.length == 0) {
            alert("Please enter ISBN.");
            return;
        }
        // Add the values to the data arrays
        bookData.book.push({
            "book_name": bookNameInput.value,
            "isbn_no": bookISBNInput.value,
            "user_name": $('#userId').val()
        });
    }



    $.ajax({
        url: API_URL,
        method: "POST",
        data: { "bookData": bookData },
        success: function (data) {
            if (data.status_code === 201) {
                alert(data.message);
                // You can optionally refresh the book list here

                // Redirect to another page 
                window.location.href = "manageAvailableBook.php";
            }
        },
        error: function (xhr, status, error) {
            console.error('Ajax Error:', xhr.responseText);
            alert('An error occurred');
        }
    });
}

// Function to fetch available books
function fetchBooks(page = 1) {
    var sSearch = $('#searchBookByNameISBNId').val();
    $.ajax({
        url: API_URL + "?page=" + page + '&search=' + sSearch,
        type: 'GET',
        success: function (response) {
            const books = response.books.data;
            const bookTable = $('#manageBookById');
            bookTable.empty();

            books.forEach((book, index) => {
                bookTable.append(`<tr>
                    <td>${index + 1}</td>
                    <td>${book.book_name}</td>
                    <td>${book.isbn_no}</td>
                    <td>${book.added_on}</td>
                    <td>${book.user_name}</td>
                    <td>
                        <a href="#" onclick="viewBook(${book.id})"data-bs-toggle="modal" data-bs-target="#updatedBookModalId"><i class="fa-solid fa-pencil"></i></a>
                        <a href="#" onclick="deleteBook(${book.id})"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>`);
            });
            paginationData = response.books;
            // Handle pagination
            const currentPage = paginationData.current_page;
            const lastPage = paginationData.last_page;

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

            $('#paginationContainer').html(pagination);

            // Attach click handlers for pagination
            $('.pagination button').click(function () {
                const page = $(this).text();
                if (page === 'Previous') {
                    fetchBooks(currentPage - 1);
                } else if (page === 'Next') {
                    fetchBooks(currentPage + 1);
                } else {
                    fetchBooks(page);
                }
            });
        },
        error: function (xhr, status, error) {
            console.error('Ajax Error:', xhr.responseText);
        }
    });
}



// Function to view book details by ID
function viewBook(bookId) {
    $.ajax({
        url: `${API_URL}/${bookId}`,
        type: 'GET',
        success: function (data) {
            // Handle the retrieved book data for viewing
            if (data.status_code == 200) {
                $('#updateNameId').val('');
                $('#updateISBNId').val('');
                $('#bookId').val('');
                const book = data.books;
                $('#updateNameId').val(book.book_name);
                $('#updateISBNId').val(book.isbn_no);
                $('#bookId').val(book.id);
            } else {
                alert("Error");
            }
        },
        error: function (xhr, status, error) {
            console.error('Ajax Error:', xhr.responseText);
            alert('An error occurred');
        }
    });
}

// Function to update book details by ID
function updateBook(bookId, updatedData) {
    $.ajax({
        url: `${API_URL}/${bookId}`,
        method: "PUT",
        data: updatedData,
        success: function (data) {
            if (data.status_code === 200) {
                alert(data.message);

                // Hide the modal
                $('#updatedBookModalId').modal('hide');

                // You can optionally refresh the book list here
                fetchBooks();
            }
        },
        error: function (xhr, status, error) {
            console.error('Ajax Error:', xhr.responseText);
            alert('An error occurred');
        }
    });
}

// function for delete the recored by id
function deleteBook(bookId) {
    $.ajax({
        url: `${API_URL}/${bookId}`,
        method: "DELETE",
        success: ((data) => {
            if (data.status_code === 200) {
                alert(data.message)
            }
            // You can optionally refresh the book list here
            fetchBooks();
        }),
        error: (() => {
            console.error('Ajax Error:', xhr.responseText);
            alert('An error occurred');
        })
    })
}


// Add Dynamic Filed in Add book

document.addEventListener("DOMContentLoaded", function () {


    // Add event listener to the "Add" button
    document.getElementById("addBookField").addEventListener("click", function (e) {
        e.preventDefault();

        // Create a new div to hold the dynamic fields
        const dynamicFieldDiv = document.createElement("div");
        dynamicFieldDiv.className = "row align-items-center p-3";

        const dynamicBookname = document.createElement("div");
        dynamicBookname.className = "col-sm-12 col-md-6 col-lg-6";

        // Create a new input for the book name
        const BookNameLabel = document.createElement("label");
        BookNameLabel.for = "bookUserName";
        BookNameLabel.className = "form-label";
        BookNameLabel.innerHTML = "<i class='fa-solid fa-user'></i> Book Name";

        // Create a new input for the book name
        const bookNameInput = document.createElement("input");
        bookNameInput.type = "text";
        bookNameInput.className = "form-control custom-control";
        bookNameInput.name = "bookname[]";
        bookNameInput.placeholder = "Enter book name";

        dynamicBookname.appendChild(BookNameLabel);
        dynamicBookname.appendChild(bookNameInput);


        const dynamicBookISBN = document.createElement("div");
        dynamicBookISBN.className = "col-sm-12 col-md-6 col-lg-6";

        const BookISBNILabel = document.createElement("label");
        BookISBNILabel.for = "bookUserName";
        BookISBNILabel.className = "form-label";
        BookISBNILabel.innerHTML = "<i class='fa-solid fa-hashtag'></i> ISBN";

        // Create a new input for the ISBN
        const bookISBNInput = document.createElement("input");
        bookISBNInput.type = "text";
        bookISBNInput.className = "form-control custom-control";
        bookISBNInput.name = "bookisbn[]";
        bookISBNInput.placeholder = "Enter Book ISBN Number";

        dynamicBookISBN.appendChild(BookISBNILabel);
        dynamicBookISBN.appendChild(bookISBNInput);

        // Append the new inputs to the dynamic field div
        dynamicFieldDiv.appendChild(dynamicBookname);
        dynamicFieldDiv.appendChild(dynamicBookISBN);

        // Append the dynamic field div to the container
        document.getElementById("dynamicBookFields").appendChild(dynamicFieldDiv);

        // Increment the field counter
        fieldCounter++;
    });
});


$(document).ready(function () {
    // Fetch available books for the first page when the page loads
    fetchBooks(currentPage);

    // Attach the click event handler to the search button
    $("#idSearch").click(fetchBooks);

    // Attched the click event handler to add the book in database
    $('#idAddSubmit').click(addBook);

    // Attched the click event handler to add the book in database
    $('#idUpDateBook').click(() => {
        const id = $('#bookId').val();
        const name = $('#updateNameId').val();
        const isbn = $('#updateISBNId').val();
        const userId = $('#userId').val();

        // Create an object to hold the data
        const formData = {
            book_name: name,
            isbn_no: isbn,
            user_name: userId,
        };

        updateBook(id, formData);
    });


});
