<?php

/**
 * content list post 
 * 
 */
?>

<?php
$post_id = get_the_ID();
$post_title = get_the_title();
$post_link = get_the_permalink();
$post_date = get_the_date('Y-m-d');
$post_author = get_the_author();
$post_author_link = get_author_posts_url(get_the_author_meta('ID'));
$post_comments = get_comments_number();
$post_comments_link = get_comments_link();
$post_excerpt = get_the_excerpt();
$post_thumbnail = get_the_post_thumbnail_url();
$post_categories = get_the_category();
$post_tags = get_the_tags();
?>
<div class="col-lg-4 col-sm-6 col-xs-6 col-12">
    <div class="post-item shadow h-100 p-3 rounded-3">
        <div class="post-item__thumbnail img-thumbnail  border-none p-0">
            <a class="d-block" href="<?php echo $post_link; ?>">
                <img class="d-block w-auto mw-100" src="<?php echo $post_thumbnail; ?>" alt="<?php echo $post_title; ?>">
            </a>
        </div>
        <div class="post-item__content">
            <div class="post-item__content__title mb-2">
                <a class="text-decoration-none text-body" href="<?php echo $post_link; ?>">
                    <h3><?php echo $post_title; ?></h3>
                </a>
            </div>
            <div class="post-item__content__meta mb-3">
                <div class="row">
                    <div class="col">
                        <div class="post-item__content__meta__date">
                            <i class="fa-calendar-alt fas fa me-1"></i>
                            <span><?php echo $post_date; ?></span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="post-item__content__meta__author">
                            <i class="fas fa fa-user me-1"></i>
                            <span>
                                <a class="text-decoration-none text-body" href="<?php echo $post_author_link; ?>"><?php echo $post_author; ?></a>
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="post-item__content__meta__comments">
                            <i class="fas fa fa-comments me-1"></i>
                            <span>
                                <a class="text-decoration-none text-body" href="<?php echo $post_comments_link; ?>"><?php echo $post_comments; ?></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post-item__content__excerpt mb-3">
                <?php echo $post_excerpt; ?>
            </div>
            <div class="post-item__content__read-more">
                <a class="btn btn-sm btn-dark p-5 pt-2 pb-2" href="<?php echo $post_link; ?>">Read more</a>
            </div>
        </div>
    </div>
</div>