<div class="container-fluid">
    <h2 class="mb-4"><i class="fas fa-plus me-2"></i>Create Notification</h2>

    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Title *</label>
                    <input type="text" class="form-control" name="title" required maxlength="255" placeholder="Enter notification title">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="5" placeholder="Enter notification description"></textarea>
                    <small class="text-muted">You can provide detailed information about the notification</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" accept="image/*" id="notificationImageInput">
                    <small class="text-muted">Recommended size: 800x600px. Supported formats: JPG, PNG, GIF, WEBP (Max: 5MB)</small>
                    <div id="notificationImagePreview" class="mt-2"></div>
                </div>
                <script>
                    document.getElementById('notificationImageInput').addEventListener('change', function(e) {
                        const preview = document.getElementById('notificationImagePreview');
                        preview.innerHTML = '';
                        if (this.files && this.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.className = 'img-thumbnail';
                                img.style.maxWidth = '500px';
                                img.style.maxHeight = '300px';
                                preview.appendChild(img);
                            };
                            reader.readAsDataURL(this.files[0]);
                        }
                    });
                </script>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Create Notification
                    </button>
                    <a href="<?php echo base_url('admin/notifications'); ?>" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
