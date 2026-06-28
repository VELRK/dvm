<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$recent_posts = isset($recent_posts) && is_array($recent_posts) ? $recent_posts : array();
$rawAuthor = isset($post['authorName']) ? trim((string) $post['authorName']) : '';
if ($rawAuthor === '' && isset($post['author'])) {
    $rawAuthor = trim((string) $post['author']);
}
$showAuthor = ($rawAuthor !== '' && strcasecmp($rawAuthor, 'Admin') !== 0);
$category = isset($post['category']) ? trim((string) $post['category']) : '';
$published = !empty($post['publishedDate']) ? date('F j, Y', strtotime($post['publishedDate'])) : '';

// FAQ data
$faqItems = array();
if (!empty($post['faq_data'])) {
    $decoded = json_decode($post['faq_data'], true);
    if (is_array($decoded)) {
        foreach ($decoded as $item) {
            if (!empty($item['question']) && !empty($item['answer'])) {
                $faqItems[] = $item;
            }
        }
    }
}

// Cover image alt text
$coverAlt = !empty($post['cover_image_alt']) ? $post['cover_image_alt'] : $post['title'];
?>

<?php if (!empty($faqItems)): ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    <?php foreach ($faqItems as $i => $faq): ?>
    {
      "@type": "Question",
      "name": <?php echo json_encode(strip_tags($faq['question'])); ?>,
      "acceptedAnswer": {
        "@type": "Answer",
        "text": <?php echo json_encode(strip_tags($faq['answer'])); ?>
      }
    }<?php echo ($i < count($faqItems) - 1) ? ',' : ''; ?>
    <?php endforeach; ?>
  ]
}
</script>
<?php endif; ?>

<section class="flat-title-page flat-title-page--blog blog-single-hero">
    <div class="container">
        <div class="breadcrumb-content">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>" class="text-white">Home</a></li>
                <li class="text-white">/</li>
                <li><a href="<?php echo base_url('blog'); ?>" class="text-white">Blog</a></li>
                <li class="text-white">/</li>
                <li class="text-white text-truncate breadcrumb-article-truncate">Article</li>
            </ul>
            <h1 class="text-center text-white title blog-hero-title"><?php echo htmlspecialchars($post['title']); ?></h1>
        </div>
    </div>
</section>

