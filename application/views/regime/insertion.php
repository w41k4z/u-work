<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Insertion Détail Régime</h4>
                        <p class="card-description">

                        </p>
                        <form class="forms-sample" id="formulaire">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Régime</label>
                                    <input type="text" name="regime" class="form-control" id="exampleInputPassword2" placeholder="Insérer régime">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Nombre de Repas</label>
                                    <select class="form-control" name="repas" id="exampleFormControlSelect2">
                                        <option>3</option>
                                        <option>2</option>
                                        <option>1</option>
                                    </select>
                                </div>
                                <div class="form-group" id="detail">
                                    <label for="exampleFormControlSelect3">Choix Composant </label>
                                    <select class="form-control form-control-sm" id="exampleFormControlSelect3">
                                        <option value="1">Ovy</option>
                                        <option value="2">Karoty</option>
                                    </select>
                                </div>
                            </div>
                            <a  class="btn btn-primary mr-2 text-white" onclick="addDetail()">Ajouter</a>
                            <a  class="btn btn-light text-white" onclick="terminerDetail()">Terminer</a>
                        </form>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Insertion Régime</h4>
                        <form class="forms-sample" action="<?php echo base_url('index.php/DietController/testInsert') ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Choix Régime</label>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="option">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Prix</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="exampleInputEmail2" name="prix" 
                                        placeholder="Prix du Régime par jour">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Durée</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="exampleInputMobile" name="duree" 
                                        placeholder="Durée du régime">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Poid</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="exampleInputPassword2" name="poids" 
                                        placeholder="Poid à perdre">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Valider</button>
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
                                        <th>Composition</th>
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
    var composant=[];
    function addDetail() {
        let select = document.getElementById("exampleFormControlSelect3");
        // console.log(select.options[select.selectedIndex]);
        let tbody = document.getElementById("tbody");
        let tr = document.createElement("tr");
        let td1 = document.createElement("td");
        td1.innerText = select.options[select.selectedIndex].innerText;
        composant.push(select.value);
        tr.appendChild(td1);
        tbody.appendChild(tr);
    }
    function terminerDetail() {
        let compo = JSON.stringify(composant);
        let htmlForm = document.getElementById("formulaire");
        const data = new URLSearchParams();
        let formData = new FormData(htmlForm)
        formData.append('composants', compo)
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
