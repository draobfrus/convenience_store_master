function bookmark(postId) {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: `/post/${postId}/bookmark`,
    type: "POST",
    data: {
        _method: "POST"
    },
  })
    .done(function (data, status, xhr) {
      console.log(data);
      location.reload();
    })
    .fail(function (xhr, status, error) {
      console.log();
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
    .done(function (data, status, xhr) {
      console.log(data);
      location.reload();
    })
    .fail(function (xhr, status, error) {
      console.log();
    });
}
