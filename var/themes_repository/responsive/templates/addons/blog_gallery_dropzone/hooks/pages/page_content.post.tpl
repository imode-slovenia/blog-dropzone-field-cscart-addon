{if $page.description && $page.page_type == $smarty.const.PAGE_TYPE_BLOG}
    {if $additional_images}
        <!-- Fotorama from CDNJS, 19 KB -->
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
        <div class="fotorama" data-nav="thumbs" data-height="400">
            {foreach from=$additional_images item=image}
                <img src="{$image.detailed.image_path}">
            {/foreach}
        </div>
    {/if}
{/if}
