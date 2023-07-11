<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="leading-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Regime</h4>
                            <a class="btn btn-primary"
                                href="<?= base_url("index.php/DietController/page/insertion") ?>">New</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Duree</th>
                                        <th>% viande</th>
                                        <th>% poisson</th>
                                        <th>% volaille</th>
                                        <th>Interval</th>
                                        <th>Prix</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Regime A</td>
                                        <td>14j</td>
                                        <td class="text-end">20%</td>
                                        <td class="text-end">10%</td>
                                        <td class="text-end">0%</td>
                                        <td>1 a 3</td>
                                        <td class="text-end">144.000 Ar</td>
                                        <td class="d-flex justify-content-end btn-group">
                                            <a class="btn btn-sm btn-info text-white" data-bs-toggle="modal"
                                                data-bs-target="#detailModal">Detail</a>
                                            <div class="modal fade" id="detailModal" tabindex="-1"
                                                aria-labelledby="detailModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header d-flex justify-content-between">
                                                            <h4 class="modal-title" id="detailModalLabel">
                                                                Details</h4>
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
                                                                                        <th>Jour</th>
                                                                                        <th>Matin</th>
                                                                                        <th>Midi</th>
                                                                                        <th>Soir</th>
                                                                                        <th>Activite</th>
                                                                                        <th></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>1</td>
                                                                                        <td>Cafe sy Mofo baolina</td>
                                                                                        <td>Tsaramaso sy hena baolina
                                                                                        </td>
                                                                                        <td>Soupe Presto</td>
                                                                                        <td>Pompe 5, Saut a la corde 10,
                                                                                            Squat 10</td>
                                                                                        <td>
                                                                                            <div
                                                                                                class="d-flex justify-content-end">
                                                                                                <a
                                                                                                    class="btn btn-sm btn-warning text-white mr-2">Modifier</a>
                                                                                                <a
                                                                                                    class="btn btn-sm btn-danger text-white">Supprimer</a>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
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

                                            <a class="btn btn-sm btn-danger text-white">Supprimer</a>
                                        </td>
                                    </tr>
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