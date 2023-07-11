<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="leading-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Regime</h4>
                            <a class="btn btn-primary" href="<?= base_url("index.php/DietController/page/insertion") ?>">New</a>
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
                                    <?php for ($i = 0; $i < count($diets); $i++) { ?>
                                        <tr>
                                            <td><?= $diets[$i]->nom ?></td>
                                            <td><?= $diets[$i]->duree * 7 ?>j</td>
                                            <td class="text-end"><?= $diets[$i]->pourcentage_viande ?></td>
                                            <td class="text-end"><?= $diets[$i]->pourcentage_poisson ?></td>
                                            <td class="text-end"><?= $diets[$i]->pourcentage_volaille ?></td>
                                            <td><?= $diets[$i]->de ?> a <?= $diets[$i]->a ?></td>
                                            <td class="text-end"><?= $diets[$i]->prix ?> Ar</td>
                                            <td class="d-flex justify-content-end btn-group">
                                                <a class="btn btn-sm btn-danger text-white" href="<?= base_url("index.php/DietController/delete/" . $diets[$i]->id) ?>">Supprimer</a>
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