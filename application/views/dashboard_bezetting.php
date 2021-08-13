<div class="content">
    <div class="row">
       <!-- <div class="col-lg-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total GAP</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 1,456</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total NFO</h5>
                    <h3 class="card-title"><i class="tim-icons icon-send text-info"></i> 322</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Report</h5>
                            <h2 class="card-title">Bezetting Organisasi</h2>
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-simple btn-outline-dark" id="btn9" style="width: 100%; margin-top: 0px" onclick="$('#link9 .buttons-excel').click()">
                                EXPORT ALL
                            </button>
                            <button class="btn btn-simple btn-outline-dark" id="btn10" style="width: 100%; margin-top: 0px; display: none" onclick="$('#link10 .buttons-excel').click()">
                                EXPORT HC
                            </button>
                            <button class="btn btn-simple btn-outline-dark" id="btn11" style="width: 100%; margin-top: 0px; display: none" onclick="$('#link11 .buttons-excel').click()">
                                EXPORT NON HC
                            </button>
                        </div>
                        <div class="col-sm-2" id="filter_reg">
                            <select class="selectpicker" data-size="7" data-style="btn btn-danger" title="Regional" onchange="getComboA(this)">
                                <?php
                                    if($reg == 'ALL'){
                                        echo '<option disabled selected>-- REGIONAL --</option>';
                                    }else{
                                        echo '<option disabled selected>'.str_replace("_", " ", $reg).'</option>';
                                    }
                                ?>
                                <option value="HO">Head Office</option>
                                <option value="SUMATERA">Sumatera</option>
                                <option value="JAKARTA">Jakarta</option>
                                <option value="JAWA_BARAT">Jawa Barat</option>
                                <option value="JAWA_TENGAH">Jawa Tengah</option>
                                <option value="JAWA_TIMUR">Jatim Balnus</option>
                                <option value="KALIMANTAN">Kalimantan</option>
                                <option value="KTI">KTI</option>
                            </select>
                        </div>
                        <div class="col-sm-2" id="filter_level">
                            <select class="selectpicker" data-size="7" data-style="btn btn-danger" title="Level" onchange="getComboB(this)">
                                <?php
                                if($lvl == 'ALL'){
                                    echo '<option disabled selected>-- LEVEL --</option>';
                                }else{
                                    echo '<option disabled selected>'.str_replace("_", " ", strtoupper($lvl)).'</option>';
                                }
                                ?>
                                <option value="bod1">BOD - 1</option>
                                <option value="mgr">MANAGER</option>
                                <option value="sm">SITE MANAGER</option>
                                <option value="tl">TEAM LEADER</option>
                                <option value="teknisi">TEKNISI</option>
                                <option value="staff">STAFF</option>
                                <option value="helpdesk">HELPDESK</option>
                                <option value="drafter">DRAFTER</option>
                                <option value="surveyor">SURVEYOR</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <!--
                                                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                                            -->
                            <ul class="nav nav-pills nav-pills-danger nav-pills-icons flex-column">
                                <li class="nav-item" onclick="toggleExportAll()">
                                    <a class="nav-link active" data-toggle="tab" href="#link9">
                                        <i class="tim-icons icon-single-02"></i> All
                                    </a>
                                </li>
                                <li class="nav-item" onclick="toggleExportHC()">
                                    <a class="nav-link" data-toggle="tab" href="#link10">
                                        <i class="tim-icons icon-single-02"></i> Head Count
                                    </a>
                                </li>
                                <li class="nav-item" onclick="toggleExportNonHC()">
                                    <a class="nav-link" data-toggle="tab" href="#link11">
                                        <i class="tim-icons icon-single-02"></i> Non Head Count
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <div class="tab-content">
                                <div class="tab-pane active tg-table link9" id="link9">
                                    <table class="tg" style="width: 100%">
                                        <thead>
                                        <tr class="first">
                                            <th class="tg-tilr" rowspan="2" style="width:100px">REGIONAL WITEL</th>
                                            <th class="tg-w4n1" colspan="5">TOTAL HEADCOUNT</th>
                                            <th class="tg-hjjl" colspan="5">TOTAL NON HEADCOUNT</th>
                                            <th class="tg-w4n1" colspan="5">GRAND TOTAL</th>
                                        </tr>
                                        <tr class="second">
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                            <td class="tg-hjjl">FORMASI</td>
                                            <td class="tg-hjjl">ISI</td>
                                            <td class="tg-hjjl">GAP</td>
                                            <td class="tg-hjjl">NFO</td>
                                            <td class="tg-hjjl">% ISI</td>
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        echo $td3;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane tg-table link10" id="link10">
                                    <table class="tg" id="headcount" style="width: 100%">
                                        <thead>
                                        <tr class="first">
                                            <th class="tg-tilr" rowspan="2" style="width:100px">REGIONAL WITEL</th>
                                            <th class="tg-w4n1" colspan="5">I-OAN</th>
                                            <th class="tg-hjjl" colspan="5">MO SPBU</th>
                                            <th class="tg-w4n1" colspan="5">MS NTE</th>
                                            <th class="tg-hjjl" colspan="5">PROVISIONING BGES</th>
                                            <th class="tg-w4n1" colspan="5">PROVISIONING WIBS</th>
                                            <th class="tg-hjjl" colspan="5">SDI</th>
                                            <th class="tg-w4n1" colspan="5">TDM</th>
                                            <th class="tg-hjjl" colspan="5">TDS</th>
                                            <th class="tg-w4n1" colspan="5">GRAND TOTAL</th>
                                        </tr>
                                        <tr class="second">
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                            <td class="tg-hjjl">FORMASI</td>
                                            <td class="tg-hjjl">ISI</td>
                                            <td class="tg-hjjl">GAP</td>
                                            <td class="tg-hjjl">NFO</td>
                                            <td class="tg-hjjl">% ISI</td>
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                            <td class="tg-hjjl">FORMASI</td>
                                            <td class="tg-hjjl">ISI</td>
                                            <td class="tg-hjjl">GAP</td>
                                            <td class="tg-hjjl">NFO</td>
                                            <td class="tg-hjjl">% ISI</td>
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                            <td class="tg-hjjl">FORMASI</td>
                                            <td class="tg-hjjl">ISI</td>
                                            <td class="tg-hjjl">GAP</td>
                                            <td class="tg-hjjl">NFO</td>
                                            <td class="tg-hjjl">% ISI</td>
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                            <td class="tg-hjjl">FORMASI</td>
                                            <td class="tg-hjjl">ISI</td>
                                            <td class="tg-hjjl">GAP</td>
                                            <td class="tg-hjjl">NFO</td>
                                            <td class="tg-hjjl">% ISI</td>
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            echo $td;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane tg-table link11" id="link11">
                                    <table class="tg" id="nonheadcount" style="width: 100%">
                                        <thead>
                                        <tr class="first">
                                            <th class="tg-tilr" rowspan="2">REGIONAL WITEL</th>
                                            <th class="tg-w4n1" colspan="5">BOD</th>
                                            <th class="tg-hjjl" colspan="5">CORP. OFFICE</th>
                                            <th class="tg-w4n1" colspan="5">SQM</th>
                                            <th class="tg-hjjl" colspan="5">CONSTRUCTION</th>
                                            <th class="tg-w4n1" colspan="5">FINANCE</th>
                                            <th class="tg-hjjl" colspan="5">HCM & STRATEGY</th>
                                            <th class="tg-w4n1" colspan="5">IT</th>
                                            <th class="tg-hjjl" colspan="5">OPERATION</th>
                                            <th class="tg-w4n1" colspan="5">PROVISIONING</th>
                                            <th class="tg-hjjl" colspan="5">QE & GAMAS</th>
                                            <th class="tg-w4n1" colspan="5">SNC</th>
                                            <th class="tg-hjjl" colspan="5">INTEGRASI SPBU</th>
                                            <th class="tg-w4n1" colspan="5">TDS 2</th>
                                            <th class="tg-hjjl" colspan="5">GRAND TOTAL</th>
                                        </tr>
                                        <tr class="second">
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                            <td class="tg-hjjl">FORMASI</td>
                                            <td class="tg-hjjl">ISI</td>
                                            <td class="tg-hjjl">GAP</td>
                                            <td class="tg-hjjl">NFO</td>
                                            <td class="tg-hjjl">% ISI</td>
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                            <td class="tg-hjjl">FORMASI</td>
                                            <td class="tg-hjjl">ISI</td>
                                            <td class="tg-hjjl">GAP</td>
                                            <td class="tg-hjjl">NFO</td>
                                            <td class="tg-hjjl">% ISI</td>
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                            <td class="tg-hjjl">FORMASI</td>
                                            <td class="tg-hjjl">ISI</td>
                                            <td class="tg-hjjl">GAP</td>
                                            <td class="tg-hjjl">NFO</td>
                                            <td class="tg-hjjl">% ISI</td>
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                            <td class="tg-hjjl">FORMASI</td>
                                            <td class="tg-hjjl">ISI</td>
                                            <td class="tg-hjjl">GAP</td>
                                            <td class="tg-hjjl">NFO</td>
                                            <td class="tg-hjjl">% ISI</td>
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                            <td class="tg-hjjl">FORMASI</td>
                                            <td class="tg-hjjl">ISI</td>
                                            <td class="tg-hjjl">GAP</td>
                                            <td class="tg-hjjl">NFO</td>
                                            <td class="tg-hjjl">% ISI</td>
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                            <td class="tg-hjjl">FORMASI</td>
                                            <td class="tg-hjjl">ISI</td>
                                            <td class="tg-hjjl">GAP</td>
                                            <td class="tg-hjjl">NFO</td>
                                            <td class="tg-hjjl">% ISI</td>
                                            <td class="tg-w4n1">FORMASI</td>
                                            <td class="tg-w4n1">ISI</td>
                                            <td class="tg-w4n1">GAP</td>
                                            <td class="tg-w4n1">NFO</td>
                                            <td class="tg-w4n1">% ISI</td>
                                            <td class="tg-hjjl">FORMASI</td>
                                            <td class="tg-hjjl">ISI</td>
                                            <td class="tg-hjjl">GAP</td>
                                            <td class="tg-hjjl">NFO</td>
                                            <td class="tg-hjjl">% ISI</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        echo $td2;
                                        ?>
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
</div>

