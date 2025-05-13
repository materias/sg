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
      url: casino_ajax.ajaxurl,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.success && response.data && response.data.html) {
          $(".slots__list").append(response.data.html);
          $("#addSlotModal").removeClass("modal--active");
          updateSlotNumbers();
          $("#add-slot-form")[0].reset();
        } else {
          alert(response.data ? response.data : "Slot creation error");
        }
      },
      error: function () {
        alert("Connection error");
      },
    });
  });

  $(".slots__list").on("click", ".slots__item-delete", function () {
    if (confirm("Delete this slot?")) {
      var slotId = $(this).data("id");
      $.post(casino_ajax.ajaxurl, { action: "delete_slot", slot_id: slotId }, function (resp) {
        if (resp.success) {
          $('.slots__item[data-id="' + slotId + '"]')
            .parent()
            .remove();
        } else {
          alert("Delete error");
        }
      });
    }
  });

  function updateSlotNumbers() {
    $('.slots__item-number').each(function(index) {
      $(this).text(index + 1);
    });
  }  
});
