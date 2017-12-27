/*
 * Used to manage the news in the news page
 */

var currentNewsPage = 1;
var maxNewsPage = $(".news-item").length;

function getNews(page) {
    if (page !== currentNewsPage) { // Don't do anything if the page is the same
        $.ajax({
            type: "GET",
            url: "/news/list/".concat(page),
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
