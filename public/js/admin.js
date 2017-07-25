/* Javascript for the admin dashboard and admin functionalities */

var currentPage = 1;
var maxPages = $(".page-item").length - 2;

$("#username").on('keypress', function(e) {
    // If the key entered is 'Enter/Return' then send the search function
    if (e.which === 13)
        searchUser();
});

function getUsers(page) {
    $.ajax({
        type: "GET",
        url: "/nbd/public/admin/user/list/".concat(page),
        data: "",
        success: function(response) {
            $("#user-container").html(response);
            currentPage = page;
        },
        dataType: "text"
    })
}

function searchUser() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/nbd/public/admin/user/search",
        data: {
            username : $("#username").val()
        },
        success: function(response) {
            $("#user-container").html(response);
        },
        dataType: "text"
    });
}

function nextPage() {
    if (currentPage !== maxPages)
        getUsers(currentPage + 1);
}

function previousPage() {
    if (currentPage > 1)
        getUsers(currentPage - 1);
}