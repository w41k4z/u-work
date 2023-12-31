<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Insertion Détail Régime</h4>
                        <form class="forms-sample" id="formulaire">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Régime</label>
                                    <input type="text" name="regime" class="form-control" id="exampleInputPassword2"
                                        placeholder="Insérer régime">
                                </div>
                                <label for="exampleFormControlSelect2">Intervalle de Poids </label>
                                <div class="row">
                                    <div class="col-md-6 grid-margin">
                                        <input type="number" name="debut" class="form-control"
                                            id="exampleInputPassword2" placeholder="De">
                                    </div>
                                    <div class="col-md-6 grid-margin">
                                        <input type="number" name="fin" class="form-control" id="exampleInputPassword2"
                                            placeholder="A">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Prix</label>
                                        <input type="number" name="prix" class="form-control" id="exampleInputPassword2"
                                            placeholder="Insérer Prix">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6" id="detail">
                                            <label for="exampleFormControlSelect3">Type</label>
                                            <select class="form-control form-control-sm" id="type" name="type">
                                                <?php for ($i = 0; $i < count($diet_category); $i++) { ?>
                                                <option value="<?= $diet_category[$i]->id ?>">
                                                    <?= $diet_category[$i]->categorie ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleFormControlSelect1">Duree (hebdomadaire)</label>
                                            <input type="text" name="duree" class="form-control form-control-sm"
                                                id="exampleInputPassword2" placeholder="Insérer duree">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="exampleFormControlSelect2">Jour</label>
                                            <input type="text" class="form-control" id="jour"
                                                placeholder="Insérer régime">
                                        </div>
                                        <div class="col-md-6 form-group" id="detail">
                                            <label for="exampleFormControlSelect3">Niveau activite</label>
                                            <select class="form-control form-control-lg" id="activites">
                                                <?php for ($i = 0; $i < count($trainings); $i++) { ?>
                                                <option value="<?= $trainings[$i]->id ?>"><?= $trainings[$i]->niveau ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <label for="exampleFormControlSelect3">Insertion Repas</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="exampleFormControlSelect3">Matin</label>
                                            <select class="form-control form-control-sm" id="matin">
                                                <?php for ($i = 0; $i < count($plats); $i++) { ?>
                                                <option value="<?= $plats[$i]->id ?>"><?= $plats[$i]->nom ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleFormControlSelect3">Midi</label>
                                            <select class="form-control form-control-sm" id="midi">
                                                <?php for ($i = 0; $i < count($plats); $i++) { ?>
                                                <option value="<?= $plats[$i]->id ?>"><?= $plats[$i]->nom ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleFormControlSelect3">Soir</label>
                                            <select class="form-control form-control-sm" id="soir">
                                                <?php for ($i = 0; $i < count($plats); $i++) { ?>
                                                <option value="<?= $plats[$i]->id ?>"><?= $plats[$i]->nom ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <label for="exampleFormControlSelect9" class="mt-4">Pourcentage</label>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="exampleFormControlSelect10">Viande</label>
                                            <input type="number" class="form-control" name="p_viande" id="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleFormControlSelect11">Poisson</label>
                                            <input type="number" class="form-control" name="p_poisson" id="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleFormControlSelect12">Volaille</label>
                                            <input type="number" class="form-control" name="p_volaille" id="">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-primary mr-2 text-white" onclick="addDetail()">Ajouter</a>
                                    <a class="btn btn-success text-white" onclick="terminerDetail()">Terminer</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste Composition</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Jours</th>
                                    <th>Matin</th>
                                    <th>Midi</th>
                                    <th>Soir</th>
                                    <th>Activites</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var regimeDetail = [];

function addDetail() {
    let jour = document.getElementById("jour");
    let activites = document.getElementById("activites");
    let soir = document.getElementById("soir");
    let midi = document.getElementById("midi");
    let matin = document.getElementById("matin");
    let tbody = document.getElementById("tbody");
    let tr = document.createElement("tr");
    let td1 = document.createElement("td");
    let td2 = document.createElement("td");
    let td3 = document.createElement("td");
    let td4 = document.createElement("td");
    let td5 = document.createElement("td");
    let td6 = document.createElement("td");
    let day = jour.value;
    td1.innerText = jour.value;
    td2.innerText = matin.options[matin.selectedIndex].innerText;
    td3.innerText = midi.options[midi.selectedIndex].innerText;
    td4.innerText = soir.options[soir.selectedIndex].innerText;
    td5.innerText = activites.options[activites.selectedIndex].innerText;
    let removeButton = document.createElement("button");
    removeButton.classList.add("btn", "btn-close");
    removeButton.addEventListener('click', function() {
        regimeDetail = regimeDetail.filter(regime => regime.jour != day);
        tr.remove();
    })
    td6.appendChild(removeButton);
    let object = {
        'jour': jour.value,
        'activites': activites.value,
        'soir': soir.value,
        'midi': midi.value,
        'matin': matin.value
    }
    if (jour.value) {
        for (let i = 0; i < regimeDetail.length; i++) {
            if (regimeDetail[i].jour == jour.value) {
                alert("Ce jour existe deja");
                return;
            }
        }
        regimeDetail.push(object);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);
        tr.appendChild(td6);
        tbody.appendChild(tr);
    } else {
        alert("N'oublier pas le jour");
    }
}

function terminerDetail() {
    console.log("ato za");
    let regime = JSON.stringify(regimeDetail);
    let htmlForm = document.getElementById("formulaire");
    let formData = new FormData(htmlForm);
    formData.append('regimeDetail', regime);

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = () => {

        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                alert('Ok')
            } else {
                alert('Error, please inspect');
            }
        }

    };

    xhr.open('POST', "<?php echo base_url('index.php/DietController/new_diet') ?>");
    xhr.send(formData);
}
</script>