<?php require_once "web/header.php"; ?>
    <div style="text-align: right; margin: 20px 0px 10px;">
        <a id="btnAddAction" href="index.php?action=presenca-add">
            <img src="web/image/icon-add.png" />Nova Presença
        </a>
    </div>
    <div id="toys-grid">
        <table cellpadding="10" cellspacing="1" class="attendance_table">
            <thead>
                <tr>
                    <th><strong>Data</strong></th>
                    <th><strong>Presença</strong></th>
                    <th><strong>Falta</strong></th>
                    <th><strong>Ação</strong></th>

                </tr>
            </thead>
            <tbody>
                    <?php
                    if (!empty($result)) {
                        foreach ($result as $k => $v) {
                            ?>
                <tr>
                    <td><?php 
                    $attendance_date = "";
                    if(!empty($result[$k]["data_presenca"])) {
                        $attendance_timestamp = strtotime($result[$k]["data_presenca"]);
                        $attendance_date = date("m-d-Y", $attendance_timestamp);
                    }
                    echo $attendance_date; ?></td>
                    <td><?php echo $result[$k]["presenca"]; ?></td>
                    <td><?php echo $result[$k]["falta"]; ?></td>
                    <td><a class="btnEditAction"
                        href="index.php?action=presenca-edit&data=<?php echo $result[$k]["data_presenca"]; ?>">
                        <img src="web/image/icon-edit.png" />
                        </a>
                        <a class="btnDeleteAction" 
                        href="index.php?action=presenca-delete&data=<?php echo $result[$k]["data_presenca"]; ?>">
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