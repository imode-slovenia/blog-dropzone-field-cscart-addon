{if $page_type == $smarty.const.PAGE_TYPE_BLOG}

{include file="common/subheader.tpl" title="Gallery" target="#blog_dropzone_image"}
<div id="blog_dropzone_image" class="in collapse">
    <fieldset>
        <div class="control-group">
            <label class="control-label">{__("image")}:</label>
            <div class="controls">
                {include
                    file="common/form_file_uploader.tpl"
                    existing_pairs=(($image_pairs) ? $image_pairs : [])
                    file_name="file"
                    image_pair_types=['A' => 'product_additional_image']
                    allow_update_files=true
                }
            </div>
        </div>
    </fieldset>
</div>

{/if}