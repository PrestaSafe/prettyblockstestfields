<div class="container pt-5">
    {prettyblocks_title value_from_block=true block=$block field="title"}    
</div>

<div class="{if $block.settings.default.container} container {/if}"
    style="{if $block.settings.default.bg_color} background-color: {$block.settings.default.bg_color}; {/if}">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Champs</th>
                    <th scope="col">Valeur</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">color</th>
                    <td style="background-color: {$block.settings.color}; color: white">{$block.settings.color}</td>
                </tr>
                <tr>
                    <th scope="row">fileupload</th>
                    <td>
                    {dump($block.settings.fileupload)}
                        <img src="{$block.settings.fileupload.url}" alt="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">text</th>
                    <td>{$block.settings.text}</td>
                </tr>
                <tr>
                    <th scope="row">textarea</th>
                    <td>{$block.settings.textarea}</td>
                </tr>
                <tr>
                    <th scope="row">editor</th>
                    <td>{$block.settings.editor nofilter}</td>
                </tr>
                <tr>
                    <th scope="row">checkbox</th>
                    <td>{var_dump($block.settings.checkbox)}</td>
                </tr>
                <tr>
                    <th scope="row">radio_group</th>
                    <td>{$block.settings.radio_group}</td>
                </tr>
                <tr>
                    <th scope="row">select</th>
                    <td>{$block.settings.select}</td>
                </tr>
                <tr>
                    <th scope="row">multiselect</th>
                    <td>{foreach from=$block.settings.multiselect item=multi}
                        Seleted: <strong>{$multi}</strong><br>
                        {/foreach}
                    </td>
                </tr>
                <tr>
                    <th scope="row">selector</th>
                    <td>{var_dump($block.settings.selector)}</td>
                </tr>

                {* <tr>
                    <th scope="row">title</th>
                    <td>{$block.settings.title nofilter}</td>
                </tr>
                 *}
            </tbody>
        </table>
</div>



