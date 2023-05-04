
$(document).ready(function () {
  $('#update-status-button').on("click", (function () {
    // send Post request
    $.ajax({
      type: 'POST',
      url: 'index.php',
      data: { action: "updateDisplay" },
      success: function (response) {
        $('#update-section').html(response);
      },
      error: function (xhr, status, error) {
        console.log(error);
      }
    });
  }));
});
