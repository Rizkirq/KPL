<?php
session_start();

$current_page = basename($_SERVER['SCRIPT_NAME']); 
$is_logged_in = isset($_SESSION["user_id"]); 
?>

<header class="bg-white absolute inset-x-0 top-0 z-50">
  <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
      <a href="../public/index.php" class="-m-1.5 p-1.5 text-green-600">MakeBlog</a>
    </div>
    <div class="flex lg:hidden">
      <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only">Open main menu</span>
        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </div>
    <div class="hidden lg:flex lg:gap-x-12">
      <a href="#" class="text-sm/6 font-semibold text-gray-900">Home</a>
      <a href="#" class="text-sm/6 font-semibold text-gray-900">Trending</a>
      <a href="#" class="text-sm/6 font-semibold text-gray-900">Hot News</a>
      <a href="#" class="text-sm/6 font-semibold text-gray-900">Contact</a>
    </div>

    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
      <?php if ($is_logged_in): ?>
        <div class="relative">
          <button id="menuButton" class="text-gray-900">
            ☰
          </button>
          <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded shadow-md">
            <a href="../public/profile.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
            <a href="../public/dashboard.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
            <a href="../public/logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
          </div>
        </div>
      <?php elseif ($current_page != "login.php" && $current_page != "signup.php"): ?>
        <a href="../public/login.php" class="text-sm/6 font-semibold text-green-600">Log in <span aria-hidden="true">&rarr;</span></a>
      <?php endif; ?>
    </div>
  </nav>
</header>

<script>
  document.getElementById("menuButton").addEventListener("click", function() {
    var menu = document.getElementById("dropdownMenu");
    menu.classList.toggle("hidden");
  });
</script>
