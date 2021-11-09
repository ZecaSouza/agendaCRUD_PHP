<?php
    include_once("templates/header.php");
?>
    <div class="container">
        <?php include_once("templates/backbtn.php"); ?>
        <h1 id="main-title">Adicionar contato</h1>
        <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="post">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="name">Nome do Contato:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone do Contato:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone" required>
            </div>
            <div class="form-group">
                <label for="observation">Insira as observações:</label>
                <textarea type="text" class="form-control" id="observation" name="observation" placeholder="O que gostaria de dizer?" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

<?php
    include_once("templates/footer.php");
?>