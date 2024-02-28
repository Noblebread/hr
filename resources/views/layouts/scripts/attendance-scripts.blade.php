<script>
    document.addEventListener("DOMContentLoaded", () => {
      Livewire.hook('message.processed', (component) => {
        setTimeout(function() {
          $('#alert').fadeOut('fast');
        }, 5000);
      });
    });
  
    window.livewire.on('closeAttendanceModal', () => {
      $('#attendanceModal').modal('hide');
    });
  
    window.livewire.on('openAttendanceModal', () => {
      $('#attendanceModal').modal('show');
    });
  </script>