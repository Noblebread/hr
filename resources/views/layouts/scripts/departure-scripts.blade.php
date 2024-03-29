<script>
    document.addEventListener("DOMContentLoaded", () => {
      Livewire.hook('message.processed', (component) => {
        setTimeout(function() {
          $('#alert').fadeOut('fast');
        }, 5000);
      });
    });
  
    window.livewire.on('closeDepartureModal', () => {
      $('#departureModal').modal('hide');
    });
  
    window.livewire.on('openDepartureModal', () => {
      $('#departureModal').modal('show');
    });
  </script>