<script>
    function getComboA(selectObject) {
        var value = selectObject.value;
        window.location.replace(''+'<?= base_url() ?>'+'index.php/dashboard/index/'+value);
    }

    function getComboB(selectObject) {
        var value = selectObject.value;
        <?php
        if($this->uri->segment(3) == null){
            echo "window.location.replace(''+'".base_url()."'+'index.php/dashboard/index/ALL/'+value);";
        }else{
            echo "window.location.replace(''+'".base_url()."'+'index.php/dashboard/index/".$this->uri->segment(3)."/'+value);";
        }
        ?>
    }

    function getColumn(jenis, grup, witel) {
        window.open(''+'<?= base_url() ?>'+'index.php/dashboard/detil/'+jenis+'/'+grup+'/'+witel+'/<?= $lvl ?>', '_blank');
    }

    function toggleExportHC() {

        var x = document.getElementById("btn9");
        x.style.display = "none";

        var x = document.getElementById("btn11");
        x.style.display = "none";

        var x = document.getElementById("btn10");
        x.style.display = "block";
    }

    function toggleExportNonHC() {
        var x = document.getElementById("btn9");
        x.style.display = "none";

        var x = document.getElementById("btn10");
        x.style.display = "none";

        var x = document.getElementById("btn11");
        x.style.display = "block";
    }

    function toggleExportAll() {
        var x = document.getElementById("btn9");
        x.style.display = "block";

        var x = document.getElementById("btn10");
        x.style.display = "none";

        var x = document.getElementById("btn11");
        x.style.display = "none";
    }
</script>