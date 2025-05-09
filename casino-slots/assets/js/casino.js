jQuery(document).ready(function ($) {
  $(".banner-slider").slick({
    dots: true,
    autoplay: true,
    autoplaySpeed: 2000,
    fade: true,
    speed: 700,
  });

  $("#add-slot-form").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append("action", "add_slot");
    $.ajax({
      url: ajaxurl,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        $("#add-slot-message").html(response.data ? response.data : response);
        if (response.success) location.reload();
      },
    });
  });

  $(".slot-list").on("click", ".slot-delete", function () {
    if (confirm("Удалить слот?")) {
      var slotId = $(this).data("id");
      $.post(ajaxurl, { action: "delete_slot", slot_id: slotId }, function (resp) {
        if (resp.success) {
          $('.slot[data-id="' + slotId + '"]').remove();
        } else {
          alert("Ошибка удаления");
        }
      });
    }
  });
});
