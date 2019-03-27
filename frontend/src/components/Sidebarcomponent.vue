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
                    <router-link to="/">
                        <a data-toggle="collapse" aria-expanded="false">Dashboard</a>
                    </router-link>
                </li>
            </div>
            <li>
                <a href="#">Email</a>
            </li>
            <li>
                <a href="#">Meldingen</a>
            </li>
            <li>
                <router-link to="/team">
                    <a href="#">Team</a>
                </router-link>
            </li>
        </ul>
    </nav>
</template>