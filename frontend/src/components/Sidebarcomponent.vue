<template>
    <!-- Sidebar -->
    <nav id="sidebar">
            <div class="sidebar-header">
            <router-link to="/">
                <img src="@/assets/images/Maerschalk_logo.svg"/>
            </router-link>
        </div>
        <ul class="list-unstyled components">
            <div class="boder">
                <li class="active">
                    <a href="/" data-toggle="collapse" aria-expanded="false">Dashboard</a>
                </li>
            </div>
            <li>
                <a href="#">Email</a>
            </li>
            <li>
                <a href="#">Meldingen</a>
            </li>
            <li>
                <a href="#">Team</a>
            </li>
        </ul>
    </nav>
</template>