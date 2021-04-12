<?php $homeId = get_option('page_on_front'); ?>

<ul class="c-list-contacts">
    <li>
        <span><?php the_field('contact__address', $homeId); ?></span>
    </li>

    <li>
        <div class="c-list-contacts__title">
            email
        </div>

        <?php foreach(get_field('contact__emails', $homeId) as $email): ?>
            <a href="mailto:<?php echo $email['email']; ?>">
                <?php echo $email['email']; ?>
            </a>
        <?php endforeach; ?>
    </li>

    <li>
        <div class="c-list-contacts__title">
            <?php pll_e('Phone'); ?>
        </div>

        <?php foreach(get_field('contact__phones', $homeId) as $phone): ?>
            <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone['phone']); ?>">
                <?php echo $phone['phone']; ?>
            </a>
        <?php endforeach; ?>
    </li>
</ul>