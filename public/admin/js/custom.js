$(document).ready(function () {
    function updateToDatabase(idString) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/admin/update-menu-order",
            method: "POST",
            data: { ids: idString },
            success: function () {
                alert("Successfully updated");
                //do whatever after success
            },
        });
    }

    var target = $(".sort_menu");
    target.sortable({
        handle: ".handle",
        placeholder: "highlight",
        axis: "y",
        update: function (e, ui) {
            var sortData = target.sortable("toArray", { attribute: "data-id" });
            updateToDatabase(sortData.join(","));
        },
    });

    // $(".confirmDelete").click(function(){
    $(document).on("click", ".confirmDelete", function () {
        // alert(1);
        var module = $(this).attr("module");
        var moduleid = $(this).attr("moduleid");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
                window.location = "/admin/delete-" + module + "/" + moduleid;
            }
        });
    });

    //update menu status
    $(document).on("click", ".updateMenuStatus", function () {
        var status = $(this).children("i").attr("status");
        var menu_id = $(this).attr("menu_id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-menu-status",
            data: { status: status, menu_id: menu_id },
            success: function (resp) {
                if (resp["status"] == 0) {
                    $("#menu-" + resp["menu_id"]).html(
                        "<i class='fas fa-check text-danger' status='InActive'></i>"
                    );
                } else if (resp["status"] == 1) {
                    $("#menu-" + resp["menu_id"]).html(
                        "<i class='fas fa-check text-success' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("error");
            },
        });
    });

    //update news status
    $(document).on("click", ".updateNewsStatus", function () {
        var status = $(this).children("i").attr("status");
        var news_id = $(this).attr("news_id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-news-status",
            data: { status: status, news_id: news_id },
            success: function (resp) {
                if (resp["status"] == 0) {
                    $("#news-" + resp["news_id"]).html(
                        "<i class='fas fa-check text-danger' status='InActive'></i>"
                    );
                } else if (resp["status"] == 1) {
                    $("#news-" + resp["news_id"]).html(
                        "<i class='fas fa-check text-success' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("error");
            },
        });
    });

    //update updateLatestNewsStatus news status
    $(document).on("click", ".updateLatestNewsStatus", function () {
        var status = $(this).children("i").attr("status");
        var latest_id = $(this).attr("latest_id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-latest-news-status",
            data: { status: status, latest_id: latest_id },
            success: function (resp) {
                if (resp["lastest_status"] == 0) {
                    $("#latest-" + resp["latest_id"]).html(
                        "<i class='fas fa-check text-danger' status='InActive'></i>"
                    );
                } else if (resp["lastest_status"] == 1) {
                    $("#latest-" + resp["latest_id"]).html(
                        "<i class='fas fa-check text-success' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("error");
            },
        });
    });

    //update updateBannerNewsStatus news status
    $(document).on("click", ".updateBannerNewsStatus", function () {
        var status = $(this).children("i").attr("status");
        var banner_id = $(this).attr("banner_id");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-banner-status",
            data: { status: status, banner_id: banner_id },
            success: function (resp) {
                if (resp["banner_status"] == 0) {
                    $("#banner-" + resp["banner_id"]).html(
                        "<i class='fas fa-check text-danger' status='InActive'></i>"
                    );
                } else if (resp["banner_status"] == 1) {
                    $("#banner-" + resp["banner_id"]).html(
                        "<i class='fas fa-check text-success' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("error");
            },
        });
    });

    //update updatePopularNewsStatus news status
    $(document).on("click", ".updatePopularNewsStatus", function () {
        var status = $(this).children("i").attr("status");
        var popular_id = $(this).attr("popular_id");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-popular-status",
            data: { status: status, popular_id: popular_id },
            success: function (resp) {
                if (resp["popular_status"] == 0) {
                    $("#popular-" + resp["popular_id"]).html(
                        "<i class='fas fa-check text-danger' status='InActive'></i>"
                    );
                } else if (resp["popular_status"] == 1) {
                    $("#popular-" + resp["popular_id"]).html(
                        "<i class='fas fa-check text-success' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("error");
            },
        });
    });

    //update updateTrendingNewsStatus news status
    $(document).on("click", ".updateTrendingNewsStatus", function () {
        var status = $(this).children("i").attr("status");
        var trending_id = $(this).attr("trending_id");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-trending-status",
            data: { status: status, trending_id: trending_id },
            success: function (resp) {
                if (resp["trending_status"] == 0) {
                    $("#trending-" + resp["trending_id"]).html(
                        "<i class='fas fa-check text-danger' status='InActive'></i>"
                    );
                } else if (resp["trending_status"] == 1) {
                    $("#trending-" + resp["trending_id"]).html(
                        "<i class='fas fa-check text-success' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("error");
            },
        });
    });

    //update video status
    $(document).on("click", ".updateVideoStatus", function () {
        var status = $(this).children("i").attr("status");
        var video_id = $(this).attr("video_id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-video-status",
            data: { status: status, video_id: video_id },
            success: function (resp) {
                if (resp["status"] == 0) {
                    $("#video-" + resp["video_id"]).html(
                        "<i class='fas fa-check text-danger' status='InActive'></i>"
                    );
                } else if (resp["status"] == 1) {
                    $("#video-" + resp["video_id"]).html(
                        "<i class='fas fa-check text-success' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("error");
            },
        });
    });

    //show image in image bar area
    $("#image").change(function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#showImage").attr("src", e.target.result);
        };
        reader.readAsDataURL(e.target.files["0"]);
    });
});
