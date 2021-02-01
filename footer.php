                </div>
                <footer class="site-footer <?php if(is_front_page()): echo 'home'; endif; ?>">
                    <div class="site-footer-content">
                        &copy; <?php echo esc_html( date_i18n( __( 'Y', 'cltv8' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                        &nbsp;&nbsp;/&nbsp;&nbsp;
                        <a href="mailto:jenny.schuler@gmail.com">Designed by Jenny Schuler</a>
                    </div>
                </footer>
            </div>
        <?php wp_footer(); ?>
    </body>
</html>
