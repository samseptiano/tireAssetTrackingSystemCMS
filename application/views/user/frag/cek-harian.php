
                <div class="table-responsive p-3" id="tableRefresh">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No Lambung</th>
                        <th>Posisi Ban</th>
                        <th>Merek Ban</th>
                        <th>Serial</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No Lambung</th>
                        <th>Posisi Ban</th>
                        <th>Merek Ban</th>
                        <th>Serial</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                     </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($cekHarian as $c){?>
                      <tr>
                        <td><?php echo $c->noLambung ?></td>
                        <td><?php echo $c->posisiBan ?></td>
                        <td><?php echo $c->merekBan ?></td>
                        <td><?php echo $c->serialNo ?></td>
                        <td><?php echo $c->tglCek ?></td>
                         <td> <button type="button" id="viewModal" class="btn btn-warning mb-1" data-toggle="modal"
                    data-target="#exampleModalScrollableView" id="#modalScroll"
                    data-id="<?php echo $c->IDTrans?>"
                     data-nolambung="<?php echo $c->noLambung?>"
                      data-tglcek="<?php echo $c->tglCek?>"
                       data-idban="<?php echo $c->idBan?>"
                        data-posisiban="<?php echo $c->posisiBan?>"
                         data-jenisban="<?php echo $c->jenisBan?>"
                          data-jenistelapak="<?php echo $c->jenisTelapak?>"
                         data-idmerekban="<?php echo $c->idMerekBan?>"
                         data-odometer="<?php echo $c->odometer?>"
                         data-ttbaru="<?php echo $c->TTBaru?>"
                         data-ttsisa="<?php echo $c->TTSisa?>"
                         data-habistidakrata="<?php echo $c->fgHabisTidakRataYN?>"
                         data-brakeskid="<?php echo $c->fgBrakeSkidYN?>"
                         data-difflowhigh="<?php echo $c->fgDiffLowHighYN?>"
                         data-diameterluartidaksama="<?php echo $c->fgDiameterLuarTidakSamaYN?>"
                         data-adatutuppentil="<?php echo $c->fgadaTutupPentilYN?>"
                         data-pentilbocor="<?php echo $c->fgPentilBocorYN?>"
                         data-pentiltersumbat="<?php echo $c->fgPentilTersumbatYN?>"
                         data-berkarat="<?php echo $c->fgberkaratYN?>"
                         data-velgrusak="<?php echo $c->fgVelgRusakYN?>"
                         data-olibocor="<?php echo $c->fgOliBocorYN?>"
                         data-ditundapenggantian="<?php echo $c->fgDitundaPenggantiannyaYN?>"
                         data-dicopotdivulkanisir="<?php echo $c->fgDicopotDivulkanisirYN?>"
                         data-dicopotdiperbaiki="<?php echo $c->fgDicopotDiperbaikiYN?>"
                         data-segeradilepas="<?php echo $c->fgSegeraDilepasYN?>"
                         data-tekanananginterukur="<?php echo $c->tekananAnginTerukur?>"
                         data-tekanananginstd="<?php echo $c->tekananAnginStd?>"
                         data-keterangan="<?php echo $c->keterangan?>"
                         data-fotoban="<?php echo $c->fotoBan?>"
                         data-idteknisi="<?php echo $c->idteknisi?>"
                     >View</button>
                          <button type="button" id="delModal" data-id="<?php echo $c->IDTrans?>" class="btn btn-danger mb-1" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn">Delete</button></td>  
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
            