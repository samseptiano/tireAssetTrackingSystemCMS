        <div class="table-responsive p-3" id="tableRefresh">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>DC</th>
                        <th>Tgl Mutasi</th>
                        <th>No Kendaraan</th>
                        <th>Serial Pasang</th>
                         <th>Serial Lepas</th>
                        <th>Odometer</th>
                        <th>FG Aktif</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>DC</th>
                        <th>Tgl Mutasi</th>
                        <th>No Kendaraan</th>
                         <th>Serial Pasang</th>
                          <th>Serial Lepas</th>
                        <th>Odometer</th>
                        <th>FG Aktif</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($mutasiban as $m){?>
                      <tr>
                        <td><?php echo $m->descDC?></td>
                        <td><?php echo $m->tglMutasi?></td>
                        <td><?php echo $m->noKendaraan?></td>
                        <td><?php echo $m->serialNoPasang?></td>
                        <td><?php echo $m->serialNoLepas?></td>
                        <td><?php echo $m->odometer?></td>
                        <td><?php echo $m->fgActiveYN?></td>
                         <td> <button type="button" class="btn btn-warning mb-1"  id="viewModal" data-toggle="modal"
                    data-target="#exampleModalScrollableView" id="#modalScroll"
                    data-id="<?php echo $m->ID?>"
                    data-title="<?php echo $m->ID?>"
                    data-fgactiveyn="<?php echo $m->fgActiveYN ?>"
                    data-iddc="<?php echo $m->idDC?>"
                    data-tglmutasi="<?php echo $m->tglMutasi ?>"
                    data-nokendaraan="<?php echo $m->noKendaraan?>"
                    data-odometer="<?php echo $m->odometer ?>"
                    data-posisiban="<?php echo $m->posisiBan?>"
                    data-waktumasuk="<?php echo $m->waktuMasuk ?>"
                    data-waktukeluar="<?php echo $m->waktuKeluar?>"
                    data-idbanlepas="<?php echo $m->idBanLepas ?>"
                    data-idbanpasang="<?php echo $m->idBanPasang?>"
                    data-ttlepas="<?php echo $m->TTLepas ?>"
                    data-ttpasang="<?php echo $m->TTPasang?>"
                    data-vulkbblepas="<?php echo $m->vulkbbLepas ?>"
                    data-vulkbbpasang="<?php echo $m->vulkbbPasang?>"
                    data-fotobanlepas="<?php echo $m->fotoBanLepas ?>"
                    data-idalasanlepas="<?php echo $m->idAlasanLepas?>"
                    data-idteknisi="<?php echo $m->idTeknisi ?>"
                    >View</button>
                          <?php //if($this->session->userdata('role') == ADMINROLE){?>
                          <button type="button" id="delModal" data-id="<?php echo $m->ID?>" class="btn btn-danger mb-1" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn">Delete</button><?php //} ?></td>  
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>