<h2>Contato</h2>
<?=get('message')?>
<form action="../pages/forms/contato.php" method="post">
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Digite seu nome">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Digite seu email">
    </div>
    <div class="form-group">
        <label for="subject">Assunto</label>
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Digite o assunto">
    </div>
    <div class="form-group">
        <label for="message">Mensagem</label>
        <textarea name="message" id="message" class="form-control" cols="30" rows="10" placeholder="Digita sua mensagem"></textarea>
    </div>
    <button class="btn" type="submit">Enviar</button>
</form>