<div class="container-fluid">
    <h2 class="mb-4"><i class="fas fa-plus me-2"></i>Create Blog</h2>

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
                        <input type="text" class="form-control" name="name" id="blogTitle" required placeholder="Enter blog title">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Date *</label>
                        <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Author</label>
                        <input type="text" class="form-control" name="author" placeholder="Author name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">URL Slug</label>
                        <div class="input-group">
                            <span class="input-group-text text-muted" style="font-size:12px;">/blog/</span>
                            <input type="text" class="form-control" name="url_slug" id="urlSlug" placeholder="auto-generated-from-title">
                        </div>
                        <small class="text-muted">Leave blank to auto-generate from title. Use lowercase letters, numbers, hyphens only.</small>
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
                <textarea name="description" id="blogDescription"></textarea>
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
                    <input type="text" class="form-control" name="cover_image_alt" placeholder="Describe the cover image for accessibility and SEO">
                    <small class="text-muted">Used as the alt attribute on the cover image.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gallery Images</label>
                    <input type="file" class="form-control" name="gallery[]" multiple accept="image/*" id="galleryInput">
                    <small class="text-muted">Hold Ctrl/Cmd to select multiple images</small>
                    <div id="galleryPreview" class="mt-3 d-flex flex-wrap gap-2"></div>
                </div>
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
                        <span id="metaTitleCount" class="text-muted" style="font-size:12px;">0 / 70</span>
                    </label>
                    <input type="text" class="form-control" name="meta_title" id="metaTitle" maxlength="70" placeholder="SEO title (leave blank to use blog title)">
                    <small class="text-muted">Recommended: 50–70 characters</small>
                </div>
                <div class="mb-3">
                    <label class="form-label d-flex justify-content-between">
                        <span>Meta Description</span>
                        <span id="metaDescCount" class="text-muted" style="font-size:12px;">0 / 160</span>
                    </label>
                    <textarea class="form-control" name="meta_description" id="metaDesc" rows="3" maxlength="160" placeholder="SEO meta description for search engines"></textarea>
                    <small class="text-muted">Recommended: 120–160 characters</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" name="meta_keywords" placeholder="keyword1, keyword2, keyword3">
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
                <input type="hidden" name="faq_data" id="faqData" value="[]">
                <small class="d-block text-muted mt-2">FAQ entries generate a FAQ Page schema for Google rich results.</small>
            </div>
        </div>

        <div class="d-flex gap-2 mb-5">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Create Blog
            </button>
            <a href="<?php echo base_url('admin/blogs'); ?>" class="btn btn-secondary">
                <i class="fas fa-times me-2"></i>Cancel
            </a>
        </div>
    </form>
</div>

<!-- TinyMCE -->
<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '#blogDescription',
    height: 500,
    menubar: 'file edit view insert format tools table',
    plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | bold italic underline strikethrough | ' +
             'forecolor backcolor | alignleft aligncenter alignright alignjustify | ' +
             'bullist numlist outdent indent | link image media | ' +
             'removeformat code fullscreen | help',
    block_formats: 'Paragraph=p; Heading 2=h2; Heading 3=h3; Heading 4=h4; Blockquote=blockquote; Preformatted=pre',
    content_style: [
        'body { font-family: Inter, Arial, sans-serif; font-size: 15px; line-height: 1.7; color: #333; max-width: 860px; margin: 16px auto; }',
        'p { margin: 0 0 0.75em 0; }',
        'h2 { font-size: 1.5em; margin: 1.2em 0 0.4em; }',
        'h3 { font-size: 1.25em; margin: 1em 0 0.4em; }',
        'a { color: #1a73e8; }'
    ].join(' '),
    link_default_target: '_blank',
    link_title: true,
    relative_urls: false,
    remove_script_host: false,
    images_upload_url: '<?php echo base_url("admin/upload_image"); ?>',
    automatic_uploads: true,
    file_picker_types: 'image',
    branding: false
});

// Meta char counters
document.getElementById('metaTitle').addEventListener('input', function() {
    document.getElementById('metaTitleCount').textContent = this.value.length + ' / 70';
});
document.getElementById('metaDesc').addEventListener('input', function() {
    document.getElementById('metaDescCount').textContent = this.value.length + ' / 160';
});

// Gallery preview
document.getElementById('galleryInput').addEventListener('change', function() {
    const preview = document.getElementById('galleryPreview');
    preview.innerHTML = '';
    Array.from(this.files).forEach(file => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = e => {
                const div = document.createElement('div');
                div.className = 'position-relative';
                div.style.cssText = 'width:120px;height:120px;border-radius:6px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.1)';
                div.innerHTML = `<img src="${e.target.result}" style="width:100%;height:100%;object-fit:cover"><span class="badge bg-success position-absolute top-0 start-0 m-1">New</span>`;
                preview.appendChild(div);
            };
            reader.readAsDataURL(file);
        }
    });
});

// ---- FAQ logic ----
let faqs = [];

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
