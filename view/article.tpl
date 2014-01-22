<form action="article.php" name="formulaire" method="POST">
    <div class="clearfix">
        <label for="title">Titre</label>
        <div class="input"> 
            <input type="text" name="titre" id="titre" value="{$title}">
        </div>
    </div>    
    <div class="clearfix">
        <label for="texte">Texte</label>
        <div class="input">
            <textarea name="texte" id="texte">{$content}</textarea>
        </div>
    </div> 
    <div class="clearfix">
        <label for="tag">Tag (1seul)</label>
        <div class="input">
            <input type="text" name="tag" id="tag" value="{$tag}">
        </div>
    </div>     
    <div class="form-action">
        <input name="id" type="hidden" value="{$id}" >
        <input name="change" type="hidden" value="{$change}" >
        <input name="bt" type="submit" value="{$namebt}" class="btn btn-large btn-primary">
    </div>    
</form>

<script type="text/javascript">
    $('#form').submit(function() {
        var titre = $('#titre').val();
        var texte = $('#texte').val();
        if (!titre.length || !texte.length) {
            console.log("Champ vide");
            $('#notif').removeClass()
                       .addClass("alert alert-error")
                       .slideDown(2000);
            return false;
        }
        else{
            return true;
        }

    });
</script>