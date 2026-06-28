<?php
$existing_gallery = array();
if (!empty($blog->gallery)) {
    $existing_gallery = json_decode($blog->gallery, true);
    if (!is_array($existing_gallery)) {
        $existing_gallery = array();
    }
}
$existing_faq = '[]';
if (!empty($blog->faq_data)) {
    $decoded = json_decode($blog->faq_data, true);
    $existing_faq = (is_array($decoded)) ? $blog->faq_data : '[]';
}
?>
<div class="container-fluid">
    <h2 class="mb-4"><i class="fas fa-edit me-2"></i>Edit Blog</h2>

    <form method="post" enctype="multipart/form-data" id="blogForm">
        <!-- Basic Info -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white fw-semibold">
                <i class="fas fa-info-circle me-2"></i>Basic Info
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Blog Title *</label>
                        <input type="text" class="form-control" name="name" id="blogTitle"
                               value="<?php echo htmlspecialchars($blog->name); ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Date *</label>
                        <input type="date" class="form-control" name="date"
                               value="<?php echo $blog->date ? date('Y-m-d', strtotime($blog->date)) : date('Y-m-d'); ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="active" <?php echo $blog->status == 'active' ? 'selected' : ''; ?>>Active</option>
                            <option value="inactive" <?php echo $blog->status == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Author</label>
                        <input type="text" class="form-control" name="author"
                               value="<?php echo htmlspecialchars($blog->author); ?>" placeholder="Author name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">URL Slug</label>
                        <div class="input-group">
                            <span class="input-group-text text-muted" style="font-size:12px;">/blog/</span>
                            <input type="text" class="form-control" name="url_slug" id="urlSlug"
                                   value="<?php echo htmlspecialchars($blog->slug ?? ''); ?>">
                        </div>
                        <small class="text-muted">Changing the slug will break existing links to this post.</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Editor -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white fw-semibold">
                <i class="fas fa-edit me-2"></i>Blog Content
            </div>
            <div class="card-body">
                <textarea name="description" id="blogDescription"><?php echo htmlspecialchars($blog->description ?? ''); ?></textarea>
            </div>
        </div>

        <!-- Images -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white fw-semibold">
                <i class="fas fa-images me-2"></i>Images
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Cover Image Alt Text</label>
                    <input type="text" class="form-control" name="cover_image_alt"
                           value="<?php echo htmlspecialchars($blog->cover_image_alt ?? ''); ?>"
                           placeholder="Describe the cover image for accessibility and SEO">
                    <small class="text-muted">Used as the alt attribute on the cover image.</small>
                </div>

                <?php if (!empty($existing_gallery)): ?>
                <div class="mb-3 p-3 border rounded bg-light" id="galleryContainer">
                    <h6 class="mb-3">Current Gallery Images (<span id="galleryCount"><?php echo count($existing_gallery); ?></span> images):</h6>
                    <div class="d-flex flex-wrap gap-3" id="existingGalleryContainer">
                        <?php foreach ($existing_gallery as $img): ?>
                        <div class="position-relative gallery-item" style="width:150px;height:150px;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.1)">
                            <img src="<?php echo base_url($img); ?>" class="w-100 h-100" style="object-fit:cover">
                            <input type="hidden" name="existing_gallery[]" value="<?php echo htmlspecialchars($img); ?>" class="gallery-input">
                            <button type="button" class="btn btn-danger btn-sm position-absolute remove-gallery-image"
                                    style="top:5px;right:5px;padding:0;width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center;border:2px solid #fff;cursor:pointer" title="Remove">
                                <i class="fas fa-times" style="font-size:13px;color:#fff;"></i>
                            </button>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <small class="text-muted d-block mt-2"><i class="fas fa-info-circle me-1"></i>Click <strong>X</strong> to remove an image. New uploads are added alongside existing ones.</small>
                </div>
                <?php else: ?>
                <div class="mb-3 p-3 border rounded bg-light" id="galleryContainer" style="display:none">
                    <h6 class="mb-3">Current Gallery Images (<span id="galleryCount">0</span> images):</h6>
                    <div class="d-flex flex-wrap gap-3" id="existingGalleryContainer"></div>
                </div>
                <?php endif; ?>

                <div class="mb-2">
                    <input type="file" class="form-control" name="gallery[]" multiple accept="image/*" id="galleryInput">
                    <small class="text-muted">Hold Ctrl/Cmd to select multiple images</small>
                </div>
                <div id="galleryPreview" class="mt-3 d-flex flex-wrap gap-3"></div>
            </div>
        </div>

        <!-- SEO Settings -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white fw-semibold">
                <i class="fas fa-search me-2"></i>SEO Settings
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label d-flex justify-content-between">
                        <span>Meta Title</span>
                        <span id="metaTitleCount" class="text-muted" style="font-size:12px;"><?php echo strlen($blog->meta_title ?? ''); ?> / 70</span>
                    </label>
                    <input type="text" class="form-control" name="meta_title" id="metaTitle" maxlength="70"
                           value="<?php echo htmlspecialchars($blog->meta_title ?? ''); ?>"
                           placeholder="SEO title (leave blank to use blog title)">
                    <small class="text-muted">Recommended: 50–70 characters</small>
                </div>
                <div class="mb-3">
                    <label class="form-label d-flex justify-content-between">
                        <span>Meta Description</span>
                        <span id="metaDescCount" class="text-muted" style="font-size:12px;"><?php echo strlen($blog->meta_description ?? ''); ?> / 160</span>
                    </label>
                    <textarea class="form-control" name="meta_description" id="metaDesc" rows="3" maxlength="160"
                              placeholder="SEO meta description for search engines"><?php echo htmlspecialchars($blog->meta_description ?? ''); ?></textarea>
                    <small class="text-muted">Recommended: 120–160 characters</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" name="meta_keywords"
                           value="<?php echo htmlspecialchars($blog->meta_keywords ?? ''); ?>"
                           placeholder="keyword1, keyword2, keyword3">
                    <small class="text-muted">Comma-separated keywords</small>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark fw-semibold">
                <i class="fas fa-question-circle me-2"></i>FAQ Section
                <small class="ms-2 fw-normal">(generates FAQ schema for SEO)</small>
            </div>
            <div class="card-body">
                <div id="faqContainer"></div>
                <button type="button" class="btn btn-outline-warning mt-2" id="addFaqBtn">
                    <i class="fas fa-plus me-1"></i>Add FAQ
                </button>
                <input type="hidden" name="faq_data" id="faqData" value="<?php echo htmlspecialchars($existing_faq); ?>">
                <small class="d-block text-muted mt-2">FAQ entries generate a FAQ Page schema for Google rich results.</small>
            </div>
        </div>

        <div class="d-flex gap-2 mb-5">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Update Blog
            </button>
            <a href="<?php echo base_url('admin/blogs'); ?>" class="btn btn-secondary">
                <i class="fas fa-times me-2"></i>Cancel
            </a>
        </div>
    </form>
