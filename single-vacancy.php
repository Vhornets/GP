<?php get_header(); ?>

<?php if(have_posts()): the_post(); ?>

<section class="s-news-single-head">
    <img src="<?php echo get_thumbnail_src('full'); ?>" alt="" class="s-news-single-head__image">
</section>

<section class="s-news-single">
    <div class="l-news-single">
        <div class="l-news-single__back">
            <a href="<?php echo get_the_permalink( get_field('page-vacancies', 'options') ); ?>" class="c-news__back">
                < <?php pll_e('back'); ?>
            </a>
        </div>

        <div class="l-news-single__content">
            <h1 class="c-slider-hero-slide__title c-news__title">
                <?php the_field('vacancy__formatted-title'); ?>
            </h1>

            <div class="c-slider-hero-slide__date c-news__date">
                <?php echo get_the_date( 'd F Y' ); ?>
            </div>

            <div class="c-news__content">
                <?php the_content(); ?>
            </div>

            <div class="c-news__form">
                <form class="c-form c-form--dark js-form-validate js-form-submit">
                    <div class="c-form__title">
                        <?php pll_e('Apply for this'); ?>
                        <span><?php pll_e('job'); ?></span>
                    </div>

                    <div class="c-form__group">
                        <input type="text" name="firstName" class="c-form__control" placeholder="<?php pll_e('First Name'); ?>" required>
                    </div>

                    <div class="c-form__group">
                        <input type="text" name="lastName" class="c-form__control" placeholder="<?php pll_e('Last Name'); ?>" required>
                    </div>

                    <div class="c-form__group">
                        <input type="email" name="email" class="c-form__control" placeholder="Email" required>
                    </div>

                    <div class="c-form__group">
                        <input type="tel" name="phone" class="c-form__control" placeholder="<?php pll_e('Phone'); ?>" required>
                    </div>

                    <div class="c-form__group">
                        <div class="c-file-upload__label">
                            <?php pll_e('Resume / CV '); ?>
                        </div>

                        <div class="c-file-upload" data-initial-text="<?php pll_e('Attach'); ?>" data-uploading-text="<?php pll_e('Uploading'); ?>..." data-input-id="file_cv_id">
                            <?php pll_e('Attach'); ?>
                        </div>
                    </div>

                    <div class="c-form__group">
                        <div class="c-file-upload__label">
                            <?php pll_e('Cover Letter '); ?>
                        </div>

                        <div class="c-file-upload" data-initial-text="<?php pll_e('Attach'); ?>" data-uploading-text="<?php pll_e('Uploading'); ?>..." data-input-id="file_letter_id">
                            <?php pll_e('Attach'); ?>
                        </div>
                    </div>

                    <div class="c-form__group">
                        <input type="text" name="linkedin" class="c-form__control" placeholder="Linkedin" required>
                    </div>

                    <div class="c-form__group c-form__group--submit">
                        <button type="submit" disabled class="o-button-default o-button-default--has-arrow-green c-form__submit" data-sending-text="<?php pll_e('Sending'); ?>...">
                            <?php pll_e('Submit application'); ?>
                        </button>
                    </div>

                    <?php wp_nonce_field('send_application'); ?>
                    <input type="hidden" name="action" value="sendApplication">
                    <input type="hidden" name="file_cv_id" id="file_cv_id">
                    <input type="hidden" name="file_letter_id" id="file_letter_id">
                    <input type="hidden" name="vacancy_id" value="<?php the_ID(); ?>">

                    <div class="c-form__response">
                        <div class="c-form__response-text"></div>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</section>

<?php endif; ?>

<?php get_footer(); ?>