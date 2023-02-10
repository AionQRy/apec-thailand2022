<?php
/**
* Template Name: Login
*
*/
header_fuc();
?>
<?php
if(is_user_logged_in()){
    $success = 'คุณได้เข้าสู่ระบบแล้ว';
    ?>
      <script type="text/javascript">
        window.location ='/';
      </script>
        <?php
}
 ?>
 <div class="page-login" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/new-customize/img/background-register.png');">
     <div class="s-container">
        <div class="box-login">
            <div class="main-object">
                <div class="object-login">
                    <div class="main-login">                 
                        <div class="container-login">
                            <div class="title-l">
                                <h2><?php esc_html_e( 'Welcome to APEC 2022 Thailand', 'apex' ); ?></h2>
                            </div>
                            <div class="title-ls">
                                <h3><?php esc_html_e( 'Login to your account below', 'apex' ); ?></h3>                           
                            </div>
                            <div class="box-form">
                                <form action="" id="form-login" class="form-m form-login" method="POST">
                                    <div class="box-input">
                                        <div class="input-field">
                                            <label for="username"><?php esc_html_e( 'Email', 'apex' ); ?></label>
                                            <input type="text" name="username" id="username" placeholder="example@apex.com" required>                                        
                                        </div>
                                        <div class="input-field">
                                            <label for="password"><?php esc_html_e( 'Password', 'apex' ); ?></label>
                                            <input type="password" name="password" id="password" placeholder="password" required>                                        
                                        </div>                                  
                                    </div>
                                    <div class="input-field input-check">
                                            <div class="check-log">
                                                <input class="styled-checkbox" id="remembercheck" type="checkbox" name="remembercheck">
                                                <label for="remembercheck"><?php esc_html_e( 'Remember me', 'apex' ); ?></label>
                                            </div>
                                            <div class="forget-link">
                                                <a href="<?php echo get_home_url(); ?>/forget-password/" class="forget-password"><?php esc_html_e( 'Forgot Password?', 'apex' ); ?></a>
                                            </div>
                                    </div>
                                    <div class="box-button">
                                        <input type="hidden" name="hidden-log">
                                        <input type="hidden" name="check-login" value="passed">
                                        <button type="submit" id="btn-login" class="btn-login btn-g"><?php esc_html_e( 'Sign in', 'apex' ); ?></button>
                                    </div>     
                                    <div class="register-field">
                                        <p><?php esc_html_e( 'Do not have an account yet ?', 'apex' ); ?><a href="<?php echo get_home_url(); ?>/register/"><?php esc_html_e( 'Join Now', 'apex' ); ?></a></p>
                                    </div>     
                                    <div class="bar-status"><p class="status"></p></div>                     
                                </form>
                            </div>
                        </div>
                        <div class="logo-login">
                            <div class="logo-white">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/new-customize/img/logo-white.png" alt="">
                                <p><?php esc_html_e( 'OPEN to all opportunities. CONNECT in all dimensions. BALANCE in all aspects.', 'apex' ); ?></p>
                            </div>                           
                        </div>    
                    </div>           
                </div>
            </div>
        </div>
     </div>
</div>
<?php
?>
<?php footer_fuc(); ?>
