<?php theme_include('header') ?>

  <section class="content wrap" id="article-<?php echo article_id() ?>">
    <article>
      <div class="content articlewrap">
        <?php echo article_markdown() ?>
      </div>
    </article>

    <section class="footnote">
      <!-- Unfortunately, CSS means everything's got to be inline. -->
      <p>This article is my <?php echo numeral(article_number(article_id()), true) ?> oldest. It is <?php echo count_words(article_markdown()) ?> words long<?php if(comments_open()): ?>, and it’s got <?php echo total_comments() . pluralise(total_comments(), ' comment') ?> for now.<?php endif ?> <?php echo article_custom_field('attribution') ?></p>
    </section>
  </section>

  <?php if(comments_open()): ?>
  <div class="wrap">
    <section class="comments">

      <?php if(has_comments()): ?>
      <ul class="commentlist">
        <?php $i = 0; while(comments()): $i++; ?>
        <li class="comment" id="comment-<?php echo comment_id() ?>">
          <h2><?php echo comment_name() ?></h2>
          <time><?php echo relative_time(comment_time()) ?></time>

          <div class="content">
            <?php echo htmlspecialchars(comment_text()) ?>
          </div>
        </li>
        <?php endwhile ?>
      </ul>
      <?php endif ?>

      <form id="comment" class="commentform" method="post" action="<?php echo comment_form_url() ?>#comment">
        <?php echo comment_form_notifications() ?>

        <p class="name">
          <label for="name">Your name:</label>
          <?php echo comment_form_input_name('placeholder="Your name"') ?>
        </p>

        <p class="email">
          <label for="email">Your email address:</label>
          <?php echo comment_form_input_email('placeholder="Your email (won’t be published)"') ?>
        </p>

        <p class="textarea">
          <label for="text">Your comment:</label>
          <?php echo comment_form_input_text('placeholder="Your comment"') ?>
        </p>

        <p class="submit">
          <?php echo comment_form_button() ?>
        </p>
      </form>

    </section>
  </div>
  <?php endif ?>

<?php theme_include('footer') ?>
