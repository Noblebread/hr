<script>
    document.addEventListener("DOMContentLoaded", () => {
      Livewire.hook('message.processed', (component) => {
        setTimeout(function() {
          $('#alert').fadeOut('fast');
        }, 5000);
      });
    });
  
    window.livewire.on('closeDocumentModal', () => {
      $('#documentModal').modal('hide');
    });
  
    window.livewire.on('openDocumentModal', () => {
      $('#documentModal').modal('show');
    });
  </script>