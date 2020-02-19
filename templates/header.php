<?php echo '<h2>This is the header</h2>
            <h3>Admin Login</h3>
            <form action="index.php" method="post">
                <label>Username:</label>
                <input type="text" name="username" value="">
                <label>Password:</label>
                <input type="password" name="password" value="">
                <button name="login">Log-In</button>
            </form>
            <router-link to="/">Home</router-link>
            <router-link to="/stat">Statistics</router-link>
            <router-link to="/contact">Contact</router-link>
            ';