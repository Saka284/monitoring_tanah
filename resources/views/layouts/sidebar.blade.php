<div
    class="sidebar fixed top-0 left-0 w-20 h-screen flex flex-col items-center bg-green-400 text-white shadow-lg z-50 max-sm:hidden">
    <!-- Sidebar content -->
    <div class="sidebar-logo mt-2">
        <a href="#">
            <img src="assets/img/logo_sidebae.png" alt="Logo" class="w-12 h-12 mb-2">
        </a>
        <hr class="w-full border-t border-green-600 mt-2 mb-6">
    </div>

    <div class="sidebar-icon group mb-6">
        <a href="/dashboard"
            class="relative flex items-center justify-center w-12 h-12 bg-green-600 rounded-full transition-all duration-100 group-hover:duration-100 group-hover:rounded-lg group-hover:bg-green-700">
            <i class="fa fa-th-large text-xl {{ request()->is('dashboard') ? 'text-yellow-500' : '' }} text-white"></i>
            <span
                class="sidebar-tooltip absolute left-16 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white text-sm px-2 py-1 rounded opacity-0 transition-opacity duration-100 group-hover:opacity-100">
                Dashboard
            </span>
        </a>
    </div>

    <div class="sidebar-icon group mb-6">
        <a href="/remoteControll"
            class="relative flex items-center justify-center w-12 h-12 bg-green-600 rounded-full transition-all duration-100 group-hover:duration-100 group-hover:rounded-lg group-hover:bg-green-700">
        <i class="fa fa-wrench text-xl {{ request()->is('remoteControll') ? 'text-yellow-500' : ''}} text-white"></i>
            <span
                class="sidebar-tooltip absolute left-16 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white text-sm px-2 py-1 rounded opacity-0 transition-opacity duration-100 group-hover:opacity-100">
                Control
            </span>
        </a>
    </div>
</div>
