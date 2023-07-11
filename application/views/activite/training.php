<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="leading-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Entrainement</h4>
                            <a class="btn btn-primary"
                                href="<?= base_url("index.php/TrainingController/page/insertion") ?>">New</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Difficulte</th>
                                        <th>Nombre d'activite</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($trainings); $i++) { ?>
                                    <tr id="training-<?= $trainings[$i]->id ?>">
                                        <td><?= $i + 1 ?>.</td>
                                        <td><?= $trainings[$i]->str_niveau ?></td>
                                        <td><?= count($trainings[$i]->activites) ?></td>
                                        <td class="d-flex justify-content-end btn-group">
                                            <a class="btn btn-sm btn-info text-white" data-bs-toggle="modal"
                                                data-bs-target="#detailModal<?= $i ?>">Detail</a>
                                            <div class="modal fade" id="detailModal<?= $i ?>" tabindex="-1"
                                                aria-labelledby="detailModalLabel<?= $i ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header d-flex justify-content-between">
                                                            <h4 class="modal-title" id="detailModalLabel<?= $i ?>">
                                                                Activites</h4>
                                                            <button class="btn btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="model-body justify-content-around mt-3 p-3">
                                                            <div class="text-black">
                                                                <div class="card">
                                                                    <div class="card-body form-content">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>#</th>
                                                                                        <th>Activite</th>
                                                                                        <th>Nombre de fois</th>
                                                                                        <th></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php for ($j = 0; $j < count($trainings[$i]->activites); $j++) { ?>
                                                                                    <tr
                                                                                        id="line<?= $trainings[$i]->activites[$j]->id ?>-<?= $trainings[$i]->activites[$j]->id_activite ?>">
                                                                                        <td><?= $j + 1 ?>.</td>
                                                                                        <td><?= $trainings[$i]->activites[$j]->nom ?>
                                                                                        </td>
                                                                                        <td><input type="number"
                                                                                                class="form-control form-control-sm"
                                                                                                id="activity<?= $trainings[$i]->activites[$j]->id ?>-<?= $trainings[$i]->activites[$j]->id_activite ?>"
                                                                                                value="<?= $trainings[$i]->activites[$j]->quantite ?>">
                                                                                        </td>
                                                                                        <td>
                                                                                            <div
                                                                                                class="d-flex justify-content-end">
                                                                                                <a class="btn btn-sm btn-warning text-white mr-2"
                                                                                                    onclick="modify_activity(<?= $trainings[$i]->activites[$j]->id ?>, <?= $trainings[$i]->activites[$j]->id_activite ?>)">Modifier</a>
                                                                                                <a class="btn btn-sm btn-danger text-white"
                                                                                                    onclick="delete_activity(<?= $trainings[$i]->activites[$j]->id ?>, <?= $trainings[$i]->activites[$j]->id_activite ?>)">Supprimer</a>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php } ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <a class="btn btn-sm btn-danger text-white"
                                                onclick="delete_training(<?= $trainings[$i]->id ?>)">Supprimer</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function modify_activity(id_training_activity, id_activite) {
    let newValue = document.getElementById("activity" + id_training_activity + "-" + id_activite).value;
    let formData = new FormData();
    formData.append("id_training_activity", id_training_activity);
    formData.append("id_activite", id_activite);
    formData.append("quantite", newValue);

    console.log(document.getElementById("activity" + id_training_activity + "-" + id_activite));

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = () => {

        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log("hehe boyyy");
            }
        }

    };

    xhr.open('POST', "<?php echo base_url('index.php/TrainingController/update_activity') ?>");
    xhr.send(formData);
}

function delete_activity(id_training_activity, id_activity) {
    let tr = document.getElementById("line" + id_training_activity + "-" + id_activity);
    let formData = new FormData();
    formData.append("id_training_activity", id_training_activity);

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = () => {

        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                tr.remove();
            }
        }

    };

    xhr.open('POST', "<?php echo base_url('index.php/TrainingController/delete_activity') ?>");
    xhr.send(formData);
}

function delete_training(training_id) {
    let tr = document.getElementById("training-" + training_id);
    let formData = new FormData();
    formData.append("training_id", training_id);

    console.log(tr);

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = () => {

        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                tr.remove();
            }
        }

    };

    xhr.open('POST', "<?php echo base_url('index.php/TrainingController/delete_training') ?>");
    xhr.send(formData);
}
</script>