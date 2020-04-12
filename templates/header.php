<header>
        <a class="headerLogo" href="#/"><img src="public/images/gettested_logo.svg" alt="logo"></a>

        <div id="burger">
            <div :class="{'active': isActive}" @click="showTopMenu = !showTopMenu, isActive = !isActive"><i class="fas fa-bars" ></i></div>
        </div>


    <div id="desktopNav">
        <router-link @click.native="closeMenu" class="desk" to="/">Home</router-link>

        <router-link @click.native="closeMenu" class="desk" to="/learn">The Facts</router-link>

        <router-link @click.native="closeMenu" class="desk" to="/about">About Us</router-link>
    </div>
</header>

<div id="menu-overlay" v-if="showTopMenu">
    <router-link @click.native="closeMenu" class="navLink" to="/">Home</router-link>

    <router-link @click.native="closeMenu" class="navLink" to="/learn">The Facts</router-link>

    <router-link @click.native="closeMenu" class="navLink" to="/about">About Us</router-link>
    <!-- <router-link @click.native="closeMenu" class="navLink" to="/login">Administrator Settings</router-link> -->
</div>

<div v-else> </div>

    