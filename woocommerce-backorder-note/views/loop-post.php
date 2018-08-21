<div class="post">
    <!-- Start Post -->
    <div class="post-content">
        <div class="float-left" id="profile-picture">
            <?php $user_id = get_the_author_meta('ID');
            $profile_img = get_user_meta($user_id, '_profile_pic', true); ?>
            <a href="<?php echo esc_url(get_home_url() . '/u/' . get_the_author_meta('user_nicename') ); ?>"><img id="user-pp" src="<?php echo $profile_img; ?>" id="user-img"/></a>
        </div>
        <div class="float-left" id="post-cred">
            <div class="float-left">
                <p id="username">
                    <strong><a href="<?php echo esc_url(get_home_url() . '/u/' . get_the_author_meta('user_nicename') ); ?>"><?php echo the_author_meta( 'first_name' ); ?> <?php echo the_author_meta( 'last_name' ); ?></a></strong>
                    <?php online_status_post_loop(); ?>
                </p>
            </div>
            <div class="float-right" id="post-dd">
                <button class="toggle"><i class="fa fa-ellipsis-v"></i></button>
                <ul class="remove-bullets" id="post-options">
                    <li>
                        <?php global $post;
                        $post_id = $post->ID;
                        global $current_user;
                        $user_id = $current_user->ID;
                        $saved_by = get_post_meta($post_id, '_post_saved_by', false);
                        foreach($saved_by as $saved_user_id){
                            $saved_user_id = $saved_user_id;
                        }
                        if(!$user_id == $saved_user_id){ ?>
                            <form name="save_post" method="POST">
                                <button type="submit" name="save_post_<?php echo $post_id; ?>">Save</button>
                            </form>
                        <?php } else { ?>
                            <form name="unsave_post" method="POST">
                                <button type="submit" name="unsave_post_<?php echo $post_id; ?>">Unsave</button>
                            </form>
                        <?php } ?>
                    </li>
                    <li>
                        <button class="toggle">Report</button>
                    </li>
                </ul>
            </div>
            <div class="float-right">
                <p><span id="timestamp"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span></p>
            </div>
            <div class="clearfix"></div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p id="contents"><?php echo wp_trim_words(get_the_content(), 24, '...'); ?></p>
            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
    </div>
    <div class="attachment">
        <!-- Post attachment to go here -->
    </div>
    <div class="interactions">
        <div class="float-left" id="post-views">
            <p>
                <i class="fa fa-eye"></i>
                <?php $post_id = get_the_ID();
                $views = get_post_meta($post_id, '_post_views', true);
                if(!$views){
                    echo '0';
                } else {
                    echo $views;
                } ?>
            </p>
        </div>
        <div class="float-right" id="share">
            <a href="#"><i class="fa fa-share"></i></a>
        </div>
        <div class="float-right" id="comment">
            <p><a href="<?php the_permalink(); ?>"><i class="fa fa-comment-o"></i><?php echo get_comments_number(); ?></a></p>
        </div>
        <div class="float-right" id="like">
            <?php post_likes(); ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- End Post -->
    <!-- Post Comments -->
    <?php /*<div class="post-comment">
        <div class="float-left profile-pic">
            <img src="<?php $user = wp_get_current_user(); echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
        </div>
        <div class="float-left" id="leave-comment">
            <?php post_comments(); ?>
        </div>
        <div class="clearfix"></div>
    </div> */ ?>
    <!-- End Post Comments -->
</div>
