<!-- Top Navbar - Brand Only -->
<nav class="navbar navbar-dark navbar-darkblue shadow-sm sticky-top z-999">
    <div class="container-fluid">
        <!-- Brand and Toggle -->
        <div class="d-flex align-items-center">
            <button class="btn btn-dark" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand ms-2" href="{{ route('dashboard') }}">
                <x-application-logo style="height: 36px; width: 36px;" />
                <span class="ms-2">Employees' Electronic Management System</span>
            </a>
        </div>

        <!-- User Profile Dropdown -->
        @auth
        <div class="dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown"
               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle me-1"></i>
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person me-2"></i>{{ __('Profile') }}
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="bi bi-box-arrow-right me-2"></i>{{ __('Log Out') }}
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        @else
        <div class="d-flex gap-3">
            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
                <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
            @endif
        </div>
        @endauth
    </div>
</nav>

<!-- Sidebar Navigation -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-content">
        @auth
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                   href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2 me-2 text-white"></i>
                    <span class="text-white">{{ __('Dashboard') }}</span>
                </a>
            </li>

            <!-- Health Cards Section - Collapsible -->
            <li class="sidebar-section">
                <div class="sidebar-section-header text-white" data-bs-toggle="collapse" data-bs-target="#healthCardsCollapse">
                    <span>Health Cards</span>
                    <i class="bi bi-chevron-down section-arrow text-white"></i>
                </div>
                <div class="collapse show" id="healthCardsCollapse">
                    <ul class="sidebar-subnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->routeIs('health-card.create') ? 'active' : '' }}"
                               href="{{ route('health-card.create') }}">
                                <i class="bi bi-plus-circle me-2 text-white"></i>
                                <span class="text-white">{{ __('Create Health Card') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->routeIs('dental-card.create') ? 'active' : '' }}"
                               href="{{ route('dental-card.create') }}">
                                <i class="bi bi-tooth me-2 text-white"></i>
                                <span class="text-white">{{ __('Create Dental Card') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->routeIs('health-cards.index') ? 'active' : '' }}"
                               href="{{ route('health-cards.index') }}">
                                <i class="bi bi-card-checklist me-2 text-white"></i>
                                <span class="text-white">{{ __('All Cards') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Records Section - Collapsible -->
            <li class="sidebar-section">
                <div class="sidebar-section-header text-white" data-bs-toggle="collapse" data-bs-target="#recordsCollapse">
                    <span>Records</span>
                    <i class="bi bi-chevron-down section-arrow"></i>
                </div>
                <div class="collapse show" id="recordsCollapse">
                    <ul class="sidebar-subnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->routeIs('health-card.ctr') ? 'active' : '' }}"
                               href="{{ route('health-card.ctr') }}">
                                <i class="bi bi-clipboard-plus me-2 text-white"></i>
                                <span class="text-white">{{ __('Consultation Record') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->routeIs('health-card.ctrs') ? 'active' : '' }}"
                               href="{{ route('health-card.ctrs') }}">
                                <i class="bi bi-archive me-2 text-white"></i>
                                <span class="text-white">{{ __('All Records') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

             <!-- Settings Section - Collapsible -->
            <li class="sidebar-section">
                <div class="sidebar-section-header text-white" data-bs-toggle="collapse" data-bs-target="#settingsCollapse">
                    <span>Management Settings</span>
                    <i class="bi bi-chevron-down section-arrow"></i>
                </div>
                <div class="collapse show" id="settingsCollapse">
                    <ul class="sidebar-subnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->routeIs('settings.predefined-items') ? 'active' : '' }}"
                               href="{{ route('settings.predefined-items') }}">
                                <i class="bi bi-clipboard-plus me-2 text-white"></i>
                                <span class="text-white">{{ __('Manage Chief Complaint') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->routeIs('health-card.ctrs') ? 'active' : '' }}"
                               href="{{ route('health-card.ctrs') }}">
                                <i class="bi bi-archive me-2 text-white"></i>
                                <span class="text-white">{{ __('Manage Treatment/Recommendation') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        @endauth
    </div>
</div>

<!-- Overlay when sidebar is open on mobile -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const mainContent = document.querySelector('.main-content');

    console.log('Sidebar:', sidebar); // Debug
    console.log('Toggle:', sidebarToggle); // Debug

    // Only run if sidebar exists (authenticated pages)
    if (!sidebar || !sidebarToggle) {
        console.log('Sidebar or toggle not found');
        return;
    }

    // Load saved states from localStorage
    const savedSidebarState = localStorage.getItem('sidebarCollapsed');
    const savedHealthCardsState = localStorage.getItem('healthCardsCollapsed');
    const savedRecordsState = localStorage.getItem('recordsCollapsed');
    const savedSettingsState = localStorage.getItem('settingsCollapse');

    // Apply saved sidebar state
    if (savedSidebarState === 'true' && window.innerWidth >= 768) {
        sidebar.classList.add('collapsed');
        if (mainContent) {
            mainContent.classList.remove('sidebar-open');
            mainContent.classList.add('sidebar-collapsed');
        }
    }

    // Apply saved section states
    if (savedHealthCardsState === 'true') {
        const healthCardsCollapse = document.getElementById('healthCardsCollapse');
        if (healthCardsCollapse) {
            healthCardsCollapse.classList.remove('show');
        }
    }

    if (savedRecordsState === 'true') {
        const recordsCollapse = document.getElementById('recordsCollapse');
        if (recordsCollapse) {
            recordsCollapse.classList.remove('show');
        }
    }

    if (savedSettingsState === 'true') {
        const settingsCollapse = document.getElementById('settingsCollapse');
        if(settingsCollapse) {
            settingsCollapse.classList.remove('show');
        }
    }

    // Sidebar toggle function
    function toggleSidebar() {
        console.log('Toggle sidebar clicked'); // Debug
        const isMobile = window.innerWidth < 768;

        if (isMobile) {
            // Mobile behavior: show/hide sidebar
            sidebar.classList.toggle('show');
            document.body.classList.toggle('sidebar-open-mobile');
            if (sidebarOverlay) {
                sidebarOverlay.style.display = sidebar.classList.contains('show') ? 'block' : 'none';
            }
        } else {
            // Desktop behavior: collapse/expand sidebar
            sidebar.classList.toggle('collapsed');
            if (mainContent) {
                mainContent.classList.toggle('sidebar-open');
                mainContent.classList.toggle('sidebar-collapsed');
            }

            // Save state to localStorage
            localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
        }

        console.log('Sidebar classes:', sidebar.classList); // Debug
    }

    // Section collapse handlers - FIXED SYNTAX ERROR
    function setupSectionCollapse() {
        const sectionHeaders = document.querySelectorAll('.sidebar-section-header');

        sectionHeaders.forEach(header => {
            header.addEventListener('click', function() {
                if (sidebar.classList.contains('collapsed')) return;

                const target = this.getAttribute('data-bs-target');
                const collapseElement = document.querySelector(target);
                const isExpanded = collapseElement.classList.contains('show');

                // Save section state - FIXED SYNTAX
                if (target === '#healthCardsCollapse') {
                    localStorage.setItem('healthCardsCollapsed', !isExpanded);
                } else if (target === '#recordsCollapse') {
                    localStorage.setItem('recordsCollapsed', !isExpanded);
                } else if (target === '#settingsCollapse') {
                    localStorage.setItem('settingsCollapse', !isExpanded); // FIXED: removed extra comma
                }
            });
        });

        // Initialize Bootstrap collapses
        const collapseElements = document.querySelectorAll('.collapse');
        collapseElements.forEach(collapse => {
            collapse.addEventListener('show.bs.collapse', function() {
                const header = document.querySelector(`[data-bs-target="#${this.id}"]`);
                if (header) {
                    header.setAttribute('aria-expanded', 'true');
                }
            });

            collapse.addEventListener('hide.bs.collapse', function() {
                const header = document.querySelector(`[data-bs-target="#${this.id}"]`);
                if (header) {
                    header.setAttribute('aria-expanded', 'false');
                }
            });
        });
    }

    // Initialize everything
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleSidebar();
        });
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function() {
            if (window.innerWidth < 768) {
                toggleSidebar();
            }
        });
    }

    // Setup section collapses
    setupSectionCollapse();

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        const isMobile = window.innerWidth < 768;
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnToggle = sidebarToggle.contains(event.target);

        if (isMobile && sidebar.classList.contains('show') &&
            !isClickInsideSidebar && !isClickOnToggle) {
            toggleSidebar();
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        const isMobile = window.innerWidth < 768;

        if (isMobile) {
            // On mobile: ensure sidebar is hidden by default
            sidebar.classList.remove('collapsed');
            if (mainContent) {
                mainContent.classList.remove('sidebar-open', 'sidebar-collapsed');
            }
        } else {
            // On desktop: restore saved state or default to expanded
            sidebar.classList.add('show');
            const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

            if (isCollapsed) {
                sidebar.classList.add('collapsed');
                if (mainContent) {
                    mainContent.classList.remove('sidebar-open');
                    mainContent.classList.add('sidebar-collapsed');
                }
            } else {
                sidebar.classList.remove('collapsed');
                if (mainContent) {
                    mainContent.classList.add('sidebar-open');
                    mainContent.classList.remove('sidebar-collapsed');
                }
            }

            if (sidebarOverlay) {
                sidebarOverlay.style.display = 'none';
            }
            document.body.classList.remove('sidebar-open-mobile');
        }
    });

    // Initialize on page load
    if (window.innerWidth >= 768) {
        sidebar.classList.add('show');
        const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

        if (isCollapsed) {
            sidebar.classList.add('collapsed');
            if (mainContent) {
                mainContent.classList.add('sidebar-collapsed');
            }
        } else {
            if (mainContent) {
                mainContent.classList.add('sidebar-open');
            }
        }
    }
});
</script>
