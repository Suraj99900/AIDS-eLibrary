// Define the API URL
const API_URL = "http://localhost:8000/api/books"; // Replace with your actual API endpoint
var currentPage = 1;
var paginationData;
// Function to add a new book
function addBook(bookData) {
    $.ajax({
        url: API_URL,
        method: "POST",
        data: bookData,
        success: function (data) {
            if (data.status_code === 201) {
                alert(data.message);
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

// Function to fetch available books
function fetchBooks(page = 1) {
    var sSearch = $('#searchBookByNameISBNId').val();
    $.ajax({
        url: API_URL+"?page="+page+'&search='+sSearch,
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
                        <a href="#" onclick="viewBook(${book.id})"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" onclick="updateBook(${book.id})"><i class="fa-solid fa-pencil"></i></a>
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
            const book = data.book;
            // You can display or process the book data as needed
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

$(document).ready(function () {
    // Fetch available books for the first page when the page loads
    fetchBooks(currentPage);

    // Attach the click event handler to the search button
    $("#idSearch").click(fetchBooks);
});
