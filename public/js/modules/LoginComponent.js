export default {
    template: `
        <div>
            <div id="signin">
                <div class="signin-con">
                    <h2>Sign in to your account</h2>
                    <h2>YOO</h2>

                    <h3><?php echo !empty($message)? $message:'';?></h3>

                    <form v-on:submit.prevent id="signinform" action="index.php" method="post">
                        <label class="hidden">Username</label>
                        <input name="username" type="text" value="" placeholder="Username">
                        <label class="hidden">Password</label>
                        <input name="password" type="password" value="" placeholder="Password">

                        <button class="button" name="submit" type="submit"> <span class="buttonTxt">Sign In</span> </button>
                    </form>
                </div>
            </div>
        </div>
    `,
    data: function() {
        return {
            hello: 1,
        }
    }
}