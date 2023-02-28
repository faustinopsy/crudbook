<?php require_once "web/header.php"; ?>
    <div style="text-align: right; margin: 20px 0px 10px;">
        <a id="btnAddAction" href="index.php?action=estudante-add"><img src="web/image/icon-add.png" />Novo Estudante</a>
    </div>
    <div id="toys-grid">
        <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>Nome</strong></th>
                    <th><strong>Número</strong></th>
                    <th><strong>Data de aniversário</strong></th>
                    <th><strong>Classe</strong></th>
                    <th><strong>Ação</strong></th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    if (! empty($result)) {
                        foreach ($result as $k => $v) {
                            ?>
                <tr>
                    <td><?php echo $result[$k]["nome"]; ?></td>
                    <td><?php echo $result[$k]["numero"]; ?></td>
                    <td><?php echo $result[$k]["data"]; ?></td>
                    <td><?php echo $result[$k]["classe"]; ?></td>
                    <td><a class="btnEditAction"
                        href="index.php?action=estudante-edit&id=<?php echo $result[$k]["id"]; ?>">
                        <img src="web/image/icon-edit.png" />
                        </a>
                        <a class="btnDeleteAction" 
                        href="index.php?action=estudante-delete&id=<?php echo $result[$k]["id"]; ?>">
                        <img src="web/image/icon-delete.png" />
                        </a>
                    </td>
                </tr>
                    <?php
                        }
                    }
                    ?>

            <tbody>  
        </table>
    </div>
</body>
</html>