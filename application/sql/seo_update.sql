-- ============================================================
-- STEP 1: Add SEO columns to properties table
-- Run this once on your Hostinger database
-- ============================================================
ALTER TABLE `properties`
    ADD COLUMN `meta_title`       VARCHAR(70)  NULL DEFAULT NULL AFTER `slug`,
    ADD COLUMN `meta_description` VARCHAR(170) NULL DEFAULT NULL AFTER `meta_title`,
    ADD COLUMN `meta_keywords`    VARCHAR(500) NULL DEFAULT NULL AFTER `meta_description`;


-- ============================================================
-- STEP 2: Update static pages SEO in seo_settings table
-- Adjust the WHERE clause if your page_key names differ
-- ============================================================

-- Home page
UPDATE `seo_settings` SET
    `meta_title`       = 'plots sale in coimbatore Premium Plots in Prime Areas Sale!!',
    `meta_description` = 'plots sale in coimbatore Find quality plots with clear titles and trusted developers, ideal for building your home or making a smart investment in Coimbatore!!',
    `meta_keywords`    = 'plots sale in coimbatore, land for sale in coimbatore, buy land in coimbatore',
    `status`           = 1
WHERE `page_key` = 'home';

-- About page
UPDATE `seo_settings` SET
    `meta_title`       = 'real estate agency in coimbatore | Dream Villa Makers India!',
    `meta_description` = 'real estate agency in coimbatore, Dream Villa Makers brings trusted expertise, quality homes, and honest guidance to help you find the perfect property today!!!',
    `meta_keywords`    = 'real estate agency in coimbatore, dream villa makers coimbatore, trusted real estate builders coimbatore',
    `status`           = 1
WHERE `page_key` = 'about';

-- Our Projects / Listing page
UPDATE `seo_settings` SET
    `meta_title`       = 'buy plots in coimbatore | premium villa projects guide 2026!',
    `meta_description` = 'buy plots in coimbatore to discover trusted villa plot projects in prime locations, with clear titles, great amenities, and real value for smart buyers today.!!',
    `meta_keywords`    = 'buy plots in coimbatore, real estate projects coimbatore, villa plots projects coimbatore',
    `status`           = 1
WHERE `page_key` IN ('listing', 'our-projects', 'projects');

-- Contact page
UPDATE `seo_settings` SET
    `meta_title`       = 'dream villa makers contact coimbatore | Trusted Local Expert',
    `meta_description` = 'dream villa makers contact coimbatore connect with our expert team for genuine property guidance, site visits, and quick responses you can trust in Coimbatore.',
    `meta_keywords`    = 'dream villa makers contact coimbatore, real estate contact coimbatore, property dealers contact coimbatore',
    `status`           = 1
WHERE `page_key` = 'contact';

-- Blog page
UPDATE `seo_settings` SET
    `meta_title`       = 'real estate blog coimbatore - Property Tips & Plot Buying!!!',
    `meta_description` = 'real estate blog coimbatore explore property investment tips, local insights, and a clear guide to buying plots in Coimbatore with expert advice you can trust.',
    `meta_keywords`    = 'real estate blog coimbatore, property investment tips coimbatore, buy plots guide coimbatore',
    `status`           = 1
WHERE `page_key` = 'blog';


-- ============================================================
-- STEP 3: Per-property SEO — update by slug
-- ============================================================

UPDATE `properties` SET
    `meta_title`       = 'urban nest land sale in Narasimhanaickenpalayam, Coimbatore!',
    `meta_description` = 'urban nest land sale in Narasimhanaickenpalayam, Coimbatore Explore plots with clear titles, good access, and a calm setting ideal perfect for your future home',
    `meta_keywords`    = 'urban nest land sale in Narasimhanaickenpalayam, Coimbatore, urban nest residential plots sale in Narasimhanaickenpalayam, coimbatore'
WHERE `slug` = 'urban-nest-narasimhanaickenpalayam';