</div>

<?php $this->load->view('admin/blogs/_tinymce_init'); ?>
<script>
// Meta char counters
document.getElementById('metaTitle').addEventListener('input', function() {
    document.getElementById('metaTitleCount').textContent = this.value.length + ' / 70';
});
document.getElementById('metaDesc').addEventListener('input', function() {
    document.getElementById('metaDescCount').textContent = this.value.length + ' / 160';
});

// Gallery remove
document.addEventListener('click', function(e) {
    if (e.target.closest('.remove-gallery-image')) {
        e.preventDefault();
        const item = e.target.closest('.gallery-item');
        if (item) {
            item.style.transition = 'opacity .3s,transform .3s';
            item.style.opacity = '0';
            item.style.transform = 'scale(.8)';
            setTimeout(() => {
                item.querySelector('.gallery-input')?.remove();
                item.remove();
                const remaining = document.querySelectorAll('.gallery-item').length;
                document.getElementById('galleryCount').textContent = remaining;
                document.getElementById('galleryContainer').style.display = remaining ? 'block' : 'none';
            }, 300);
        }
    }
});

// Gallery new image preview
document.getElementById('galleryInput').addEventListener('change', function() {
    const preview = document.getElementById('galleryPreview');
    preview.innerHTML = '';
    Array.from(this.files).forEach(file => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = e => {
                const div = document.createElement('div');
                div.className = 'position-relative';
                div.style.cssText = 'width:150px;height:150px;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.1)';
                div.innerHTML = `<img src="${e.target.result}" style="width:100%;height:100%;object-fit:cover"><span class="badge bg-success position-absolute top-0 start-0 m-2">New</span>`;
                preview.appendChild(div);
            };
            reader.readAsDataURL(file);
        }
    });
});

// ---- FAQ logic ----
let faqs = <?php echo $existing_faq; ?>;
if (!Array.isArray(faqs)) faqs = [];

function renderFaqs() {
    const container = document.getElementById('faqContainer');
    container.innerHTML = '';
    if (faqs.length === 0) {
        container.innerHTML = '<p class="text-muted mb-0">No FAQs added yet. Click "Add FAQ" to create your first entry.</p>';
    }
    faqs.forEach((faq, idx) => {
        const div = document.createElement('div');
        div.className = 'border rounded p-3 mb-3 bg-light';
        div.innerHTML = `
            <div class="d-flex justify-content-between align-items-center mb-2">
                <strong class="text-muted">FAQ #${idx + 1}</strong>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeFaq(${idx})">
                    <i class="fas fa-trash me-1"></i>Remove
                </button>
            </div>
            <div class="mb-2">
                <label class="form-label mb-1 fw-semibold">Question</label>
                <input type="text" class="form-control" value="${escHtml(faq.question)}"
                       onchange="updateFaq(${idx}, 'question', this.value)"
                       placeholder="Enter the question">
            </div>
            <div>
                <label class="form-label mb-1 fw-semibold">Answer</label>
                <textarea class="form-control" rows="3"
                          onchange="updateFaq(${idx}, 'answer', this.value)"
                          placeholder="Enter the answer">${escHtml(faq.answer)}</textarea>
            </div>`;
        container.appendChild(div);
    });
    syncFaqData();
}

function escHtml(str) {
    return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

function updateFaq(idx, field, value) {
    faqs[idx][field] = value;
    syncFaqData();
}

function removeFaq(idx) {
    faqs.splice(idx, 1);
    renderFaqs();
}

function syncFaqData() {
    document.getElementById('faqData').value = JSON.stringify(faqs);
}

document.getElementById('addFaqBtn').addEventListener('click', function() {
    faqs.push({ question: '', answer: '' });
    renderFaqs();
});

renderFaqs();

// Ensure TinyMCE content syncs before submit
document.getElementById('blogForm').addEventListener('submit', function() {
    if (tinymce.get('blogDescription')) {
        tinymce.get('blogDescription').save();
    }
    syncFaqData();
});
</script>
