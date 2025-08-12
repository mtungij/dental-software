<!-- Today Summary -->
<div class="mt-8 w-full sm:px-6 lg:px-8">
  <h3 class="text-base font-semibold leading-6 text-gray-900 mb-6">Today Summary</h3>

  
  <!-- Cards Grid -->
  <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- Card 1: New Patient Today -->
    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow p-6">
      <div class="flex items-start gap-4">
        <!-- <div class="p-3 bg-white bg-opacity-20 rounded-xl">
         
          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493 M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07 M15 19.128v.106A12.318 12.318 0 018.624 21 c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07 M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z m8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        </div> -->
        <div class="flex-1">
          <p class="text-sm font-medium opacity-80">New Patient Today</p>
          <h4 class="text-3xl font-bold"><?= $todayPatients; ?></h4>
        </div>
      </div>
      <div class="mt-5 flex justify-between items-center text-sm">
        <div class="flex items-center gap-1 text-green-200 font-medium">
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" />
          </svg>
          +122
        </div>
        <a href="#" class="hover:underline text-white text-sm opacity-90 hover:opacity-100">View all</a>
      </div>
    </div>

    <!-- Card 2: Appointment Today -->
    <div class="bg-gradient-to-r from-violet-500 to-blue-500 text-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow p-6">
      <div class="flex items-start gap-4">
        <!-- <div class="p-3 bg-white bg-opacity-20 rounded-xl">
         
          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493 M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07 M15 19.128v.106A12.318 12.318 0 018.624 21 c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07 M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z m8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        </div> -->
        <div class="flex-1">
          <p class="text-sm font-medium opacity-80">Appointment Today</p>
          <h4 class="text-3xl font-bold"><?= $todayAppointments; ?></h4>
        </div>
      </div>
      <div class="mt-5 flex justify-between items-center text-sm">
        <div class="flex items-center gap-1 text-green-200 font-medium">
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" />
          </svg>
          +122
        </div>
        <a href="#" class="hover:underline text-white text-sm opacity-90 hover:opacity-100">View all</a>
      </div>
    </div>

    <!-- Card 3: Total Medicines -->
    <div class="bg-gradient-to-r from-cyan-500 to-blue-500 text-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow p-6">
      <div class="flex items-start gap-4">
        <!-- <div class="p-3 bg-white bg-opacity-20 rounded-xl">
         
          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493 M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07 M15 19.128v.106A12.318 12.318 0 018.624 21 c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07 M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z m8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        </div> -->
        <div class="flex-1">
          <p class="text-sm font-medium opacity-80">Total Medicines</p>
          <h4 class="text-3xl font-bold"><?= $totalMedicines; ?></h4>
        </div>
      </div>
      <div class="mt-5 flex justify-between items-center text-sm">
        <div class="flex items-center gap-1 text-green-200 font-medium">
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" />
          </svg>
          +122
        </div>
        <a href="#" class="hover:underline text-white text-sm opacity-90 hover:opacity-100">View all</a>
      </div>
    </div>

    <!-- Card 4: New Patient (Again? You can change content) -->
    <div class="bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow p-6">
      <div class="flex items-start gap-4">
        <!-- <div class="p-3 bg-white bg-opacity-20 rounded-xl">
          
          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493 M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07 M15 19.128v.106A12.318 12.318 0 018.624 21 c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07 M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z m8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        </div> -->
        <div class="flex-1">
          <p class="text-sm font-medium opacity-80">New Patient</p>
          <h4 class="text-3xl font-bold"><?= $todayPatients; ?></h4>
        </div>
      </div>
      <div class="mt-5 flex justify-between items-center text-sm">
        <div class="flex items-center gap-1 text-green-200 font-medium">
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" />
          </svg>
          +122
        </div>
        <a href="#" class="hover:underline text-white text-sm opacity-90 hover:opacity-100">View all</a>
      </div>
    </div>

        <div class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow p-6">
      <div class="flex items-start gap-4">
        <!-- <div class="p-3 bg-white bg-opacity-20 rounded-xl">
         
          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493 M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07 M15 19.128v.106A12.318 12.318 0 018.624 21 c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07 M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z m8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        </div> -->
        <div class="flex-1">
          <p class="text-sm font-medium opacity-80">New Patient Today</p>
          <h4 class="text-3xl font-bold"><?= $todayPatients; ?></h4>
        </div>
      </div>
      <div class="mt-5 flex justify-between items-center text-sm">
        <div class="flex items-center gap-1 text-green-200 font-medium">
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" />
          </svg>
          +122
        </div>
        <a href="#" class="hover:underline text-white text-sm opacity-90 hover:opacity-100">View all</a>
      </div>
    </div>

    <!-- Card 2: Appointment Today -->
    <div class="bg-gradient-to-r from-violet-500 to-blue-500 text-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow p-6">
      <div class="flex items-start gap-4">
        <!-- <div class="p-3 bg-white bg-opacity-20 rounded-xl">
         
          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493 M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07 M15 19.128v.106A12.318 12.318 0 018.624 21 c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07 M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z m8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        </div> -->
        <div class="flex-1">
          <p class="text-sm font-medium opacity-80">Appointment Today</p>
          <h4 class="text-3xl font-bold"><?= $todayAppointments; ?></h4>
        </div>
      </div>
      <div class="mt-5 flex justify-between items-center text-sm">
        <div class="flex items-center gap-1 text-green-200 font-medium">
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" />
          </svg>
          +122
        </div>
        <a href="#" class="hover:underline text-white text-sm opacity-90 hover:opacity-100">View all</a>
      </div>
    </div>

    <!-- Card 3: Total Medicines -->
    <div class="bg-gradient-to-r from-cyan-500 to-blue-500 text-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow p-6">
      <div class="flex items-start gap-4">
        <!-- <div class="p-3 bg-white bg-opacity-20 rounded-xl">
         
          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493 M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07 M15 19.128v.106A12.318 12.318 0 018.624 21 c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07 M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z m8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        </div> -->
        <div class="flex-1">
          <p class="text-sm font-medium opacity-80">Total Medicines</p>
          <h4 class="text-3xl font-bold"><?= $totalMedicines; ?></h4>
        </div>
      </div>
      <div class="mt-5 flex justify-between items-center text-sm">
        <div class="flex items-center gap-1 text-green-200 font-medium">
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" />
          </svg>
          +122
        </div>
        <a href="#" class="hover:underline text-white text-sm opacity-90 hover:opacity-100">View all</a>
      </div>
    </div>

    <!-- Card 4: New Patient (Again? You can change content) -->
    <div class="bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow p-6">
      <div class="flex items-start gap-4">
        <!-- <div class="p-3 bg-white bg-opacity-20 rounded-xl">
          
          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493 M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07 M15 19.128v.106A12.318 12.318 0 018.624 21 c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07 M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z m8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        </div> -->
        <div class="flex-1">
          <p class="text-sm font-medium opacity-80">New Patient</p>
          <h4 class="text-3xl font-bold"><?= $todayPatients; ?></h4>
        </div>
      </div>
      <div class="mt-5 flex justify-between items-center text-sm">
        <div class="flex items-center gap-1 text-green-200 font-medium">
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" />
          </svg>
          +122
        </div>
        <a href="#" class="hover:underline text-white text-sm opacity-90 hover:opacity-100">View all</a>
      </div>
    </div>


        <div class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow p-6">
      <div class="flex items-start gap-4">
        <!-- <div class="p-3 bg-white bg-opacity-20 rounded-xl">
         
          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493 M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07 M15 19.128v.106A12.318 12.318 0 018.624 21 c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07 M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z m8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        </div> -->
        <div class="flex-1">
          <p class="text-sm font-medium opacity-80">New Patient Today</p>
          <h4 class="text-3xl font-bold"><?= $todayPatients; ?></h4>
        </div>
      </div>
      <div class="mt-5 flex justify-between items-center text-sm">
        <div class="flex items-center gap-1 text-green-200 font-medium">
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" />
          </svg>
          +122
        </div>
        <a href="#" class="hover:underline text-white text-sm opacity-90 hover:opacity-100">View all</a>
      </div>
    </div>

    <!-- Card 2: Appointment Today -->
    <div class="bg-gradient-to-r from-violet-500 to-blue-500 text-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow p-6">
      <div class="flex items-start gap-4">
        <!-- <div class="p-3 bg-white bg-opacity-20 rounded-xl">
         
          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493 M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07 M15 19.128v.106A12.318 12.318 0 018.624 21 c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07 M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z m8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        </div> -->
        <div class="flex-1">
          <p class="text-sm font-medium opacity-80">Appointment Today</p>
          <h4 class="text-3xl font-bold"><?= $todayAppointments; ?></h4>
        </div>
      </div>
      <div class="mt-5 flex justify-between items-center text-sm">
        <div class="flex items-center gap-1 text-green-200 font-medium">
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" />
          </svg>
          +122
        </div>
        <a href="#" class="hover:underline text-white text-sm opacity-90 hover:opacity-100">View all</a>
      </div>
    </div>

    <!-- Card 3: Total Medicines -->
    <div class="bg-gradient-to-r from-cyan-500 to-blue-500 text-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow p-6">
      <div class="flex items-start gap-4">
        <!-- <div class="p-3 bg-white bg-opacity-20 rounded-xl">
         
          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493 M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07 M15 19.128v.106A12.318 12.318 0 018.624 21 c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07 M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z m8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        </div> -->
        <div class="flex-1">
          <p class="text-sm font-medium opacity-80">Total Medicines</p>
          <h4 class="text-3xl font-bold"><?= $totalMedicines; ?></h4>
        </div>
      </div>
      <div class="mt-5 flex justify-between items-center text-sm">
        <div class="flex items-center gap-1 text-green-200 font-medium">
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" />
          </svg>
          +122
        </div>
        <a href="#" class="hover:underline text-white text-sm opacity-90 hover:opacity-100">View all</a>
      </div>
    </div>

    <!-- Card 4: New Patient (Again? You can change content) -->
    <div class="bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow p-6">
      <div class="flex items-start gap-4">
        <!-- <div class="p-3 bg-white bg-opacity-20 rounded-xl">
          
          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493 M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07 M15 19.128v.106A12.318 12.318 0 018.624 21 c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07 M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z m8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        </div> -->
        <div class="flex-1">
          <p class="text-sm font-medium opacity-80">New Patient</p>
          <h4 class="text-3xl font-bold"><?= $todayPatients; ?></h4>
        </div>
      </div>
      <div class="mt-5 flex justify-between items-center text-sm">
        <div class="flex items-center gap-1 text-green-200 font-medium">
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" />
          </svg>
          +122
        </div>
        <a href="#" class="hover:underline text-white text-sm opacity-90 hover:opacity-100">View all</a>
      </div>
    </div>


  </dl>

  
</div>
