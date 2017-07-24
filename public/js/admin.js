/* Javascript for the admin dashboard and admin functionalities */

var currentPage = 1;
var maxPages = $(".page-item").length - 2;

function getUsers(page) {
    $.ajax({
        url: "/nbd/public/admin/user/list/".concat(page),
        data: "",
        success: function(response) {
            $("#user-container").html(response);
            currentPage = page;
        },
        dataType: "text"
    })
}

function nextPage() {
    if (currentPage !== maxPages)
        getUsers(currentPage + 1);
}

function previousPage() {
    if (currentPage > 1)
        getUsers(currentPage - 1);
}