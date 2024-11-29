<nav class="border-b-2 border-gray-700 bg-gray-900 fixed w-full z-20">
  <div class="container flex flex-wrap items-center justify-between mx-auto p-2">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="/assets/logo3.svg" class="h-14" alt="Logo" />
    </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="/assets/utilisateur.png" alt="user photo">
      </button>

      <div class="z-50 hidden my-4 absolute top-12 text-base list-nonedivide-y rounded-lg shadow bg-gray-700 divide-gray-600" id="dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-white"><?= esc(session('username')) ?></span>
          <span class="block text-sm truncate text-gray-400"><?= esc(session('email')) ?></span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
          <li>
            <a href="#" class="block px-4 py-2 text-sm  hover:bg-gray-600 text-gray-200 hover:text-white">Dashboard</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 text-sm  hover:bg-gray-600 text-gray-200 hover:text-white">Settings</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 text-sm  hover:bg-gray-600 text-gray-200 hover:text-white">Earnings</a>
          </li>
          <li>
            <a href="<?= base_url('auth/logout'); ?>" class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">Logout</a>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col items-center font-medium p-4 md:p-0 mt-4 border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-gray-800 md:bg-gray-900 border-gray-700">
        <li>
          <a href="<?= base_url('/') ?>"
            class="block px-4 py-1 rounded
        <?= current_url() == base_url("/index.php") || base_url("/")  ? 'bg-primary-800 text-black shadow-sm shadow-primary-500' : 'hover:bg-primary-800 hover:text-black bg-gray-700 text-gray-400 ' ?>"
            aria-current="page">
            Home
          </a>
        </li>
        <li>
          <a href="<?= base_url('/myBlogs') ?>"
            class=" block px-4 py-1 rounded
        <?= current_url() == base_url('index.php/myBlogs') ? 'bg-primary-800 text-black shadow-sm shadow-primary-500' : 'hover:bg-primary-800 hover:text-black bg-gray-700 text-gray-400 ' ?>">
            My Blogs
          </a>
        </li>

        <!-- <li>
        <a href="#" class="block py-2 px-3  hover:bg-gray-100 md:hover:bg-transparent  md:p-0 text-white md:hover:text-primary-500 ">Services</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-3  hover:bg-gray-100 md:hover:bg-transparent  md:p-0 text-white md:hover:text-primary-500 ">Pricing</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-3  hover:bg-gray-100 md:hover:bg-transparent md:p-0 text-white md:hover:text-primary-500 ">Contact</a>
      </li> -->
      </ul>
    </div>
  </div>
  <script>
    const dropdown = document.getElementById('user-menu-button');
    const dropdownMenu = document.getElementById('dropdown');
    let isopen = false;

    dropdown.addEventListener('click', function() {
      if (!isopen) {
        dropdownMenu.classList.remove('hidden');
        dropdownMenu.classList.add('block');
        isopen = true;
      } else {
        dropdownMenu.classList.add('hidden');
        dropdownMenu.classList.remove('block');
        isopen = false;
      }
    });
    document.addEventListener('click', function(e) {
      if (!dropdown.contains(e.target)) {
        dropdownMenu.classList.add('hidden');
        dropdownMenu.classList.remove('block');
        isopen = false;
      }
    });
  </script>
</nav>