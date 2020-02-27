<header>
    <img id="headerLogo" src="public/images/fip_logo.svg" alt="logo">


<div class="menu" :class="{'active': isActive}" @click="showTopMenu = !showTopMenu, isActive = !isActive"><i class="fas fa-bars fa-3x"></i></div>
    </header>

    <div id="menu-overlay" v-if="showTopMenu">
        <router-link @click.native="closeMenu" class="navLink" to="/">Home</router-link>
        <router-link @click.native="closeMenu" class="navLink" to="/about">About Our Campaign</router-link>
        <router-link @click.native="closeMenu" class="navLink" to="/contact">Get Involved</router-link>
        <router-link @click.native="closeMenu" class="navLink" to="/login">Administrator Settings</router-link>
    </div>

    <div v-else></div>