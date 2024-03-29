<!-- See header.php for the opening nav bar and <head> tags -->

        <?php include "header.php" ?>

        <!-- INTRO BANNER -->
        <section class="index-intro">
            <div class="index-intro-bg">
                <h1>This is an Instruction</h1>
                <p>This is an important paragraph explaining the purpose of the website</p>
            </div>
        </section>

        <!-- THE LOGIN FORMS -->
        <section class="index-forms">
            <h2>Some Basic Categories</h2>
            <div>
                <!-- Sign up form -->
                <form class="index-forms-signup form" action="includes/signup.inc.php" method="post">
                    <h3>Sign Up</h3>
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <input type="password" name="passwordRepeat" placeholder="Re-enter Password">
                    <input type="text" name="email" placeholder="E-mail">
                    <br>
                    <button type="submit" name="submit">SIGN UP</button>
                </form>
                <!-- Log in form -->
                <form class="index-forms-login form" action="includes/login.inc.php" method="post">
                    <h3>Log in</h3>
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <br>
                    <button type="submit" name="submit">LOG IN</button>
                </form>
            </div>
            
        </section>



        
        <script src="" async defer></script>
    </body>
</html>