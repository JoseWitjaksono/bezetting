<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-simple btn-outline-dark" style="width: 100%; margin-top: 0px" onclick="$('.buttons-excel').click()">
                                EXPORT DETIL
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="tg" id="detil" style="width: 100%">
                                <thead>
                                <tr class="first">
                                    <th class="tg-w4n1">NO</th>
                                    <th class="tg-tilr" style="min-width: 150px">REGIONAL WITEL</th>
                                    <th class="tg-w4n1">OBJID</th>
                                    <th class="tg-hjjl">NIK</th>
                                    <th class="tg-w4n1">NAMA</th>
                                    <th class="tg-hjjl">POSISI</th>
                                    <th class="tg-w4n1">LEVEL</th>
                                    <th class="tg-hjjl">DIREKTORAT</th>
                                    <th class="tg-w4n1">UNIT</th>
                                    <th class="tg-hjjl">SUB UNIT</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                echo $td;
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