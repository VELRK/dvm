<section class="flat-title-page" style="background-image: url(<?php echo base_url('assets/images/page-title/blog.jpg'); ?>);">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>" class="text-white">Home</a></li>                            
                            <li class="text-white">/ Blogs</li>
                        </ul>
                        <h4 class="text-center text-white title"><?php echo $post['title']; ?></h4>
                    </div>
                </div>
            </section>

<section class="flat-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="flat-blog-detail">
                                <div class="mb-30 pb-30 line-b">
                                        <h3 class="title fw-8"><?php echo $post['title']; ?></h3>
                                            </h3>
                                    <ul class="meta-blog">
                                        <li class="item">
                                            <svg class="icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.9883 12.4831C11.5225 11.8664 10.9198 11.3662 10.2278 11.022C9.53575 10.6779 8.77324 10.4991 8.00033 10.4998C7.22743 10.4991 6.46492 10.6779 5.77288 11.022C5.08084 11.3662 4.47816 11.8664 4.01233 12.4831M11.9883 12.4831C12.8973 11.6746 13.5384 10.6088 13.8278 9.4272C14.1172 8.24555 14.0405 7.00386 13.608 5.86679C13.1754 4.72972 12.4075 3.75099 11.4059 3.0604C10.4044 2.36982 9.21656 2 8 2C6.78344 2 5.59562 2.36982 4.59407 3.0604C3.59252 3.75099 2.82455 4.72972 2.39202 5.86679C1.95949 7.00386 1.88284 8.24555 2.17221 9.4272C2.46159 10.6088 3.10333 11.6746 4.01233 12.4831M11.9883 12.4831C10.891 13.4619 9.47075 14.0019 8.00033 13.9998C6.52969 14.0021 5.10983 13.4621 4.01233 12.4831M10.0003 6.4998C10.0003 7.03024 9.78962 7.53894 9.41455 7.91402C9.03948 8.28909 8.53077 8.4998 8.00033 8.4998C7.4699 8.4998 6.96119 8.28909 6.58612 7.91402C6.21105 7.53894 6.00033 7.03024 6.00033 6.4998C6.00033 5.96937 6.21105 5.46066 6.58612 5.08559C6.96119 4.71052 7.4699 4.4998 8.00033 4.4998C8.53077 4.4998 9.03948 4.71052 9.41455 5.08559C9.78962 5.46066 10.0003 5.96937 10.0003 6.4998Z"
                                                    stroke="#A3ABB0" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="text-primary fw-6"><?php echo $post['authorName']; ?></span>
                                        </li>
                                        <li class="item">
                                            <svg class="icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.5 8.5V8C1.5 7.60218 1.65804 7.22064 1.93934 6.93934C2.22064 6.65804 2.60218 6.5 3 6.5H13C13.3978 6.5 13.7794 6.65804 14.0607 6.93934C14.342 7.22064 14.5 7.60218 14.5 8V8.5M8.70667 4.20667L7.29333 2.79333C7.20048 2.70037 7.09022 2.62661 6.96886 2.57628C6.84749 2.52595 6.71739 2.50003 6.586 2.5H3C2.60218 2.5 2.22064 2.65804 1.93934 2.93934C1.65804 3.22064 1.5 3.60218 1.5 4V12C1.5 12.3978 1.65804 12.7794 1.93934 13.0607C2.22064 13.342 2.60218 13.5 3 13.5H13C13.3978 13.5 13.7794 13.342 14.0607 13.0607C14.342 12.7794 14.5 12.3978 14.5 12V6C14.5 5.60218 14.342 5.22064 14.0607 4.93934C13.7794 4.65804 13.3978 4.5 13 4.5H9.414C9.14887 4.49977 8.89402 4.39426 8.70667 4.20667Z"
                                                    stroke="#A3ABB0" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="text-primary fw-6"><?php echo $post['category']; ?></span>

                                        </li>
                                      >
                                        <li class="item">
                                            <svg class="icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.5 2V3.5M11.5 2V3.5M2 12.5V5C2 4.60218 2.15804 4.22064 2.43934 3.93934C2.72064 3.65804 3.10218 3.5 3.5 3.5H12.5C12.8978 3.5 13.2794 3.65804 13.5607 3.93934C13.842 4.22064 14 4.60218 14 5V12.5M2 12.5C2 12.8978 2.15804 13.2794 2.43934 13.5607C2.72064 13.842 3.10218 14 3.5 14H12.5C12.8978 14 13.2794 13.842 13.5607 13.5607C13.842 13.2794 14 12.8978 14 12.5M2 12.5V7.5C2 7.10218 2.15804 6.72064 2.43934 6.43934C2.72064 6.15804 3.10218 6 3.5 6H12.5C12.8978 6 13.2794 6.15804 13.5607 6.43934C13.842 6.72064 14 7.10218 14 7.5V12.5"
                                                    stroke="#A3ABB0" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="text-variant-1"><?php echo date('F d, Y', strtotime($post['publishedDate'])); ?></span>
                                        </li>

                                    </ul>
                                </div>

                                <div class="pb-30 line-b">
                                    <p class="text-black-2 fw-6"><?php echo $post['shortDescription']; ?></p>
                                  
                                    <div class="my-30 round-30 o-hidden">
                                        <?php 
                                        $coverImage = !empty($post['coverImageUrl']) ? $post['coverImageUrl'] : '';
                                        // If image path doesn't start with http:// or https://, add base_url
                                        if (!empty($coverImage) && !preg_match('/^https?:\/\//', $coverImage)) {
                                            $coverImage = base_url($coverImage);
                                        }
                                        ?>
                                        <img class="lazyload w-100" data-src="<?php echo htmlspecialchars($coverImage); ?>"
                                            src="<?php echo htmlspecialchars($coverImage); ?>" alt="img-blog">
                                    </div>
                                    <p class="mb-20"><?php echo $post['content']; ?></p>
                                 
                            </div>
                            <?php if(!empty($post['imageUrls']) && is_array($post['imageUrls']) && count($post['imageUrls']) > 0): ?>
                            <div class="box-image grid-2 gap-20 mb-20">
                                        <?php foreach($post['imageUrls'] as $index => $imageUrl): ?>
                                        <?php 
                                        // Skip the first image if it's the same as coverImageUrl
                                        if ($index === 0 && !empty($post['coverImageUrl']) && $imageUrl === $post['coverImageUrl']) {
                                            continue;
                                        }
                                        // Only show first 2 gallery images (excluding cover)
                                        if ($index >= 3) break;
                                        
                                        // If image path doesn't start with http:// or https://, add base_url
                                        if (!empty($imageUrl) && !preg_match('/^https?:\/\//', $imageUrl)) {
                                            $imageUrl = base_url($imageUrl);
                                        }
                                        ?>
                                        <div class="overflow-hidden round-30">
                                            <img class="w-100" style="width: 100%; height: 250px; object-fit: cover;" src="<?php echo htmlspecialchars($imageUrl); ?>" alt="imag-blog">
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                            <?php endif; ?>
                        </div>
                       
                    </div>
                </div>
            </section>