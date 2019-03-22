<template>
  <div id="app">
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
             <div class="sidebar-header">
                <img src="@/assets/images/Maerschalk_logo.svg"/>
            </div>
            <ul class="list-unstyled components">
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Dashboard</a>
            </li>
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

        <!-- Page Content -->
        <div id="content">
            <!-- We'll fill this with dummy content -->
        </div>
    </div>       
</div>
</template>

<script>


export default {
  name: 'app',
  components: {
    
  }
}
</script>