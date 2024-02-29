<script>
  document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('message.processed', (component) => {
      setTimeout(function() {
        $('#alert').fadeOut('fast');
      }, 5000);
    });
  });

  window.livewire.on('closeStaffModal', () => {
    $('#staffModal').modal('hide');
  });

  window.livewire.on('openStaffModal', () => {
    $('#staffModal').modal('show');
  });
</script>