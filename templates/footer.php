<footer> 
    
    <div id="socialCon">
        <h2 class="followUs">Find us on Social Media!</h2>
        <div id="socialIconCon">
            <i class="fab fa-youtube fa-2x"></i>
            <i class="fab fa-facebook fa-2x"></i>
            <i class="fab fa-twitter fa-2x"></i>
            <i class="fab fa-instagram fa-2x"></i>
            <a href=""><img src="../public/images/tiktok.svg"></a>
        </div>
    </div>

    <div id="footerNav">
        <router-link class="footerLink" to="/">Home</router-link>

        <router-link class="footerLink" to="/learn">Get The Facts</router-link>

        <router-link class="footerLink" to="/about">About Us</router-link>

        <!-- <router-link class="footerLink" to="/login">Admin</router-link> -->

        <a class="footerLink" href="admin/admin_login.php">Admin Login</a>
    </div>
    
    <div id="copyright"><i class="far fa-copyright"></i> Copyright <?php echo date('Y'); ?> 
    </div>
</footer>