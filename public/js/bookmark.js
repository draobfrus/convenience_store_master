function bookmark(postId) {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: `/post/${postId}/bookmark`,
    type: "POST",
  })
    .done(function () {
      location.reload();
    })
    .fail(function (error) {
      console.log(error);
    });
}

function unbookmark(postId) {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: `/post/${postId}/unbookmark`,
    type: "POST",
    data: {
        _method: "DELETE"
    },
  })
    .done(function () {
      location.reload();
    })
    .fail(function (error) {
      console.log(error);
    });
}
