<nav class="px-8 py-6 border-b border-slate-900/10">
    <div class="flex justify-between items-center container mx-auto">

    <!-- Logo -->
    <div class="text-black text-xl font-bold">
        <a href="#" class="logo  text-slate-800 text-xl tracking-tighter font-black ">GarmentFlow.</a>
    </div>


    <!-- Hamburger Icon (hidden on larger screens) -->
    <div class="lg:hidden">

        <button id="menu-toggle" class="text-black rounded-md p-2 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
         
          <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>

        
          <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>

        </button>

    </div>



    <!-- Navigation Links (hidden on small screens, visible on larger screens) -->
    <ul id="nav-links" class="hidden lg:flex items-center space-x-6">
        <li><a href="#" class="text-slate-500 hover:text-blue-500 text-sm font-medium transition-colors duration-300 ease-in-out">Home</a></li>
        <li><a href="#" class="text-slate-500 hover:text-blue-500 text-sm font-medium transition-colors duration-300 ease-in-out">About</a></li>
        <li><a href="#" class="text-slate-500 hover:text-blue-500 text-sm font-medium transition-colors duration-300 ease-in-out">Features</a></li>
        <li><a href="#" class="text-slate-500 hover:text-blue-500 text-sm font-medium transition-colors duration-300 ease-in-out">Contact</a></li>
        <li><a href="#" class="px-4 py-2 text-white text-sm font-medium  rounded-full bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-700 focus:ring-offset-2 focus:ring-offset-yellow-50 transition-colors ease-in-out">Register</a></li>
      </ul>
    </div>




    <!-- Mobile Menu (visible on small screens when toggled) -->
    <div id="mobile-menu" class="lg:hidden hidden menu-transition max-h-0 overflow-hidden">
      <ul class="flex flex-col space-y-4 mt-4">
        <li><a href="#" class="text-slate-500 hover:text-blue-500 text-sm font-medium transition-colors duration-300 ease-in-out">Home</a></li>
        <li><a href="#" class="text-slate-500 hover:text-blue-500 text-sm font-medium transition-colors duration-300 ease-in-out">About</a></li>
        <li><a href="#" class="text-slate-500 hover:text-blue-500 text-sm font-medium transition-colors duration-300 ease-in-out">Contact</a></li>
        <li><a href="#" class="text-slate-500 hover:text-blue-500 text-sm font-medium transition-colors duration-300 ease-in-out">Login</a></li>
      </ul>
    </div>



</nav>


<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');

    menuToggle.addEventListener('click', () => {
      // Toggle the mobile menu
      mobileMenu.classList.toggle('hidden');

      // Toggle the hamburger and close icons
      hamburgerIcon.classList.toggle('hidden');
      closeIcon.classList.toggle('hidden');

      // Transition for sliding effect
      if (mobileMenu.classList.contains('hidden')) {
        mobileMenu.style.maxHeight = '0px';
      } else {
        mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
      }
    });
</script>