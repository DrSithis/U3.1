<h2>{$data_i.Titre}<span style="font-size: 10px; padding-left:5%;">{$data_i.Date|date_format:'%d/%m/%Y'}</span></h2>
<div><img alt="" src="{$data_i.image}"/>{$data_i.Texte}</div><br>
<h3 style='font-size: 10px;'>Tag : <span style="">{$data_i.Nom}</span></h3>
{if $connexion eq true}
<a href="article.php?id={$data_i.Id}" class="btn btn-success"> Modifier </a>
<a href="supprimer_article.php?id={$data_i.Id}&bt=Supprimer" class="btn btn-danger"> Supprimer </a>
{/if}
<br>