UPDATE `properties` SET
    `meta_title`       = 'supreme happy nest plots in kunnathur, coimbatore – Buy Now!',
    `meta_description` = 'supreme happy nest plots in kunnathur, coimbatore offers premium villa plots in a growing area with clear titles and peaceful surroundings for families. today!!',
    `meta_keywords`    = 'supreme happy nest plots in kunnathur, coimbatore, supreme happy nest villa plots kunnathur, coimbatore, supreme happy nest land for sale kunnathur, coimbatore'
WHERE `slug` = 'supreme-happy-nest-kunnathur';

UPDATE `properties` SET
    `meta_title`       = 'supreme garden plots sale ponnegounden in pudur, coimbatore',
    `meta_description` = 'supreme garden plots sale ponnegounden in pudur, coimbatore Explore phase 2 plots with clear titles, prime location, and strong next value for smart buyers.',
    `meta_keywords`    = 'supreme garden plots sale ponnegounden in pudur, coimbatore, supreme garden phase 2 land investment ponnegounden in pudur coimbatore'
WHERE `slug` = 'supreme-garden-phase-ponnegounden-pudur';

UPDATE `properties` SET
    `meta_title`       = 'royal village residential plots in ganeshpuram coimbatore!',
    `meta_description` = 'royal village residential plots in ganeshpuram coimbatore offers gated plots with clear titles and easy access to Coimbatore city ideal for your home today!!!',
    `meta_keywords`    = 'royal village residential plots in ganeshpuram coimbatore, royal village premium plots ganeshpuram coimbatore, gated community land sale ganeshpuram, coimbatore'
WHERE `slug` = 'royal-village-ponnegounden-pudur';

UPDATE `properties` SET
    `meta_title`       = 'indra nagar plots in Kunnathur, coimbatore premium plot sale',
    `meta_description` = 'indra nagar plots in Kunnathur, coimbatore offering quality residential land in Kunnathur with clear titles, good roads, and a peaceful area ideal for families.',
    `meta_keywords`    = 'indra nagar plots in Kunnathur, coimbatore, indra nagar residential land Kunnathur, coimbatore, indra nagar budget plots Kunnathur, coimbatore'
WHERE `slug` = 'indra-nagar-kunnathur';

UPDATE `properties` SET
    `meta_title`       = 'velan dream city plots in Annur,coimbatore | DTCP Layout',
    `meta_description` = 'velan dream city plots in Annur,coimbatore offers DTCP approved plots in a fast-growing residential area near Annur with easy access and great value',
    `meta_keywords`    = 'velan dream city plots in Annur,coimbatore, velan dream city villa plots Annur, coimbatore'
WHERE `slug` = 'velan-dream-city-annur';

UPDATE `properties` SET
    `meta_title`       = 'vetrivel avenue plots in Kovilpalayam, coimbatore best deals',
    `meta_description` = 'vetrivel avenue plots in Kovilpalayam, coimbatore explore gated plots with growth potential and easy access schools highways and daily needs in a peaceful area.',
    `meta_keywords`    = 'vetrivel avenue plots in Kovilpalayam, coimbatore, vetrivel avenue gated plots Kovilpalayam, coimbatore, vetrivel avenue land for sale Kovilpalayam, coimbatore'
WHERE `slug` = 'vetrivel-avenue-kovilpalayam';

UPDATE `properties` SET
    `meta_title`       = 'gem field plots in Kovilpalayam, coimbatore best plots DTCP!',
    `meta_description` = 'gem field plots in Kovilpalayam, coimbatore explore residential land with roads, water access, and strong growth near Coimbatore city. Book a site visit today.!',
    `meta_keywords`    = 'gem field plots in Kovilpalayam, coimbatore, gem field residential plots Kovilpalayam, coimbatore'
WHERE `slug` = 'gem-field-kovilpalayam';

