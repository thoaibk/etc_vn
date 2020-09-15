<?php
/**
 * Created by PhpStorm.
 * User: bo
 * Date: 4/4/2017
 * Time: 10:29 AM
 */
?>

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <div style="min-height: 230px" class="template-upload fade col col-lg-6 paddingtop5 paddingbottom5 image-block">
        <div class="size" style="margin-top: 14px">Loading...</div>
        <div style="height: 10px; margin: 0px 0 10px 0;" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="progress-bar progress-bar-success" style="width:100%;"></div>
        </div>
        <div class="text-center">
            <span class="preview"></span>
            <strong class="error text-danger"></strong>

            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                <button class="btn btn-danger btn-small delete" data-type="{%=file.delete_method%}" data-url="{%=file.delete_url%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="fa fa-trash-o"></i> <span>Xóa</span>
                </button>
            {% } %}
        </div>
        <div class="text-center">
            {% if (!i && !o.options.autoUpload) { %}
                <button style="margin: 5px 0 10px 0" class="btn btn-primary btn-sm start" disabled><i class="fa fa-upload"></i> <span>Upload</span></button>
            {% } %}
            {% if (!i) { %}
                <button style="margin: 5px 0 10px 0" class="btn btn-warning btn-sm cancel"><i class="fa fa-ban"></i> <span>Hủy</span></button>
            {% } %}
        </div>
    </div>
{% } %}
</script>

<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    {% if (file.title != 0) { %}
    <div style="min-height: 70px" class="template-download fade padding15">

        <div class="image-body">
            {% if (!file.error) { %}
                <button type="button" class="btn btn-danger image-delete btn-xs delete" data-type="{%=file.delete_method%}" data-url="{%=file.delete_url%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="fa fa-trash-o pointer"data-toggle="tooltip" data-trigger="hover focus" data-placement="top" data-html="true" data-container="body"  title="Delete this imge"></i>
                </button>

                <img class="image-thumb img-responsive" src="{%=file.url_thumb%}">

            {% } %}

            {% if (file.error) { %}
                <div style="margin-top: 34px"><span class="label label-danger">Error</span> {%=file.error%}</div>
                <button class="btn btn-danger btn-sm delete" data-type="{%=file.delete_method%}" data-url="{%=file.delete_url%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="fa fa-trash-o"></i> <span>Delete</span>
                </button>
            {% } %}
        </div>

    </div>
    {% } %}
{% } %}
</script>
