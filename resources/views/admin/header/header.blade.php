<header style="
    background-color: #121212; 
    border-bottom: 1px solid #ffd700; 
    display: grid; 
    grid-template-columns: 1fr auto 1fr; 
    align-items: center; 
    padding: 3rem 2rem;
    gap: 1rem;
">
    <!-- Empty left column for spacing -->
    <div></div>

    <!-- Centered Title -->
    <h1 style="
        color: #ffd700; 
        font-weight: bold; 
        font-size: 1.8rem; 
        margin: 0; 
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    ">
        Welcome, Admin
    </h1>

    <!-- Right side: Search + User Icon -->
    <div style="
        display: flex; 
        align-items: center; 
        justify-content: flex-end; 
        gap: 15px;
        min-width: 300px;
    ">
        <!-- Search Form -->
        <form method="GET" action="{{ route('admin.dashboard.index') }}" style="display: flex; gap: 8px;">
            <input 
                type="search" 
                name="search" 
                placeholder="Search..." 
                value="{{ request('search') }}"
                style="
                    background-color: #000; 
                    color: #fff; 
                    border: 1px solid #ffd700; 
                    border-radius: 4px; 
                    padding: 0.35rem 0.6rem;
                    min-width: 180px;
                "
            >
            <button type="submit" style="
                background-color: #ffd700; 
                color: #000; 
                border: none; 
                border-radius: 4px; 
                padding: 0.35rem 1rem; 
                font-weight: 600; 
                cursor: pointer;
            ">
                Search
            </button>
        </form>

        <!-- User Icon -->
        <a href="#" title="User Profile" style="color: #ffd700; font-size: 1.8rem;">
            <i class="fas fa-user-circle"></i>
        </a>
    </div>
</header>
