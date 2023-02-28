<?php require_once "web/header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate_pres_add();">
    <div>
        <input type="date" name="data_presenca" id="data_presenca" class="demoInputBox"> <span id="attendance_date-info" class="info"></span>
    </div>
    <div id="toys-grid">
        <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>Estudante</strong></th>
                    <th><strong>Presença</strong></th>
                    <th><strong>Falta</strong></th>
                </tr>
            </thead>
            <tbody>
                    <?php 
            if (!empty($estudanteResult)) {
                foreach ($estudanteResult as $k => $v) {
            ?>
          <tr>
             <td><input type="hidden"
            name="estudante_id[]" id="estudante_id" value = "<?php echo $estudanteResult[$k]["id"]; ?>">
            <?php echo $estudanteResult[$k]["nome"]; ?></td>
                    <td><input type="radio" name="presenca-<?php echo $estudanteResult[$k]["id"]; ?>" value="presenca" checked /></td>
                    <td><input type="radio" name="presenca-<?php echo $estudanteResult[$k]["id"]; ?>" value="falta" /></td>
            </tr>
                    <?php
                        }
                    }
                    ?>
            <tbody>
        </table>
    </div>
   <div>
        <input type="submit" name="add" id="btnSubmit" value="Salvar" />
    </div> 
</form>
<script src="web/js/jquery-2.1.1.min.js" ></script>
<script src="web/js/validador.js" ></script>
</body>
</html>