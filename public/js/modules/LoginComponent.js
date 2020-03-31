export default {
    template: `
        <div id="signin">

            <div class="avatar"><i class="fas fa-user fa-7x" style="color:#4ac6d7;"></i></div>

            <h2 class="signintitle">Sign in to your account</h2>

            <h3 class="errorText"><?php echo !empty($message)? $message:'';?></h3>

            <form v-on:submit.prevent id="signinform" action="index.php" method="post">
                <label class="hidden">Username</label>
                <input name="username" type="text" value="" placeholder="Username">
                <label class="hidden">Password</label>
                <input name="password" type="password" value="" placeholder="Password">

                <button class="button" name="submit" type="submit"> <span class="buttonTxt">Sign In</span> </button>
            </form>
        </div>

    `}