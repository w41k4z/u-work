<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Nouvelle activite</h4>
                        <p class="card-description"></p>
                        <form class="forms-sample" action="<?= base_url('index.php/TrainingController/new_activity') ?>"
                            method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Nom</label>
                                    <input type="text" name="nom" class="form-control" aria-label="Nom de l'activite"
                                        placeholder="Ex: Pompe">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Entrainement</h4>
                        <form class="forms-sample" action="<?= base_url("index.php/TrainingController/new_training") ?>"
                            method="post">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Niveau</label>
                                <input type="number" name="niveau" class="p-2 form-control form-control-lg"
                                    id="exampleFormControlSelect1" required />
                            </div>
                            <div class="form-group" id="dynamicForm">
                                <div>
                                    <label for="activitySelection" class="col-form-label">Activite</label>
                                    <div class="row align-items-center px-3" id="activities0">
                                        <select name="activites[]" class="form-control form-control-lg col-5">
                                            <?php for ($i = 0; $i < count($activities); $i++) { ?>
                                            <option value="<?= $activities[$i]->id ?>"><?= $activities[$i]->nom ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <input type="number" class="offset-1 col-3 p-1 form-control form-control-lg"
                                            placeholder="quantite" name="quantites[]">
                                        <a class="btn btn-close col-1"
                                            onclick="document.getElementById('activities0').remove()"></a>
                                    </div>
                                </div>
                            </div>
                            <a type="submit" class="btn btn-secondary text-white" onclick="addActivity()">Ajouter</a>
                            <button type="submit" class="btn btn-primary mr-2">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
echo "<script>\n";
echo "\tvar activities = [];\n";
for ($j = 0; $j < count($activities); $j++) {
    echo "\tactivities.push({activity: '" . $activities[$j]->nom . "', id: '" . $activities[$j]->id . "'});\n";
}
echo "</script>"
?>

<script>
var index = 0;

function addActivity() {
    let div = document.getElementById("dynamicForm");
    let container = document.createElement("div");
    container.classList.add("mt-2", "px-3", "row", "align-items-center")
    container.setAttribute("id", "activities" + ++index);

    let select = document.createElement("select");
    select.classList.add("form-control", "form-control-lg", "col-5");
    select.setAttribute("name", "activites[]");

    for (let activity of activities) {
        let option = document.createElement("option");
        option.setAttribute("value", activity.id);
        option.innerHTML = activity.activity;
        select.appendChild(option);
    }

    let input = document.createElement("input");
    input.setAttribute("type", "number");
    input.setAttribute("placeholder", "quantite");
    input.setAttribute("name", "quantites[]");
    input.classList.add("offset-1", "col-3", "p-1", "form-control", "form-control-lg");

    let button = document.createElement("button");
    button.classList.add("btn", "btn-close", "col-1");
    button.addEventListener('click', function() {
        container.remove();
    })

    container.appendChild(select);
    container.appendChild(input);
    container.appendChild(button);
    div.appendChild(container);
}
</script>