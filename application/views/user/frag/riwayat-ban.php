   <div id="tableRefresh" class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>DC</th>
                        <th>No Lambung</th>
                        <!-- <th>No Kendaraan</th> -->
                        <!-- <th>ID Ban</th> -->
                        <th>Posisi Ban</th>
                        <th>Tgl Mutasi</th>
                        <!-- <th>TT Pasang</th> -->
                        <!-- <th>TT Lepas</th> -->
                        <th>Odometer Pasang</th>
                        <th>Odometer Lepas</th>
                        <th>Total KM</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                        <th>DC</th>
                        <th>No Lambung</th>
                         <!-- <th>No Kendaraan</th> -->
                        <!-- <th>ID Ban</th> -->
                        <th>Posisi Ban</th>
                        <th>Tgl Mutasi</th>
                      <!--   <th>TT Pasang</th>
                        <th>TT Lepas</th> -->
                        <th>Odometer Pasang</th>
                        <th>Odometer Lepas</th>
                        <th>Total KM</th>
                        <th>Aksi</th>
                    </tfoot>
                    <tbody>
                      <?php foreach($riwayatban as $r){?>
                      <tr>
                        <td><?php echo $r->descDC ?></td>
                        <td><?php echo $r->noLambung ?></td>
                        <!-- <td><?php echo $r->noKendaraan ?></td> -->
                        <!-- <td><?php echo $r->idbanPasang?></td> -->
                        <td><?php echo $r->posisiBan ?></td>
                        <td><?php echo $r->tglMutasi ?></td>
                        <!-- <td><?php echo $r->TTPasang ?></td> -->
                        <!-- <td><?php echo $r->TTLepas ?></td> -->
                        <td><?php echo $r->odometerPasang." KM"?></td>
                        <td><?php echo $r->odometerLepas." KM" ?></td>
                        <td><?php echo $r->totalKM." KM" ?></td>
                         <td> <button type="button" id="viewModal" class="btn btn-xs btn-warning mb-1" data-toggle="modal"
                    data-target="#exampleModalScrollable" id="#modalScroll"
                     data-descdc="<?php echo $r->descDC ?>"
                      data-nolambung="<?php echo $r->noLambung ?>"
                       data-nokendaraan="<?php echo $r->noKendaraan ?>"
                        data-serialno="<?php echo $r->serialNo ?>"
                        data-series="<?php echo $r->series ?>"
                        data-merekban="<?php echo $r->merekBan ?>"
                        data-ukuranban="<?php echo $r->ukuranBan ?>"
                        data-idban="<?php echo $r->idbanPasang ?>"
                         data-posisiban="<?php echo $r->posisiBan ?>"
                          data-tglmutasi="<?php echo $r->tglMutasi ?>"
                           data-ttpasang="<?php echo $r->TTPasang ?>"
                            data-ttlepas="<?php echo $r->TTLepas ?>"
                             data-odometerpasang="<?php echo $r->odometerPasang ?>"
                              data-odometerlepas="<?php echo $r->odometerLepas ?>"
                               data-totalkm="<?php echo $r->totalKM ?>"
                                   >View</button>
                        </td>  
                      </tr> 
                    <?php }?>
                    </tbody>
                  </table>
                </div>