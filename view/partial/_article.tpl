<div class="{if $data_i.Image} articleifimg {/if}">

    <div class="fondbleu"><h2>{$data_i.Titre}<span style="font-size: 10px; padding-left:5%;">Date : {$data_i.Date|date_format:'%d/%m/%Y'}</span></h2></div>
    <h3 style='font-size: 10px;'>Tag : <span style="">{$data_i.Nom}</span></h3><br><br>
    <div>
        {if $data_i.Image}
            <a href="{$data_i.Image}" style="float:left;">
                <img alt="{$data_i.Image}" src="{$data_i.Image}" height="75" width="150"/>
            </a>
        {/if}
        <p style="float:left; padding-left: 20px;">{$data_i.Texte|escape|nl2br}</p>
    </div>
    <br>


    {if $connexion eq true}
        <div style="">
            <a href="article.php?id={$data_i.Id}" class="btn btn-success"> Modifier </a>
            <a href="supprimer_article.php?id={$data_i.Id}&bt=Supprimer" class="btn btn-danger"> Supprimer </a>
        </div>
    {/if}
</div>

