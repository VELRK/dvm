-- Blog SEO & FAQ Migration
-- Run this once to add new columns to the blogs table

ALTER TABLE blogs
  ADD COLUMN IF NOT EXISTS meta_title VARCHAR(255) NULL,
  ADD COLUMN IF NOT EXISTS meta_description TEXT NULL,
  ADD COLUMN IF NOT EXISTS meta_keywords TEXT NULL,
  ADD COLUMN IF NOT EXISTS cover_image_alt VARCHAR(255) NULL,
  ADD COLUMN IF NOT EXISTS faq_data LONGTEXT NULL;
