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
                                    <input type="text" name="regime" class="form-control" id="exampleInputPassword2" placeholder="Insérer régime">
                                </div>
                                    <label for="exampleFormControlSelect2">Intervalle de Poids </label>
                                    <div class="row">
                                        <div class="col-md-4 grid-margin">
                                            <input type="number" name="debut" class="form-control" id="exampleInputPassword2" placeholder="Debut poids">
                                        </div>
                                        <div class="col-md-4 grid-margin">
                                            <input type="number" name="fin" class="form-control" id="exampleInputPassword2" placeholder="Fin Poids">
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Prix</label>
                                    <input type="text" name="prix" class="form-control" id="exampleInputPassword2" placeholder="Insérer Prix">
                                </div>
                                <div class="form-group" id="detail">
                                    <label for="exampleFormControlSelect3">Type</label>
                                    <select class="form-control form-control-sm" id="type" name="type">
                                        <option value="1">Dinamique</option>
                                        <option value="2">Basique</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Duree</label>
                                    <input type="text" name="duree" class="form-control" id="exampleInputPassword2" placeholder="Insérer duree">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Jour</label>
                                    <input type="text" class="form-control" id="jour" placeholder="Insérer régime">
                                </div>
                                <label for="exampleFormControlSelect3">Insertion Repas</label>
                                <div class="row">
                                        <label for="exampleFormControlSelect3">Matin</label>
                                        <div class="col-md-3 grid-margin">
                                            <select class="form-control form-control-sm" id="matin">
                                                <option value="1">Ovy</option>
                                                <option value="2">Karoty</option>
                                            </select>
                                        </div>
                                        <label for="exampleFormControlSelect3">Midi</label>
                                        <div class="col-md-3 grid-margin">
                                            <select class="form-control form-control-sm" id="midi">
                                                <option value="1">Ovy</option>
                                                <option value="2">Karoty</option>
                                            </select>
                                        </div>
                                        <label for="exampleFormControlSelect3">Soir</label>
                                        <div class="col-md-3 grid-margin">
                                            <select class="form-control form-control-sm" id="soir">
                                                <option value="1">Ovy</option>
                                                <option value="2">Karoty</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group" id="detail">
                                    <label for="exampleFormControlSelect3">Activites</label>
                                    <select class="form-control form-control-sm" id="activites">
                                        <option value="1">Difficile</option>
                                        <option value="2">Moyen</option>
                                        <option value="2">Facile</option>
                                    </select>
                                </div>
                            </div>
                            
                            <a  class="btn btn-primary mr-2 text-white" onclick="addDetail()">Ajouter</a>
                            <a  class="btn btn-light text-white" onclick="terminerDetail()">Terminer</a>
                        </form>
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
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
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
    var regimeDetail=[]; 
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
        td1.innerText = jour.value;
        td5.innerText = activites.options[activites.selectedIndex].innerText;
        td4.innerText = soir.options[soir.selectedIndex].innerText;
        td3.innerText = midi.options[midi.selectedIndex].innerText;
        td2.innerText = matin.options[matin.selectedIndex].innerText;
        let object ={
            'jour': jour.value,
            'activites': activites.value,
            'soir':soir.value,
            'midi':midi.value,
            'matin':matin.value
        }
        regimeDetail.push(object);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);
        tbody.appendChild(tr);
    }
    function terminerDetail() {
        console.log("ato za");
        let regime = JSON.stringify(regimeDetail);
        let htmlForm = document.getElementById("formulaire");
        const data = new URLSearchParams();
        let formData = new FormData(htmlForm)
        formData.append('regimeDetail', regime)
        for (const pair of formData) {
            data.append(pair[0], pair[1]);
        }
        fetch("<?= base_url('index.php/DietController/new_diet') ?>", { 
            method: 'POST',
            body: data 
        }).then(() => {
            alert("lasa e");
        }).catch(error => {
            alert(error)
        })
    }
</script>
