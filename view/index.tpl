<div>
    {foreach from=$data item=data_i} 
        <div class="article">
           {include file='view/partial/_article.tpl' article=$data_i} 
           <hr>
        </div>
    {/foreach} 
</div>


<br><br>

<div class="pagination pagination-large pagination-centered">
   {if $page neq 1}
        <a href='{$minuspage}'> Précedent</a>
    {/if}
    {for $l=1 to $nbpage}
        {if $page eq $l}
            <a class="active" href="index.php?p={$l}"><b>{$l}</b></a>
        {else}
            <a href="index.php?p={$l}">{$l}</a>
        {/if}


        {/for}

    {if $page neq $nbpage}
    <a href='{$somepage}'> Suivant</a>
    {/if} 
</div>




