<?php require_once "web/header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate_est_add();">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">Nome</label> <span
            id="name-info" class="info"></span><br /> <input type="text"
            name="nome" id="nome" class="demoInputBox">
    </div>
    <div>
        <label>Número</label> <span id="roll-number-info"
            class="info"></span><br /> <input type="text"
            name="numero" id="numero" class="demoInputBox">
    </div>
    <div>
        <label>Data de aniversário</label> <span id="dob-info" class="info"></span><br />
        <input type="date" name="data" id="data" class="demoInputBox">
    </div>
    <div>
        <label>Classe</label> <span id="class-info" class="info"></span><br />
        <input type="text" name="classe" id="classe" class="demoInputBox">
    </div>
    <div>
        <input type="submit" name="add" id="btnSubmit" value="Salvar" />
    </div>
    </div>
</form>
<script src="web/js/jquery-2.1.1.min.js" ></script>
<script src="web/js/validador.js" ></script>
</body>
</html>