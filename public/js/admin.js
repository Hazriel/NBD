/* Javascript for the admin dashboard and admin functionalities */

/* Users */
var currentUserPage = 1;
var maxPages = $(".user-item").length;

$("#username").on('keypress', function(e) {
    // If the key entered is 'Enter/Return' then send the search function
    if (e.which === 13)
        searchUser();
});

function getUsers(page) {
    $.ajax({
        type: "GET",
        url: "/admin/user/list/".concat(page),
        data: "",
        success: function(response) {
            $("#user-container").html(response);
            currentUserPage = page;
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
        url: "/admin/user/search",
        data: {
            username : $("#username").val()
        },
        success: function(response) {
            $("#user-container").html(response);
        },
        dataType: "text"
    });
}

function nextUserPage() {
    if (currentUserPage !== maxPages)
        getUsers(++currentUserPage);
}

function previousUserPage() {
    if (currentUserPage > 1)
        getUsers(--currentUserPage);
}

/* News */
var currentNewsPage = 1;
var maxNewsPage = $(".news-item").length;

function getNews(page) {
    if (page !== currentNewsPage) { // Don't do anything if the page is the same
        $.ajax({
            type: "GET",
            url: "/admin/news/list/".concat(page),
            data: "",
            success: function (response) {
                currentNewsPage = page;
                $("#news-container").fadeOut('slow', function () {
                    $("#news-container").html(response).fadeIn('slow');
                });
            },
            dataType: "text"
        })
    }
}


function nextNewsPage() {
    if (currentNewsPage < maxNewsPage) {
        getNews(currentNewsPage + 1);
    }
}

function previousNewsPage() {
    if (currentNewsPage > 1) {
        getNews(currentNewsPage - 1);
    }
}