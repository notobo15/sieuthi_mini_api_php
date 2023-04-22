<div style="top: 10%;left: 50%; transform: translate(-50%, 0); z-index: 9999" class="modal-alert alert d-none alert-success position-absolute" role="alert">

  <strong></strong>
</div>
<script>
  async function showModalAlert(text) {
    await $(".modal-alert").html(`<strong>${text}</strong>`)
    await $(".modal-alert").removeClass("d-none");
    await window.setTimeout(function() {
      $(".alert")
        .fadeTo(500, 0)
        .slideUp(500, function() {
          $(this).remove();
          location.assign("./index.php");
        });
    }, 500);
  }
</script>