UPDATE `properties` SET
    `meta_title`       = 'vinayaka garden plots in Kunnathur, coimbatore | Best Deals!',
    `meta_description` = 'vinayaka garden plots in Kunnathur, coimbatore explore budget plots with good roads, calm area, and easy access, perfect for your home or a property investment.',
    `meta_keywords`    = 'vinayaka garden plots in Kunnathur, coimbatore, vinayaka garden budget plots Kunnathur, coimbatore, vinayaka garden residential land Kunnathur, coimbatore'
WHERE `slug` = 'vinayaka-garden-kunnathur';

UPDATE `properties` SET
    `meta_title`       = 'subiksham grande plots in Kurumbapalayam, coimbatore for sale',
    `meta_description` = 'subiksham grande plots in Kurumbapalayam, coimbatore Explore gated plots with roads, parks, and easy access to schools, shops, and transport in a growing area.!',
    `meta_keywords`    = 'subiksham grande plots in Kurumbapalayam, coimbatore, gated community plots sale in Kurumbapalayam, coimbatore'
WHERE `slug` = 'subiksham-grande-kurumbapalayam';

UPDATE `properties` SET
    `meta_title`       = 'grand town plots in Thennampalayam, coimbatore | Best Plots!',
    `meta_description` = 'grand town plots in Thennampalayam, coimbatore Explore residential plots with easy access calm surroundings and promising growth in a trusted Coimbatore area.',
    `meta_keywords`    = 'grand town plots in Thennampalayam, coimbatore, grand town township plots Thennampalayam, coimbatore, grand town residential land Thennampalayam, coimbatore'
WHERE `slug` = 'grand-town-thennampalayam';

UPDATE `properties` SET
    `meta_title`       = 'royal castle plots in Kovilpalayam, coimbatore premium plots',
    `meta_description` = 'royal castle plots in Kovilpalayam, coimbatore discover well planned villa plots with wide roads calm surroundings, and easy access to schools and the city now',
    `meta_keywords`    = 'royal castle plots in Kovilpalayam, coimbatore, royal castle villa plots Kovilpalayam, coimbatore, royal castle premium plots Kovilpalayam, coimbatore'
WHERE `slug` = 'royal-castle-kovilpalayam';

UPDATE `properties` SET
    `meta_title`       = 'aishwaryam grande plots in Ganeshpuram, coimbatore | Premium',
    `meta_description` = 'aishwaryam grande plots in Ganeshpuram, coimbatore Explore well-planned plots with peaceful surroundings connectivity & value for dream home or investment ideal',
    `meta_keywords`    = 'aishwaryam grande plots in Ganeshpuram, coimbatore, aishwaryam grande premium land Ganeshpuram, coimbatore, aishwaryam grande residential plots Ganeshpuram, coimbatore'
WHERE `slug` = 'aishwaryam-grande-ganeshpuram';

UPDATE `properties` SET
    `meta_title`       = 'olympus garden plots in Annur, coimbatore premium DTCP plots',
    `meta_description` = 'olympus garden plots in Annur, coimbatore Explore residential plots with good roads, amenities, and a peaceful spot near Coimbatore, ideal for your dream home..',
    `meta_keywords`    = 'olympus garden plots in Annur, coimbatore, olympus garden residential land Annur, coimbatore'
WHERE `slug` = 'olympus-garden-annur';

UPDATE `properties` SET
    `meta_title`       = 'royal gateway plots in Kariyampalayam, coimbatore Best Plots',
    `meta_description` = 'royal gateway plots in Kariyampalayam, coimbatore Discover a gated community in a prime location with strong growth and great value. Book your visit today now!',
    `meta_keywords`    = 'royal gateway plots in Kariyampalayam, coimbatore, royal gateway gated community plots Kariyampalayam, coimbatore, royal gateway land for sale Kariyampalayam, coimbatore'
WHERE `slug` = 'royal-gateway-kariyampalayam';
