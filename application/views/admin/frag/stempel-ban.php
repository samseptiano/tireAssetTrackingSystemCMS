                <div class="table-responsive p-3" id="tableRefresh">
                  <table id="tableRefresh" class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Trans no.</th>
                        <th>DC</th>
                        <th>Ban</th>
                        <th>Tgl Masuk</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Trans no.</th>
                        <th>DC</th>
                        <th>Ban</th>
                        <th>Tgl Masuk</th>
                        <th>Keterangan</th>
                         <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($stempelBan as $s){?>
                      <tr>
                        <td><?php echo $s->idTrans?></td>
                        <td><?php echo substr($s->descDC,0,10)."..."?></td>
                        <td><?php echo substr($s->idBan,0,10)."..."?></td>
                        <td><?php echo $s->tgl_masuk?></td>
                        <td><?php echo substr($s->keterangan,0,15)."..."?></td>
                         <td> <button type="button" id="viewModal" class="btn btn-warning mb-1" data-toggle="modal"
                                data-target="#exampleModalScrollableView" id="#modalScroll"
                                data-id="<?php echo $s->idTrans ?>" 
                                data-iddc="<?php echo $s->idDC ?>" 
                                data-descdc="<?php echo $s->descDC ?>" 
                                data-tt="<?php echo $s->TT ?>" 
                                data-idban="<?php echo $s->idBan ?>" 
                                data-keterangan="<?php echo $s->keterangan ?>" 
                                data-serialno="<?php echo $s->serialNo ?>" 
                                data-idukuranban="<?php echo $s->idUkuranBan ?>" 
                                data-ukuranban="<?php echo $s->ukuranBan ?>" 
                                data-statusVulkan = "<?php echo $s->statusVulkan ?>"
                                data-idmerekban="<?php echo $s->idMerekBan ?>" 
                                data-merekban="<?php echo $s->merekBan ?>" 
                                data-tglmasuk="<?php echo $s->tgl_masuk ?>"
                                >View</button>
                          <button type="button" id="delModal" class="btn btn-danger mb-1" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn" data-id="<?php echo $s->idTrans ?>">Delete</button></td>  
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>