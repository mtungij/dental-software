<div>
   <!-- resources/views/livewire/appointments/calendar.blade.php -->

<div class="mt-8 w-full sm:px-6 lg:px-8">
  <h3 class="text-base font-semibold leading-6 text-gray-900 mb-6">Appointments Calendar</h3>

  <div id="calendar" wire:ignore class="bg-white rounded-2xl p-4 shadow"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      height: "auto",
      events: @json($appointments),
    });
    calendar.render();
  });
</script>

</div>
