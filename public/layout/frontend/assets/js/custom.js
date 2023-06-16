(function ($) {
  "use strict";

  //url format https://www.domain.com/
  var base_url =
    window.location.origin + "/" + window.location.pathname.split("/")[0] + "";

  $(".login").on("click", function (e) {
    e.preventDefault();
    let email = $("#email").val();
    let password = $("#password").val();
    let remember = $("#flexCheckDefault").is(":checked");

    $.ajax({
      type: "POST",
      url: base_url + "account/signin",
      data: { email, password, remember },
      dataType: "json",

      success(res) {
        if (res.status == 200) {
          window.location.href = base_url;
        }

        if (res.status == 204) {
          $(".warning").removeClass("d-none");
          $(".alert").html(res.msg);
        }
      },
    });
  });

  $(".register").on("click", function (e) {
    e.preventDefault();
    let firstname = $("#firstname").val();
    let lastname = $("#lastname").val();
    let email = $("#email").val();
    let phone = $("#phone").val();
    let password = $("#password").val();
    let terms = $("#flexCheckDefault").is(":checked");

    if (terms == false) {
      return alert(
        "You must agree to the application agreement terms before continuing."
      );
    }

    $.ajax({
      type: "POST",
      url: base_url + "account/signup",
      data: { firstname, lastname, email, phone, password },
      dataType: "json",

      success(res) {
        if (res.status == 200) {
          window.location.href = base_url + "account/validation-otp";
        }

        if (res.status == 400) {
          $(".warning").removeClass("d-none");
          $(".alert").html(res.msg);
        }
      },
    });
  });

  $(".save_customer_address").on("click", function (e) {
    e.preventDefault();
    let id = $(this).attr("data-id");
    let title = $("#title").val();
    let description = $("#description").val();
    let firstname = $("#firstname").val();
    let lastname = $("#lastname").val();
    let phone = $("#phone").val();
    let street = $("#street").val();
    let street_no = $("#street_no").val();
    let floor = $("#floor").val();
    let postcode = $("#postcode").val();
    let city = $("#city").val();
    let country = $("#country").val();

    if (id && id.trim().length) {
      var post_url = "update-address";
    } else {
      var post_url = "add-address";
    }

    $.ajax({
      type: "POST",
      url: base_url + "account/" + post_url,
      data: {
        id,
        title,
        description,
        firstname,
        lastname,
        phone,
        street,
        street_no,
        floor,
        postcode,
        city,
        country,
      },
      dataType: "json",

      success(res) {
        if (res.status == 200) {
          $("#add-address").modal("hide");
          location.reload(true);
          window.location.href = base_url + "account/dashboard#pills-address/";
        }

        if (res.status == 400) {
          $(".warning").removeClass("d-none");
          $(".alert").html(res.msg);
        }
      },
    });
  });

  $("#add-address").on("show.bs.modal", function () {
    $("#exampleModalLabel").text("Add new Address");
    $("#title").val("");
    $("#description").val("");
    $("#firstname").val("");
    $("#lastname").val("");
    $("#phone").val("");
    $("#street").val("");
    $("#street_no").val("");
    $("#floor").val("");
    $("#postcode").val("");
    $("#city").val("Berlin");
    $("#country").val("Deutschland");
    $(".save_customer_address").removeAttr("data-id");
  });

  $(".delete_address").on("click", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    $.ajax({
      type: "POST",
      url: base_url + "account/delete-address",
      data: { id },
      dataType: "json",
      success(res) {
        if (res.status == 200) {
          location.reload(true);
        }
      },
    });
  });

  $(".open_address_modal").on("click", function (e) {
    e.preventDefault();
    let id = $(this).attr("data-id");
    $("#add-address").modal("show");

    $("#exampleModalLabel").text("Update Address");

    $.ajax({
      type: "POST",
      url: base_url + "account/get-address",
      data: { id },
      dataType: "json",
      success(res) {
        if (res.status == 200) {
          $("#title").val(res.address.title);
          $("#description").val(res.address.description);
          $("#firstname").val(res.address.firstname);
          $("#lastname").val(res.address.lastname);
          $("#phone").val(res.address.phone);
          $("#street").val(res.address.street);
          $("#street_no").val(res.address.street_no);
          $("#floor").val(res.address.floor);
          $("#postcode").val(res.address.postcode);
          $("#city").val(res.address.city);
          $("#country").val(res.address.country);
          $(".save_customer_address").attr("data-id", res.address.id);
        } else {
          alert(res.message);
        }
      },
    });
  });

  $(".reset-password").on("click", function (e) {
    e.preventDefault();
    let phone = $(".forgot-password").val();

    console.log(phone.length);

    if (phone.length < 12 || phone.length > 15) {
      $(".warning").removeClass("d-none");
      $(".alert").html("invalid phone number");

      return;
    } else {
      $(".warning").addClass("d-none");
      $(".alert").html("");
      $(this).prop("disabled", true);
    }

    $.ajax({
      type: "POST",
      url: base_url + "account/forgot-password",
      data: { phone },
      dataType: "json",

      success(res) {
        if (res.status == 200) {
          window.location.href = base_url + "account/reset-password";
        } else {
          $(".warning").removeClass("d-none");
          $(".alert").html(res.msg);
          $(this).prop("disabled", false);
        }
      },
    });
  });

  $(".validate").on("click", function (e) {
    e.preventDefault();
    let first = $("#first").val();
    let second = $("#second").val();
    let third = $("#third").val();
    let fourth = $("#fourth").val();
    let fifth = $("#fifth").val();
    let sixth = $("#sixth").val();

    let otp_code = first + second + third + fourth + fifth + sixth;

    $.ajax({
      type: "POST",
      url: base_url + "account/verification-otp",
      data: { otp_code },
      dataType: "json",

      success(res) {
        if (res.status == 200) {
          window.location.href = base_url + res.url;
        }
      },
    });
  });

  $(".new_password").on("click", function (e) {
    e.preventDefault();
    let password = $("#password").val();
    let confirm_password = $("#confirm_password").val();

    $.ajax({
      type: "POST",
      url: base_url + "account/new-password",
      data: { password, confirm_password },
      dataType: "json",

      success(res) {
        if (res.status == 200) {
          window.location.href = base_url;
        }

        if (res.status == 204) {
          $(".warning").removeClass("d-none");
          $(".alert").html(res.msg);
        }
      },
    });
  });
})(jQuery);