<section class="flat-section blog-single-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="<?php echo !empty($recent_posts) ? 'col-lg-8' : 'col-lg-10 col-xl-8'; ?>">
                <article class="blog-article-card" itemscope itemtype="https://schema.org/BlogPosting">
                    <meta itemprop="headline" content="<?php echo htmlspecialchars($post['title']); ?>">
                    <?php if (!empty($post['publishedDate'])): ?>
                    <meta itemprop="datePublished" content="<?php echo date('c', strtotime($post['publishedDate'])); ?>">
                    <?php endif; ?>

                    <div class="blog-article-inner">
                    <div class="blog-meta-pills">
                        <?php if ($published !== ''): ?>
                        <span class="pill">
                            <svg width="14" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M4.5 2V3.5M11.5 2V3.5M2 12.5V5C2 4.60218 2.15804 4.22064 2.43934 3.93934C2.72064 3.65804 3.10218 3.5 3.5 3.5H12.5C12.8978 3.5 13.2794 3.65804 13.5607 3.93934C13.842 4.22064 14 4.60218 14 5V12.5" stroke="currentColor" stroke-linecap="round" stroke-width="1.2"/></svg>
                            <?php echo htmlspecialchars($published); ?>
                        </span>
                        <?php endif; ?>
                        <?php if ($category !== ''): ?>
                        <span class="pill pill--accent"><?php echo htmlspecialchars($category); ?></span>
                        <?php endif; ?>
                        <?php if ($showAuthor): ?>
                        <span class="pill">
                            <svg width="14" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M8 8C9.65685 8 11 6.65685 11 5C11 3.34315 9.65685 2 8 2C6.34315 2 5 3.34315 5 5C5 6.65685 6.34315 8 8 8Z" stroke="currentColor" stroke-width="1.2"/><path d="M2.5 14.5C2.5 11.7386 4.73858 9.5 7.5 9.5H8.5C11.2614 9.5 13.5 11.7386 13.5 14.5" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/></svg>
                            <?php echo htmlspecialchars($rawAuthor); ?>
                        </span>
                        <?php endif; ?>
                    </div>

                    <?php
                    $coverImage = !empty($post['coverImageUrl']) ? $post['coverImageUrl'] : '';
                    if (!empty($coverImage) && !preg_match('/^https?:\/\//', $coverImage)) {
                        $coverImage = base_url($coverImage);
                    }
                    ?>
                    <?php if (!empty($coverImage)): ?>
                    <div class="blog-featured-wrap">
                        <img class="lazyload" data-src="<?php echo htmlspecialchars($coverImage); ?>"
                            src="<?php echo htmlspecialchars($coverImage); ?>"
                            alt="<?php echo htmlspecialchars($coverAlt); ?>"
                            itemprop="image">
                    </div>
                    <?php endif; ?>

                    <div class="blog-post-content entry-content" itemprop="articleBody"><?php echo $post['content']; ?></div>

                    <?php if (!empty($post['imageUrls']) && is_array($post['imageUrls']) && count($post['imageUrls']) > 0): ?>
                    <div class="blog-gallery-grid">
                        <?php foreach ($post['imageUrls'] as $index => $imageUrl): ?>
                            <?php
                            if ($index === 0 && !empty($post['coverImageUrl']) && $imageUrl === $post['coverImageUrl']) {
                                continue;
                            }
                            if ($index >= 3) {
                                break;
                            }
                            if (!empty($imageUrl) && !preg_match('/^https?:\/\//', $imageUrl)) {
                                $imageUrl = base_url($imageUrl);
                            }
                            ?>
                        <div class="g-item">
                            <img src="<?php echo htmlspecialchars($imageUrl); ?>"
                                 alt="<?php echo htmlspecialchars($post['title']); ?> — gallery image <?php echo $index + 1; ?>">
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($faqItems)): ?>
                    <div class="blog-faq-section">
                        <div class="blog-faq-heading">
                            <div class="blog-faq-heading-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10" stroke="#ffffff" fill="none"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" stroke="#ffffff" fill="none"/><line x1="12" y1="17" x2="12.01" y2="17" stroke="#ffffff"/></svg>
                            </div>
                            <h2 class="blog-faq-title">Frequently Asked Questions</h2>
                        </div>
                        <div class="blog-faq-list">
                            <?php foreach ($faqItems as $i => $faq): ?>
                            <div class="blog-faq-item<?php echo $i === 0 ? ' faq-open' : ''; ?>">
                                <button class="blog-faq-question" type="button"
                                        aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                                        aria-controls="faq-answer-<?php echo $i; ?>"
                                        onclick="toggleFaq(this)">
                                    <span><?php echo htmlspecialchars($faq['question']); ?></span>
                                    <span class="faq-toggle-btn" aria-hidden="true">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="#1563df" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="2,4.5 7,9.5 12,4.5"/>
                                        </svg>
                                    </span>
                                </button>
                                <div class="blog-faq-answer" id="faq-answer-<?php echo $i; ?>"
                                     <?php echo $i === 0 ? '' : 'hidden'; ?>>
                                    <div class="faq-answer-inner">
                                        <?php echo nl2br(htmlspecialchars($faq['answer'])); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="blog-back-row">
                        <a href="<?php echo base_url('blog'); ?>" class="tf-btn primary size-1">
                            ← Back to all articles
                        </a>
                    </div>
                    </div><!-- .blog-article-inner -->
                </article>
            </div>

            <?php if (!empty($recent_posts)): ?>
            <div class="col-lg-4 mt-5 mt-lg-0">
                <aside class="blog-sidebar-card" aria-label="Recent articles">
                    <h4>Recent articles</h4>
                    <ul class="blog-sidebar-list">
                        <?php foreach ($recent_posts as $r): ?>
                            <?php
                            $rtitle = isset($r['title']) ? $r['title'] : '';
                            $rdate = !empty($r['publishedDate']) ? date('M j, Y', strtotime($r['publishedDate'])) : '';
                            if (blog_post_slug($r) === '' || $rtitle === '') {
                                continue;
                            }
                            ?>
                        <li>
                            <a href="<?php echo blog_post_url($r); ?>"><?php echo htmlspecialchars($rtitle); ?></a>
                            <?php if ($rdate !== ''): ?><div class="sub"><?php echo htmlspecialchars($rdate); ?></div><?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </aside>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
function toggleFaq(btn) {
    const expanded = btn.getAttribute('aria-expanded') === 'true';
    const answerId = btn.getAttribute('aria-controls');
    const answer = document.getElementById(answerId);
    const item = btn.closest('.blog-faq-item');
    const toggleSvg = btn.querySelector('.faq-toggle-btn svg');

    btn.setAttribute('aria-expanded', String(!expanded));
    if (expanded) {
        answer.setAttribute('hidden', '');
        item.classList.remove('faq-open');
        if (toggleSvg) toggleSvg.setAttribute('stroke', '#1563df');
    } else {
        answer.removeAttribute('hidden');
        item.classList.add('faq-open');
        if (toggleSvg) toggleSvg.setAttribute('stroke', '#ffffff');
    }
}
// Set initial state for first open item
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.blog-faq-item.faq-open .faq-toggle-btn svg').forEach(function(svg) {
        svg.setAttribute('stroke', '#ffffff');
    });
});
</script>
