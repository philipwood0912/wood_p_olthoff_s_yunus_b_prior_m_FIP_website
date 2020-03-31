<header>
<div id="headerCon">
    <img id="headerLogo" src="public/images/fip_logo.svg" alt="logo">

    <div class="menu" :class="{'active': isActive}" @click="showTopMenu = !showTopMenu, isActive = !isActive"><i class="fas fa-bars fa-2x" id="burger"></i></div>
</div>  
</header>

<div id="menu-overlay" v-if="showTopMenu">

    <router-link @click.native="closeMenu" class="navLink" to="/">Home</router-link>

    <router-link @click.native="closeMenu" class="navLink" to="/learn">Get The Facts</router-link>

    <router-link @click.native="closeMenu" class="navLink" to="/about">About Us</router-link>

    <!-- <router-link @click.native="closeMenu" class="navLink" to="/login">Administrator Settings</router-link> -->
</div>

<div v-else> </div>

    