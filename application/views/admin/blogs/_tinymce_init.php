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
    body_class: 'blog-post-content entry-content',
    content_css: '<?php echo base_url('assets/css/blog-editor-content.css'); ?>',
    link_default_target: '_blank',
    link_title: true,
    relative_urls: false,
    remove_script_host: false,
    images_upload_url: '<?php echo base_url("admin/upload_image"); ?>',
    automatic_uploads: true,
    file_picker_types: 'image',
    branding: false
});
</script>
