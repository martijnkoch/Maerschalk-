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
                    <router-link to="/">Dashboard</router-link>
                </li>
            </div>
            <li>
                <router-link to="/">Meldingen</router-link>
            </li>
            <li>
                <router-link to="/team">Team</router-link>
            </li>
        </ul>
    </nav>
</template>