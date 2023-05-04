
// Accident location form
$(document).ready(function () {
  $('#ACCIDENT').submit(function (e) {
    e.preventDefault(); // prevent the form from being submitted through the browser

    $.ajax({
      type: "POST",
      url: $(this).attr('action'),
      data: $(this).serialize(), // serialize form data
      success: function (response) {
        console.log('response');
      },
      error: function (xhr, status, error) {
        console.log(error);
      }
    });
  });
});

// Available hospital form
$(document).ready(function () {
  $('#HOSPITAL').submit(function (e) {
    e.preventDefault(); // prevent the form from being submitted through the browser

    $.ajax({
      type: "POST",
      url: $(this).attr('action'),
      data: $(this).serialize(), // serialize form data
      success: function (response) {
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.log(error);
      }
    });
  });
});

// Redlight color form
$(document).ready(function () {
  $('#REDLIGHT').submit(function (e) {
    e.preventDefault(); // prevent the form from being submitted through the browser

    $.ajax({
      type: "POST",
      url: $(this).attr('action'),
      data: $(this).serialize(), // serialize form data
      success: function (response) {
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.log(error);
      }
    });
  });
});

// Quickest path form
$(document).ready(function () {
  $('#PATH').submit(function (e) {
    e.preventDefault(); // prevent the form from being submitted through the browser

    $.ajax({
      type: "POST",
      url: $(this).attr('action'),
      data: $(this).serialize(), // serialize form data
      success: function (response) {
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.log(error);
      }
    });
  });
});